<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class MenuAdminController extends Controller
{
    private $categoryModel;
    private $productModel;
    private $menuModel;

    public function __construct(Category $categoryModel, Product $productModel, Menu $menuModel)
    {
        $this->categoryModel = $categoryModel;
        $this->productModel = $productModel;
        $this->menuModel = $menuModel;
    }

    public function index($menu_id = 1)
	{
        $relatedCategoriesList = [];
        $relatedProductsList = [];

	    if($menu_id != null){
            $menu = $this->menuModel->find($menu_id);

            $relatedCategories =$menu->relatedCategories()->get();

            foreach ($relatedCategories as $key => $relatedCategory)
            {
                $relatedCategoriesList[] = $relatedCategory->id;
            }

            $relatedProducts = $menu->relatedProducts()->get();
            foreach ($relatedProducts as $key => $relatedProduct)
            {
                $relatedProductsList[] = $relatedProduct->id;
            }

            $products[] = $this->productModel->listarTodos($relatedProductsList);
            $categories[] = $this->categoryModel->listarTodos($relatedCategoriesList);

            //categorias e produtos selecionados
            if(!empty($relatedProductsList)){
                $products[] = $this->productModel->listar($relatedProductsList);
            }else{
                $products[] = [];
            }

            if(!empty($relatedCategoriesList)){
                $categories[] = $this->categoryModel->listar($relatedCategoriesList);
            }else{
                $categories[] = [];
            }

            //listagem do produto destaque
            $products[] = $this->productModel->listarTodos([$menu->featured_product_id]);
            $products[] = $this->productModel->listar([$menu->featured_product_id]);
        }

        return view('admin.menu.index', compact(
            'menu',
            'products',
            'categories',
            'relatedProductsList',
            'relatedCategoriesList'
        ));
	}

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $menu = $this->menuModel
            ->find($id);

        //dd($menu);
        //dd($inputs);

        //atualizando
        $menu->update($inputs);

        if ($menu)
        {
            Flash::success('Menu alterado com sucesso.');
        }else{
            Flash::error('Não foi possível alterar este Menu. Tente novamente.');
        }

        return redirect()->route('menus.listar', $id);
    }
}
