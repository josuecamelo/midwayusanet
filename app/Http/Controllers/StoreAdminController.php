<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class StoreAdminController extends Controller
{
	private $storeModel;
	private $regions;


//	CONSTRUCT
	
	public function __construct(Store $storeModel)
	{
		$this->storeModel = $storeModel;
		$this->regions = [
			'CENTRO-OESTE' => 'CENTRO-OESTE',
			'NORDESTE' => 'NORDESTE',
			'NORTE' => 'NORTE',
			'SUDESTE' => 'SUDESTE',
			'SUL' => 'SUL'
		];
	}


//	INDEX
	
	public function index()
	{
		$stores = $this->storeModel->orderBy('other_name', 'ASC')->paginate(15);
		
		return view('admin.stores.index', compact('stores'));
	}


//	CREATE
	
	public function create()
	{
		$regions = $this->regions;
		return view('admin.stores.create', compact('regions'));
	}


//	STORE
	
	public function store(Request $request)
	{
		$inputs = $request->all();
		
		$store = $this->storeModel->create($inputs);
		
		if ($store->id != null)
		{
			Flash::success('Loja adicionada com sucesso.');
		}
		else
		{
			Flash::error('A loja não pode ser cadastrada. Tente novamente.');
		}
		return redirect()->route('lojas.listar');
	}


//	EDIT
	
	public function edit($id)
	{
		$store = $this->storeModel->find($id);
		$regions = $this->regions;
		$region = $store->region;
		
		return view('admin.stores.edit', compact('store', 'regions', 'region'));
	}


//	UPDATE
	
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		
		$store = $this->storeModel->find($id)->update($inputs);
		
		if ($store)
		{
			Flash::success('Loja alterada com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar esta loja. Tente novamente.');
		}
		
		return redirect()->route('lojas.listar');
	}


//	DESTROY
	
	public function destroy($id)
	{
		$store = $this->storeModel->find($id);
		
		if ($store->id != null)
		{
			$store->delete();
			Flash::success('Loja removida com sucesso.');
			return Redirect::back();
		}
	}
}