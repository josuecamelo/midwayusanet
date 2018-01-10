<?php

namespace App\Http\Controllers;

use App\Utils\Utils;
use App\Video;
use App\VideoCategory;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class VideoAdminController extends Controller
{
	private $videoModel;
	private $videoCategoryModel;


//	CONSTRUCT
	
	public function __construct(Video $videoModel, VideoCategory $videoCategoryModel)
	{
		$this->videoModel = $videoModel;
		$this->videoCategoryModel = $videoCategoryModel;
	}


//	INDEX
	
	public function index()
	{
		$videos = $this->videoModel->orderBy('title', 'ASC')->paginate(15);
		
		return view('admin.videos.index', compact('videos'));
	}


//	CREATE
	
	public function create()
	{
		$categories = $this->videoCategoryModel->listarTodos();
		
		return view('admin.videos.create', compact('categories'));
	}


//	STORE
	
	public function store(Request $request)
	{
		$inputs = $request->all();
		$inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		$inputs['video'] = Utils::gerarUrlVideo($inputs['video']);
		
		$video = $this->videoModel->create($inputs);
		
		if ($video->id != null)
		{
			Flash::success('Item adicionado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('videos.listar');
	}


//	EDIT
	
	public function edit($id)
	{
		$video = $this->videoModel->find($id);
		$categories = $this->videoCategoryModel->listarTodos();
		$checked = $video->visibility ? '' : 'checked';
		
		return view('admin.videos.edit', compact('video', 'categories', 'checked'));
	}


//	UPDATE
	
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		$inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		$inputs['video'] = Utils::gerarUrlVideo($inputs['video']);
		
		$video = $this->videoModel->find($id)->update($inputs);
		
		if ($video)
		{
			Flash::success('Item alterado com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}
		
		return redirect()->route('videos.listar');
	}


//	DESTROY
	
	public function destroy($id)
	{
		$video = $this->videoModel->find($id);
		
		if ($video->id != null)
		{
			$video->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}