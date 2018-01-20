<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use Laracasts\Flash\Flash;
use Route;
use Illuminate\Support\Facades\File;

class BlogPostAdminController extends Controller
{
	private $model;
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	public function __construct(BlogPost $model)
	{
		$this->model = $model;
	}
	
	public function index()
	{
		$t = (Route::is('posts.news')) ? 1 : 2;
		$posts = $this->model
			->whereHas('category', function ($q) use ($t)
			{
				return $q->where('type', $t);
			})->orderBy('id', 'desc')->paginate(15);
		
		return view('admin.blog.posts.index', compact('posts', 'types', 't'));
	}
	
	
	public function create($t)
	{
		$categories = BlogCategory::where('type', $t)->pluck('name', 'id')->all();
		return view('admin.blog.posts.create', compact('categories', 't'));
	}
	
	
	public function store()
	{
		$save = $this->model->create(request()->all());
		
		if (request()->file() && $save)
		{
			$path = 'uploads/blog/destaque';
			$d['image'] = $this->doUpload(request()->file('file'), str_slug($save->title), $path);
			$save->update($d);
		}
		
		if ($save->id != null)
		{
			Flash::success('Item added successfully.');
		}
		else
		{
			Flash::error('The item can not be inserted. Try again.');
		}
		
		$r = $save->category->type == 1 ? 'posts.news' : 'posts.science';
		return redirect()->route($r);
	}
	
	
	public function edit($id)
	{
		$post = $this->model->find($id);
		$t = $post->category->type;
		$categories = BlogCategory::where('type', $t)->pluck('name', 'id')->all();
		return view('admin.blog.posts.edit', compact('post', 't', 'categories'));
	}
	
	public function update(BlogPost $post)
	{
		$save = $post->update(request()->all());
		
		if (request()->file() && $save)
		{
			$path = 'uploads/blog/destaque';
			$d['image'] = $this->doUpload(request()->file('file'), str_slug($post->title), $path);
			$post->update($d);
		}
		
		if ($save)
		{
			Flash::success('Item successfully changed.');
		}
		else
		{
			Flash::error('This item could not be changed. Try again.');
		}
		
		$r = $post->category->type == 1 ? 'posts.news' : 'posts.science';
		return redirect()->route($r);
	}
	
	public function destroy(BlogPost $category)
	{
		if ($category)
		{
			$category->delete();
			Flash::success('Item successfully removed.');
			return redirect()->route('posts.index');
		}
	}

	public function see($slug)
    {
        dd($slug);
    }
	
	protected function doUpload($file, $nome, $path)
	{
		if (!File::exists($path)):
			File::makeDirectory($path, 0777, true, true);
		endif;
		$allow = ['jpg', 'gif', 'png', 'jpeg', 'bmp'];
		
		if (in_array(strtolower($file->getClientOriginalExtension()), $allow))
		{
			$nomeFinal = $nome . '-' . str_random(10) . '.' . strtolower($file->getClientOriginalExtension());
			$file->move($path, $nomeFinal);
		}
		return isset($nomeFinal) ? $nomeFinal : null;
	}
}
