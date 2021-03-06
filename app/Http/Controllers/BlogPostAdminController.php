<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\Tag;
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
        $tg = new Tag();
	    $inputs = request()->all();
		$save = $this->model->create($inputs);

        if(isset($inputs['tag_id'])){
            foreach($inputs['tag_id'] as $t){
                $tem = $tg->whereSlug(str_slug($t))->first();
                if($tem){
                    $ids['tag_id'][] = $tem->id;
                } else{
                    $tag = $tg->create(['name'=>$t,'slug'=>str_slug($t)]);
                    $ids['tag_id'][] = $tag->id;
                }
            }
            $save->tags()->sync($ids['tag_id']);
        }
		
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
	    $tg = new Tag();
	    $inputs = request()->all();
        $inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		$save = $post->update($inputs);

        if(isset($inputs['tag_id'])){
            foreach($inputs['tag_id'] as $t){
                $tem = $tg->whereSlug(str_slug($t))->first();
                if($tem){
                    $ids['tag_id'][] = $tem->id;
                } else{
                    $tag = $tg->create(['name'=>$t,'slug'=>str_slug($t)]);
                    $ids['tag_id'][] = $tag->id;
                }
            }
            $post->tags()->sync($ids['tag_id']);
        }
		
		if (request()->file() && $save)
		{
			$path = 'uploads/blog/destaque';
			$d['image'] = $this->doUpload(request()->file('file'), str_slug($post->title), $path);
			$post->update($d);
		}
		
		if ($save){
			Flash::success('Item successfully changed.');
		}else{
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

   // Funções do site rotas publicas

    public function see($slug)
    {
        $post = $this->model->whereSlug($slug)->first();
        if(!$post){
            return abort(404);
        }
        $posts = BlogPost::last(6,$post->category->type,$post->id);

        return view('site.blog.see',compact('post','posts'));
    }

    public function siteIndex()
    {
        $t = (Route::is('science.index'))?2:1;
        $tagId = (request()->tag)?request()->tag:null;
        if($tagId){
            $tag = Tag::whereSlug($tagId)->first();
            if($tag){
                $title = 'Searching: '.$tag->name;
                $posts = BlogPost::whereHas('tags', function ($q) use ($tag){
                    $q->where('slug',$tag->slug);
                })->get();
            } else {
                $title = 'Tag not found';
                $posts = BlogPost::whereId(0)->get();
            }
        } else{
            $title = ($t == 1)? 'Blog':'Science';
            $posts = BlogPost::last(100,$t,null);
        }

        return view('site.blog.index',compact('post','posts','title','t'));
    }
}
