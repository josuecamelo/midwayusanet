<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PermissionAdminController extends Controller
{
    private $userModel;
    private $permissionModel;

    public function __construct(User $userModel, Permission $permissionModel){
        $this->userModel = $userModel;
        $this->permissionModel = $permissionModel;
    }

    public function index(){
        $users = $this->userModel->where('is_admin', '=', '0')->paginate();

        return view('admin.permissions.index', compact('users'));
    }

    public function edit($user_id){
        $listagemPermissoes = [];

        $permissions = $this
            ->permissionModel
            ->listarPermissoes($user_id);

        Session::put('user_id', $user_id);

        foreach($permissions as $key => $permission){
            if(!array_key_exists($permission->controller,$listagemPermissoes)){
                $listagemPermissoes[$permission->controller] = [];
            }

            $listagemPermissoes[$permission->controller][$permission->id] = [$permission->route_name, $permission->user_has_access];
        }

        return view('admin.permissions.edit', compact('listagemPermissoes'));
    }

    public function setPermissao($permissao_id){
        $user_id = Session::get('user_id');

        $res = DB::table('permission_user')
            ->where('user_id', $user_id)
            ->where('permission_id', $permissao_id)
            ->first();

        //se possui permissão então remover, senão adicionar
        if($res){
            DB::table('permission_user')
                ->where('user_id', $user_id)
                ->where('permission_id', $permissao_id)->delete();
        }else{
            DB::table('permission_user')->insert(
                ['user_id' => $user_id, 'permission_id' => $permissao_id]
            );
        }
    }
}
