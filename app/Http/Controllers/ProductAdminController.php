<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flavor;
use App\Goal;
use App\Icon;
use App\Line;
use App\Product;
use App\ProductPortion;
use App\ProductTopic;
use App\Type;
use App\Utils\UploadImagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class ProductAdminController extends Controller
{
	private $productModel;
	private $typeModel;
	private $flavorModel;
	private $productTopicModel;
	private $lineModel;
	private $categoryModel;
	private $goalModel;
	private $productPortionModel;
	private $iconModel;
	
	public function __construct(Product $productModel,
	                            Type $typeModel,
	                            Flavor $flavorModel,
	                            ProductTopic $productTopicModel,
	                            Line $lineModel,
	                            Category $categoryModel,
	                            Goal $goalModel,
	                            Icon $iconModel,
	                            ProductPortion $productPortionModel)
	{
		$this->productModel = $productModel;
		$this->typeModel = $typeModel;
		$this->flavorModel = $flavorModel;
		$this->productTopicModel = $productTopicModel;
		$this->lineModel = $lineModel;
		$this->categoryModel = $categoryModel;
		$this->goalModel = $goalModel;
		$this->productPortionModel = $productPortionModel;
		$this->iconModel = $iconModel;
	}
	
	public function index()
	{
		$products = $this->productModel
			->orderBy('name', 'ASC')
			->paginate(15);
		
		return view('admin.products.index', compact(
			'products'
		));
	}
	
	public function create()
	{
		$types = $this->typeModel->listar();
		$flavors = $this->flavorModel->listarTodos();
		$products = $this->productModel->listarTodos();
		$lines = $this->lineModel->get();
		$categories = $this->categoryModel->get();
		$goals = $this->goalModel->get();
		$flavorsList = $this->flavorModel->listarTodos(false);
		$icons = $this->iconModel->orderBy('name');
		
		return view('admin.products.create', compact(
			'products',
			'types',
			'flavors',
			'lines',
			'categories',
			'goals',
			'flavorsList'
		));
	}
	
	public function store(Request $request)
	{
		$upload = false;
		$inputs = $request->all();
		$inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		
		$inputs['line_id'] = $inputs['line_id'][0];
		$inputs['type_id'] = $inputs['type_id'][0];
		
		//$inputs['highlights_portion'] = implode($inputs['portions'], ";");

		if (isset($inputs['image']))
		{
			$imagem = $inputs['image'];
			unset($inputs['image']);
			$upload = true;
		}
		
		$product = $this
			->productModel
			->create($inputs);
		
		if ($upload)
		{
			$imageName = UploadImagem::singleUpload($imagem, $product->id, public_path("uploads/products/$product->id"));
			$product->updateImageName($product, $imageName);
		}
		
		$this->gravaRelacionamentos($inputs, $product);
		$this->gravarTopicos($inputs, $product);
		
		unset($inputs['img_topico']);
		unset($inputs['topico']);
		unset($inputs['related_products']);
		
		if ($product)
		{
			//arquivo para upload
			Flash::success('Item alterado com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}
		
		return redirect()->route('produtos.listar');
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$product = $this->productModel->find($id);
		$types = $this->typeModel->listar();
		$flavors = $this->flavorModel->listarTodos();
		$flavorsList = $this->flavorModel->listarTodos(false);
		$products = $this->productModel->listarTodos([$id]);
		
		$related_products = $product->products()->get();
		$related_categories = $product->categories()->get();
		$related_goals = $product->goals()->get();
		$related_flavors = $product->flavors()->get();
		
		$topics = $product->productTopics()->orderBy('id', 'asc')->get();
		
		$lines = $this->lineModel->get();
		$categories = $this->categoryModel->get();
		$goals = $this->goalModel->get();

		foreach ($related_products as $key => $related_product)
		{
			$relatedProductsList[] = $related_product->product_id;
		}
		
		foreach ($related_categories as $key => $related_category)
		{
			$relatedCategoriesProductsList[] = $related_category->category_id;
		}
		
		foreach ($related_goals as $key => $related_goal)
		{
			$relatedGoalsProductsList[] = $related_goal->goal_id;
		}
		
		
		foreach ($related_flavors as $key => $related_flavor)
		{
			$relatedFlavorsList[] = $related_flavor->flavor_id;
		}
		
		//$portions = explode(';', $product->highlights_portion);
		
		return view('admin.products.edit', compact(
			'product',
			'products',
			'types',
			'flavors',
			'relatedProductsList',
			'topics',
			'lines',
			'categories',
			'relatedCategoriesProductsList',
			'relatedGoalsProductsList',
			'goals',
			'portions',
			'flavorsList',
			'relatedFlavorsList'
		));
	}
	
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		$inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		
		$inputs['line_id'] = $inputs['line_id'][0];
		$inputs['type_id'] = $inputs['type_id'][0];
		
		$product = $this->productModel
			->find($id);


		if (isset($inputs['image']))
		{
			$inputs['image'] = UploadImagem::singleUpload($inputs['image'], $product->id, public_path("uploads/products/$product->id"), $redimensionar = true);
            //$imageName = UploadImagem::singleUpload($inputs['image'], $product->id, public_path("uploads/products/$product->id"), $redimensionar = true);
            //$product->updateImageName($product, $imageName);
		}
		

		//$inputs['highlights_portion'] = implode($inputs['portions'], ";");
		
		$this->gravaRelacionamentos($inputs, $product);
		$this->gravarTopicos($inputs, $product);
		
		unset($inputs['img_topico']);
		unset($inputs['topico']);
		//unset($inputs['related_products']);
		
		//atualizando
		$product->update($inputs);
		
		if ($product)
		{
			//arquivo para upload
			Flash::success('Item alterado com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}
		
		return redirect()->route('produtos.listar');
	}
	
	/**
	 * @param $inputs
	 * @param $product
	 */
	protected function gravarTopicos($inputs, $product)
	{
		if (!isset($inputs['img_topico']))
		{
			$inputs['img_topico'] = [];
		}
		
		$imagens_topicos = $inputs['img_topico'];
		$topics_descriptions = $inputs['topico_titulo'];
		$topics_text = $inputs['topico_texto'];
		
		//dd($topics_text);
		
		$destinoUpload = public_path("uploads/products/$product->id/topics");
		
		foreach ($topics_descriptions as $key => $topico)
		{
			//editar topico se não inserir
			
			if ($key > 0)
			{
				$topicoUpd = $this->productTopicModel->updateTopic($key, $topico, $topics_text[$key]);
				if (isset($imagens_topicos[$key]) && $imagens_topicos[$key] != null)
				{
					$imageName = UploadImagem::singleUpload($imagens_topicos[$key], $topicoUpd->id, $destinoUpload);
					//atualizando topico Inserido
					$this->productTopicModel->updateTopicImage($topicoUpd, $imageName);
				}
			}
			else
			{
				$topicoIns = $this->productTopicModel->addTopic($topico, $topics_text[$key], $product->id);
				
				if (isset($imagens_topicos[$key]) && $imagens_topicos[$key] != null)
				{
					$imageName = UploadImagem::singleUpload($imagens_topicos[$key], $topicoIns->id, $destinoUpload);
					//atualizando topico Inserido
					$this->productTopicModel->updateTopicImage($topicoIns, $imageName);
				}
			}
		}
		
		//quem deve ser excluido
		/*$topicosExistentes = $this->productTopicModel->where('product_id', $product->id)->get();
		foreach($topicosExistentes as $tpe => $existente){
			if(!array_key_exists($existente->id, $topics_descriptions)){
				//se houver imagem excluir arquivo, depois remover registro
				if(!empty($existente->image)){
					if (File::exists(public_path("uploads/products/$product->id/topics/".$existente->image))) {
						unlink(public_path("uploads/products/$product->id/topics/".$existente->image));
					}
				}
				$existente->delete();
			}
		}*/
	}
	
	/**
	 * @description gravando relacionamentos diversos
	 * @param $inputs
	 * @param $product
	 * @return mixed
	 */
	protected function gravaRelacionamentos($inputs, $product)
	{
		//Adicionando Produtos Relacionados
		if (!empty($inputs['related_products']))
			$product->productRelateds()->sync($inputs['related_products']);
		else
			$product->productRelateds()->sync([]);
		
		//Adicionando Categorias Relacionadas
		if (!empty($inputs['categories_ids']))
			$product->productCategories()->sync($inputs['categories_ids']);
		else
			$product->productCategories()->sync([]);
		
		//Adicionando Objetivos Relacionadas
		if (!empty($inputs['goals_ids']))
			$product->productGoals()->sync($inputs['goals_ids']);
		else
			$product->productGoals()->sync([]);
		
		//Adicionando Sabores Relacionadas
		if (!empty($inputs['related_flavors']))
			$product->productFlavors()->sync($inputs['related_flavors']);
		else
			$product->productFlavors()->sync([]);
		
		
		//gravando porções
		foreach ($inputs['portions'] as $key => $portion)
		{
			if ($key < 0)
			{
				//dd($portion['value'] . $portion['nutrient']);
				$this->productPortionModel->create([
					'product_id' => $product->id,
					'value' => $portion['value'],
					'nutrient' => $portion['nutrient']
				]);
			}
			else
			{
				$portion = $this->productPortionModel->find($key);
				
				//if(!empty($portion['nutrient']) && !empty($portion['value'])){
				$portion->nutrient = $portion['nutrient'];
				$portion->value = $portion['value'];
				$portion->save();
				//}else{
				//    $portion->delete();
				//}
			}
		}
	}
	
	public function destroy($id)
	{
		$product = $this->productModel->find($id);
		
		if ($product->id != null)
		{
			$product->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
	
	public function topicoDestroy($topico_id)
	{
		$tp = $this->productTopicModel->find($topico_id);
		
		if (!empty($tp->image))
		{
			if (File::exists(public_path("uploads/products/$tp->product_id/topics/" . $tp->image)))
			{
				unlink(public_path("uploads/products/$tp->product_id/topics/" . $tp->image));
			}
		}
		
		$tp->delete();
	}
	
	public function portionDestroy($portion_id)
	{
		$this->productPortionModel->find($portion_id)->delete();
	}
}
