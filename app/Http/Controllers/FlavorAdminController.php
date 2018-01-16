<?php

namespace App\Http\Controllers;

use App\Flavor;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class FlavorAdminController extends Controller
{
    private $flavorModel;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Flavor $flavorModel){
        $this->flavorModel = $flavorModel;
    }

    public function index()
    {
        $flavors = $this->flavorModel
            ->orderBy('name', 'ASC')
            ->paginate(15);

        return view('admin.products.flavors.index', compact(
            'flavors'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.flavors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs  = $request->all();

        $flavor = $this->flavorModel->create($inputs);

        if($flavor->id != null) {
            Flash::success('Item adicionado com sucesso.');
        }else{
            Flash::error('O item não pode ser inserido. Tente novamente.');
        }
        return redirect()->route('sabores.listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flavor = $this->flavorModel->find($id);

        return view('admin.products.flavors.edit', compact('flavor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        $flavor = $this->flavorModel->find($id)
            ->update($inputs);

        if($flavor){
            Flash::success('Item alterado com sucesso.');
        }else{
            Flash::error('Não foi possível alterar este item. Tente novamente.');
        }

        return redirect()->route('sabores.listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flavor = $this->flavorModel->find($id);

        if($flavor->id != null){
            $flavor->delete();
            Flash::success('Item removido com sucesso.');
            return Redirect::back();
        }
    }
}
