<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;

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

    public function index($menu_id = null)
	{
	    if($menu_id != null){
            $menu = $this->menuModel->find($menu_id);


            $relatedCategories =$menu->relatedCategories()->get();
            $relatedProducts = $menu->relatedProducts()->get();

            foreach ($relatedCategories as $key => $relatedCategory)
            {
                $relatedCategoriesList[] = $relatedCategory->id;
            }

            foreach ($relatedProducts as $key => $relatedProduct)
            {
                $relatedProductsList[] = $relatedProduct->id;
            }

            $products[] = $this->productModel->listarTodos($relatedProductsList);
            $categories[] = $this->categoryModel->listarTodos($relatedCategoriesList);

            $products[] = $this->productModel->listar($relatedProductsList);
            $categories[] = $this->categoryModel->listar($relatedCategoriesList);

            $products[] = $this->productModel->listarTodos([$menu->featured_product_id]);
            $products[] = $this->productModel->listar([$menu->featured_product_id]);
        }

        return view('admin.menu.index', compact('products', 'categories'));
	}
}
