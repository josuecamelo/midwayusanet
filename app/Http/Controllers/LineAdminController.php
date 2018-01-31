<?php

namespace App\Http\Controllers;

use App\Category;
use App\Line;
use App\Type;
use App\Utils\UploadImagem;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class LineAdminController extends Controller
{
	private $lineModel;
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	public function __construct(Line $lineModel)
	{
		$this->lineModel = $lineModel;
	}
	
	public function index()
	{
		$lines = $this->lineModel->orderBy('name', 'ASC')->paginate(15);
		
		return view('admin.products.lines.index', compact('lines'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.products.lines.create');
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
		$inputs['slug'] = str_slug($inputs['name']);
		
		//arquivo para upload
		$logo = $request->file('logo');
		$banner = $request->file('banner');
		
		$line = $this->lineModel->create($inputs);
		
		if ($line->id != null)
		{
			$destinoUpload = public_path("uploads/lines/$line->id/");
			//logo upload
			if ($logo != null)
			{
				$logo = UploadImagem::singleUpload($logo, 'logo', $destinoUpload);
				$line->logo = $logo;
			}
			
			if ($banner != null)
			{
				$banner = UploadImagem::singleUpload($banner, 'banner', $destinoUpload);
				$line->banner = $banner;
			}
			
			$line->save();
			
			Flash::success('Item adicionado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('linhas.listar');
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
		$line = $this->lineModel->find($id);
		
		return view('admin.products.lines.edit', compact('line'));
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
		$inputs['slug'] = str_slug($inputs['name']);
		
		//arquivo para upload
		$logo = $request->file('logo');
		$banner = $request->file('banner');
		
		$linha = $this->lineModel->find($id);
		//->update($inputs);
		
		$objAtual = $linha;
		$linha = $linha->update($inputs);
		
		if ($linha)
		{
			$destinoUpload = public_path("uploads/lines/$id/");
			
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
		
		return redirect()->route('linhas.listar');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$linha = $this->lineModel->find($id);
		
		if ($linha->id != null)
		{
			$linha->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
