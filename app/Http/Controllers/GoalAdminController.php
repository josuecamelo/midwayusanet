<?php

namespace App\Http\Controllers;

use App\Category;
use App\Goal;
use App\Type;
use App\Utils\UploadImagem;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class GoalAdminController extends Controller
{
	private $goalModel;
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	public function __construct(Goal $goalModel)
	{
		$this->goalModel = $goalModel;
	}
	
	public function index()
	{
		$goals = $this->goalModel
			->orderBy('name', 'ASC')
			->paginate(15);
		
		return view('admin.products.goals.index', compact(
			'goals'
		));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.products.goals.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$inputs = $request->all();
		
		//arquivo para upload
		$logo = $request->file('logo');
		$banner = $request->file('banner');
		$inputs['slug'] = strtolower(str_slug($inputs['name']));
		
		$goal = $this->goalModel->create($inputs);
		
		if ($goal->id != null)
		{
			$destinoUpload = public_path("uploads/goals/$goal->id/");
			//logo upload
			if ($logo != null)
			{
				$logo = UploadImagem::singleUpload($logo, 'logo', $destinoUpload);
				
				$goal->logo = $logo;
			}
			
			if ($banner != null)
			{
				$banner = UploadImagem::singleUpload($banner, 'banner', $destinoUpload);
				$goal->banner = $banner;
				
			}
			
			$goal->save();
			
			Flash::success('Item adicionado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('objetivos.listar');
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$goal = $this->goalModel->find($id);
		
		return view('admin.products.goals.edit', compact('goal'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		
		//arquivo para upload
		$logo = $request->file('logo');
		$banner = $request->file('banner');
		$this->inputs['slug'] = strtolower(str_slug($this->inputs['name']));
		
		$objetivo = $this->goalModel
			->find($id);
		//->update($inputs);
		
		$objAtual = $objetivo;
		$objetivo = $objetivo->update($inputs);
		
		if ($objetivo)
		{
			$destinoUpload = public_path("uploads/goals/$id/");
			
			//logo upload
			if ($logo != null)
			{
				$logo = UploadImagem::singleUpload($logo, 'logo', $destinoUpload);
				
				$objAtual->logo = $logo;
			}
			
			if ($banner != null)
			{
				$banner = UploadImagem::singleUpload($banner, 'banner', $destinoUpload);
				$objAtual->banner = $banner;
				
			}
			
			$objAtual->save();
			
			Flash::success('Item alterado com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}
		
		return redirect()->route('objetivos.listar');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$objetivo = $this->goalModel
			->find($id);
		
		if ($objetivo->id != null)
		{
			$objetivo->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
