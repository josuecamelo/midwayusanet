<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    protected $fillable = [
        'controller',
        'controller_action',
        'route_name',
        'action_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function listarPermissoes($user_id){
        return $this
            ->select(
                'permissions.*',
                DB::raw('case when permission_user.id is not null then 1 else 0 end as user_has_access')
            )
            ->leftJoin('permission_user', function($join) use($user_id) {
                $join->on('permission_user.permission_id', '=', 'permissions.id')
                    ->where('permission_user.user_id', $user_id);
            })
            ->orderBy('controller', 'asc')
            ->get();
    }
}
