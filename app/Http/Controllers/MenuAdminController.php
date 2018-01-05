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
	    $menu = $this->menuModel->find(1);

	    dd($menu);

	    $products = $this->productModel->listarTodos();
	    $categories = $this->categoryModel->listarTodos();

		return view('admin.menu.index', compact('products', 'categories'));
	}
}
