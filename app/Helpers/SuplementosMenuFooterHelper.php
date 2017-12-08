<?php

namespace App\Helpers;

use App\Category;

class SuplementosMenuFooterHelper
{
	private $categoryModel;
	
	public function __construct(Category $categoryModel)
	{
		$this->categoryModel = $categoryModel;
	}
	
	public function getMenu($type_id)
	{
		$menu = '<ul>';
		
		$categories = $this->categoryModel
			->where('type_id', $type_id)
			->orderBy('name', 'asc')
			->get();
		
		foreach ($categories as $id => $category)
		{
			$menu .= '<li><a href="' . route('produto_categoria', ['type' => $category->type->slug, 'category' => $category->slug]) . '">' . $category->name . '</a>';
		}
		
		$menu .= '</ul>';
		
		return $menu;
	}
}