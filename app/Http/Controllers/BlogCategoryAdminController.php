<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Laracasts\Flash\Flash;

class BlogCategoryAdminController extends Controller
{
	private $model;
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	public function __construct(BlogCategory $model)
	{
		$this->model = $model;
	}
	
	public function index()
	{
		$categories = $this->model
			->orderBy('name', 'ASC')
			->paginate(15);
		
		$types = $this->model->types();
		
		return view('admin.blog.categories.index', compact('categories', 'types'));
	}
	
	
	public function create()
	{
		$types = $this->model->types();
		return view('admin.blog.categories.create', compact('types'));
	}
	
	
	public function store()
	{
		$save = $this->model->create(request()->all());
		
		if ($save->id != null)
		{
			Flash::success('Item added successfully.');
		}
		else
		{
			Flash::error('The item can not be inserted. Try again.');
		}
		return redirect()->route('categories.index');
	}
	
	
	public function edit($id)
	{
		$category = $this->model->find($id);
		$types = $this->model->types();
		return view('admin.blog.categories.edit', compact('category', 'types'));
	}
	
	public function update(BlogCategory $category)
	{
		$save = $category->update(request()->all());
		
		if ($save)
		{
			Flash::success('Item successfully changed.');
		}
		else
		{
			Flash::error('This item could not be changed. Try again.');
		}
		
		return redirect()->route('categories.index');
	}
	
	public function destroy(BlogCategory $category)
	{
		if ($category)
		{
			$category->delete();
			Flash::success('Item successfully removed.');
			return redirect()->route('categories.index');
		}
	}
}
