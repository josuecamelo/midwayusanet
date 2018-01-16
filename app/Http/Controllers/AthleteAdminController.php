<?php

namespace App\Http\Controllers;

use App\Product;
use App\Athlete;
use App\AthleteImage;
use App\AthleteVideo;
use App\AthleteProduct;
use App\Utils\UploadImagem;
use App\Utils\Utils;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AthleteAdminController extends Controller
{
	private $inputs;
	private $athlete;
	private $athleteModel;
	private $athleteImageModel;
	private $athleteVideoModel;
	private $athleteProductModel;
	private $publicPath;
	private $productModel;
	
	public function __construct(Athlete $athlete, AthleteImage $athleteImage, AthleteVideo $athleteVideo, AthleteProduct $athleteProduct, Product $product)
	{
		$this->athleteModel = $athlete;
		$this->athleteImageModel = $athleteImage;
		$this->athleteVideoModel = $athleteVideo;
		$this->athleteProductModel = $athleteProduct;
		$this->productModel = $product;
		$this->publicPath = public_path('uploads/athletes/');
	}


//	INDEX
	
	public function index()
	{
		$athletes = $this->athleteModel->orderBy('name', 'ASC')->paginate(15);
		return view('admin.athletes.index', compact('athletes'));
	}


//	CREATE
	
	public function create()
	{
		$produtos = array_filter($this->productModel->listarTodos());
		return view('admin.athletes.create', compact('produtos'));
	}


//	STORE
	
	public function store(Request $request)
	{
		$this->inputs = $request->all();
		
		$this->inputs['visibility'] = (!isset($this->inputs['visibility']) ? 0 : 1);
		$this->inputs['slug'] = strtolower(str_slug($this->inputs['name'] . '-' . $this->inputs['last_name']));
		
		$this->athlete = $this->athleteModel->create($this->inputs);
		
		if ($this->athlete->id != null)
		{
			$this->setImages($request->file('_photo'), $request->file('_banner'), $request->file('_thumbnail'));
			$this->athlete->save();
			
			if (isset($this->inputs['images']))
			{
				$this->storeAthleteImage();
			}
			
			$this->storeAthleteVideo();
			$this->storeAthleteProduct();
			Flash::success('Atleta cadastrado com sucesso.');
		}
		else
		{
			Flash::error('Erro. O atleta não foi cadastrado. Tente novamente.');
		}
		return redirect()->route('atletas.listar');
	}


//	Salva a foto, o banner e a miniatura
	
	private function setImages($photo, $banner, $thumbnail)
	{
		if ($photo != null)
		{
			$p = UploadImagem::singleUpload($photo, 'photo', $this->getDestinoUpload());
			$this->athlete->photo = $p;
		}
		
		if ($banner != null)
		{
			$b = UploadImagem::singleUpload($banner, 'banner', $this->getDestinoUpload());
			$this->athlete->banner = $b;
		}
		
		if ($thumbnail != null)
		{
			$t = UploadImagem::singleUpload($thumbnail, 'thumbnail', $this->getDestinoUpload());
			$this->athlete->thumbnail = $t;
		}
	}


//	Salva as imagens
	
	private function storeAthleteImage()
	{
		$images = $this->inputs['images'];
		$namesImage = [];
		$inputsImage = [];
		$countImages = $this->athleteImageModel->where('athlete_id', '=', $this->athlete->id)->count();
		
		foreach ($images as $key => $value)
		{
			$nome = $value->getClientOriginalName();
			
			array_push($namesImage, $nome);
			
			$inputsImage['url'] = $nome;
			$inputsImage['order'] = $countImages + $key + 1;
			$inputsImage['athlete_id'] = $this->athlete->id;
			
			$image = $this->athleteImageModel->create($inputsImage);
			$image->save();
			
			unset($inputsImage);
		}
		
		UploadImagem::fazerUpload($images, $this->getDestinoUpload(), $namesImage);
	}


//	Atualiza as imagens
	
	private function updateAthleteImage()
	{
		if (isset($this->inputs['images']))
		{
			$this->storeAthleteImage();
		}
		
		if (isset($this->inputs['images_order']))
		{
			$imagesOrder = explode(',', $this->inputs['images_order']);
			
			foreach ($imagesOrder as $key => $id)
			{
				$imageModel = $this->athleteImageModel->find($id);
				$imagemOrder['order'] = $key + 1;
				$imageModel->update($imagemOrder);
			}
		}
		
		if (isset($this->inputs['images_for_delete']))
		{
			$images = explode(',', $this->inputs['images_for_delete']);
			
			foreach ($images as $id)
			{
				$imageModel = $this->athleteImageModel->find($id);
				$arquivo = $this->getDestinoUpload() . '/' . $imageModel->url;
				unlink($arquivo);
				$imageModel->delete();
			}
		}
	}


//	Salva os vídeos
	
	private function storeAthleteVideo()
	{
		if (isset($this->inputs['video_title']))
		{
			$inputsVideo = [];
			$titles = array_filter($this->inputs['video_title']);
			$urls = array_filter($this->inputs['video_url']);
			$contador = 1;
			
			foreach ($titles as $key => $value)
			{
				$inputsVideo['title'] = $value;
				$inputsVideo['url'] = Utils::gerarUrlVideo($urls[$key]);
				$inputsVideo['athlete_id'] = $this->athlete->id;
				$inputsVideo['order'] = $contador;
				
				if ($key < 0)
				{
					$video = $this->athleteVideoModel->create($inputsVideo);
					$video->save();
				}
				else
				{
					$video = $this->athleteVideoModel->find($key);
					$video->update($inputsVideo);
				}
				
				$contador++;
				unset($inputsVideo);
			}
		}
	}


//	Atualiza os vídeos
	
	private function updateAthleteVideo()
	{
		$this->storeAthleteVideo();
		
		if (isset($this->inputs['videos_for_delete']))
		{
			$videos = explode(',', $this->inputs['videos_for_delete']);
			
			foreach ($videos as $id)
			{
				$video = $this->athleteVideoModel->find($id);
				$video->delete();
			}
		}
	}


//	Salva os produtos
	
	private function storeAthleteProduct()
	{
		if (isset($this->inputs['products']))
		{
			$id = $this->athlete->id;
			$novos = $this->inputs['products'];
			$inputsProduct = [];
			
			$this->athleteProductModel->where('athlete_id', '=', $id)->delete();
			
			foreach ($novos as $key => $value)
			{
				$inputsProduct['athlete_id'] = $this->athlete->id;
				$inputsProduct['product_id'] = $value;
				
				$product = $this->athleteProductModel->create($inputsProduct);
				$product->save();
				
				unset($inputsProduct);
			}
		}
	}


//	Pega o caminho do upload
	
	private function getDestinoUpload()
	{
		return $this->publicPath . $this->athlete->id;
	}


//	EDIT
	
	public function edit($id)
	{
		$athlete = $this->athleteModel->find($id);
		$produtos = array_filter($this->productModel->listarTodos());
		$images = $athlete->athleteImage()->orderBy('order', 'asc')->get();
		$videos = $athlete->athleteVideo()->orderBy('order', 'asc')->get();
		$checked = $athlete->visibility ? '' : 'checked';
		
		$productsUsed = $athlete->athleteProduct()->get();
		foreach ($productsUsed as $key => $product)
		{
			$products[] = $product->product_id;
		}
		
		return view('admin.athletes.edit', compact('produtos', 'athlete', 'images', 'videos', 'products', 'checked'));
	}


//	UPDATE
	
	public function update(Request $request, $id)
	{
		$this->inputs = $request->all();
		
		$this->inputs['visibility'] = (!isset($this->inputs['visibility']) ? 0 : 1);
		$this->inputs['slug'] = strtolower(str_slug($this->inputs['name'] . '-' . $this->inputs['last_name']));
		
		$this->athlete = $this->athleteModel->find($id);
		$this->setImages($request->file('_photo'), $request->file('_banner'), $request->file('_thumbnail'));
		
		if ($this->athlete->id != null)
		{
			$this->athlete->update($this->inputs);
			$this->updateAthleteImage();
			$this->updateAthleteVideo();
			$this->storeAthleteProduct();
			Flash::success('Atleta atualizado com sucesso.');
		}
		else
		{
			Flash::error('Erro. O atleta não foi atualizado. Tente novamente.');
		}
		return redirect()->route('atletas.listar');
	}


//	DESTROY
	
	public function destroy($id)
	{
		$athlete = $this->athleteModel->find($id);
		
		if ($athlete->id != null)
		{
			
			$this->deleteFolder($this->publicPath . $id);
			
			$this->athleteImageModel->where('athlete_id', '=', $id)->delete();
			$this->athleteVideoModel->where('athlete_id', '=', $id)->delete();
			$this->athleteProductModel->where('athlete_id', '=', $id)->delete();
			
			$athlete->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}


//	deleteFolder: Deleta a pasta inteira de imagens
	
	private function deleteFolder($path)
	{
		if (is_dir($path) === true)
		{
			$files = array_diff(scandir($path), array('.', '..'));
			
			foreach ($files as $file)
			{
				$this->deleteFolder($path . '/' . $file);
			}
			return rmdir($path);
		}
		else if (is_file($path) === true)
		{
			return unlink($path);
		}
		return false;
	}
}
