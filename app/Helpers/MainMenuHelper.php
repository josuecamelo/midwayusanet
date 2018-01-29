<?php

/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 25/10/17
 * Time: 17:49
 */

namespace App\Helpers;

use App\Menu;


class MainMenuHelper
{
    private $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function getMenu($menu_id, $tipo)
    {
        $lista = '';

        $menu = $this
            ->model
            ->find($menu_id);

        if($tipo == 1){
            $categories = $menu
                ->relatedCategories()
                ->orderBy('item_order', 'asc')
                ->take(5)
                ->get();

            if($categories->count() > 0){
                foreach($categories as $category){
                    $lista.="<li><a href=''>$category->name</a></li>";
                }
            }
        }elseif($tipo == 2){
            $products = $menu
                ->relatedProducts()
                ->orderBy('item_order', 'asc')
                ->take(5)
                ->get();

            if($products->count() > 0) {
                foreach ($products as $product) {
                    $lista .= "<li><a href=''>$product->name</a></li>";
                }
            }
        }

        $lista.='';

        return $lista;
    }
}