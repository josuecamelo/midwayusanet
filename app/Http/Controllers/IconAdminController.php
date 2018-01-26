<?php

namespace App\Http\Controllers;

use App\Icon;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Utils\UploadImagem;
use Illuminate\Support\Facades\Redirect;

class IconAdminController extends Controller
{
	private $iconModel;
	
	function __construct(Icon $icon)
	{
		$this->iconModel = $icon;
	}
	
	function index()
	{
		$icons = $this->iconModel->listarTodos();
		
		return view('admin.icons.index', compact(
			'icons'
		));
	}
	
	function create()
	{
		return view('admin.icons.create');
	}
	
	public function store(Request $request)
	{
		$inputs = $request->all();
		$iconFile = $request->file('url');
		
		$icon = $this->iconModel->create($inputs);
		
		if ($icon->id != null)
		{
			$destinoUpload = public_path("uploads/icons/");
			
			if ($iconFile != null)
			{
				$iconFile = UploadImagem::singleUpload($iconFile, str_slug($request->name), $destinoUpload);
				$icon->url = $iconFile;
			}
			
			$icon->save();
			
			Flash::success('Item adicionado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('icons.listar');
	}
	
	public function edit($id)
	{
		$icon = $this->iconModel->find($id);
		
		return view('admin.icons.edit', compact('icon'));
	}
	
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		$icon = $this->iconModel->find($id);
		$urlAnterior = $icon->url;
		$update = $icon->update($inputs);
		
		if ($update)
		{
			$iconFile = $request->file('url');
			
			if ($iconFile != null)
			{
				$name = str_slug($request->name);
				$destinoUpload = public_path('uploads/icons/');
				$icon->url = UploadImagem::singleUpload($iconFile, $name, $destinoUpload);
				
				unlink(public_path('uploads/icons/' . $urlAnterior));
			}
			
			$icon->save();
			
			Flash::success('Item atualizado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser atualizado. Tente novamente.');
		}
		return redirect()->route('icons.listar');
	}
	
	public function destroy($id)
	{
		$icon = $this->iconModel->find($id);
		$url = $icon->url;
		
		if ($icon->id != null)
		{
			$icon->delete();
			unlink(public_path('uploads/icons/' . $url));
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
