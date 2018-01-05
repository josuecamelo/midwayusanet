<?php

namespace App\Http\Controllers;
use App\BlogCategory;
use App\BlogPost;
use Laracasts\Flash\Flash;
use Route;

class BlogPostAdminController extends Controller
{
    private $model;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(BlogPost $model){
        $this->model = $model;
    }

    public function index()
    {
        $t = (Route::is('posts.news'))?1:2;
        $posts = $this->model
            ->whereHas('category', function ($q)use($t){
                return $q->where('type',$t);
            })->orderBy('id', 'desc')->paginate(15);

        return view('admin.blog.posts.index', compact('posts','types','t'));
    }


    public function create($t)
    {
        $categories = BlogCategory::where('type',$t)->pluck('name','id')->all();
        return view('admin.blog.posts.create',compact('categories','t'));
    }


    public function store()
    {
        $save = $this->model->create(request()->all());

        if(request()->file() && $save){
            $path = 'uploads/blog/';
            $d['image'] = $this->doUpload(request()->file('file'),str_slug($save->title),$path);
            $save->update($d);
        }

        if($save->id != null) {
            Flash::success('Item adicionado com sucesso.');
        }else{
            Flash::error('O item não pode ser inserido. Tente novamente.');
        }

        $r = $save->category->type == 1 ?'posts.news':'posts.science';
        return redirect()->route($r);
    }


    public function edit($id)
    {
        $category = $this->model->find($id);
        $types = $this->model->types();
        return view('admin.blog.posts.edit', compact('category','types'));
    }

    public function update(BlogPost $category)
    {
        $save = $category->update(request()->all());

        if($save){
            Flash::success('Item alterado com sucesso.');
        }else{
            Flash::error('Não foi possível alterar este item. Tente novamente.');
        }

        return redirect()->route('posts.index');
    }

    public function destroy(BlogPost $category)
    {
        if($category){
            $category->delete();
            Flash::success('Item removido com sucesso.');
            return redirect()->route('posts.index');
        }
    }

    protected function doUpload($file,$nome,$path)
    {
        if(!File::exists($path)):
            File::makeDirectory($path, 0777, true, true);
        endif;
        $allow = ['jpg','gif','png','jpeg','bmp'];

        if(in_array(strtolower($file->getClientOriginalExtension()),$allow)){
            $nomeFinal = $nome.'-'.str_random(10) . '.' . strtolower($file->getClientOriginalExtension());
            $file->move($path, $nomeFinal);
        }
        return isset($nomeFinal)?$nomeFinal:null;
    }
}
