<?php

/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 25/10/17
 * Time: 17:49
 */

namespace App\Helpers;

use App\Type;


class MenuHelper
{
    private $typeModel;

    public function __construct(Type $typeModel)
    {
        $this->typeModel = $typeModel;
    }

    public function getMenu()
    {
        $menu = '<ul>';

        $types = $this->typeModel
            ->orderBy('name', 'asc')
            ->get();

        foreach($types as $typeIdx => $type){
            if($type->categories()->count() > 0){
                $menu.='<li><a data-type-id="'.$type->id.'" href="#">'.$type->name.'</a>';
                $menu.='<ul>';

                foreach($type->categories()->orderBy('name', 'asc')->get() as $categoryIdx => $category){
                    //produtos da categoria
                    if($category->products()->count() > 0){
                        $menu.= '<li><a data-category-id="'.$category->id.'" href="#">'.$category->name.'</a>';
                        $menu.='<ul>';

                        $products = $category->productsOfMenu($category->id);

                        foreach($products as $productIdx => $product){
                            $slug = $product->last_name_slug ? $product->slug . '&' . $product->last_name_slug : $product->slug;
                            $sabor = isset($product->flavor->id) ? $product->flavor->slug : null;
                            $menu.= '<li><a href="'.route('produto_exibicao', [$slug, $sabor]).'">'.$product->name.' ' . $product->last_name .'</a>';

                            //se é o ultimo produto fechar o ul do categoria
                            if($productIdx == (count($category->productsOfMenu($category->id)) - 1)){
                                $menu.='</ul>';
                            }
                        }
                    }

                    //se é o ultima categoria fechar o ul do type
                    if($categoryIdx == ($type->categories->count() - 1)){
                        $menu.='</ul>';
                    }
                }
            }
        }

        $menu.='</ul>';

        return $menu;
    }
}