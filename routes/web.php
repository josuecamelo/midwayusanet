<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Ajustes de rotas (SEO) */

Route::redirect('/products/anti-age', '/product/anti&age', 301);
Route::redirect('/products/beauty-sleep', '/product/beauty&sleep', 301);

/**/

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/home', 'IndexController@home')->name('home');
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/quality', 'QualityController@index')->name('quality');

Route::get('/products/{offers?}/{line?}/{type?}/{goal?}/{category?}/{flavor?}', ['as' => 'products.list', 'uses' => 'ProductController@index']);
Route::get('/products/offers', ['as' => 'products.offers', 'uses' => 'ProductController@index']);
//Route::get('/produtos', 'ProductController@index')->name('produtos');
Route::get('/product/{slug}/{sabor?}', ['as' => 'produto_exibicao', 'uses' => 'ProductController@product']);
//Route::get('/products/{type}/{category}', ['as' => 'produto_categoria', 'uses' => 'ProductController@obterPorTipoCategoria']);

Route::group(['prefix' => 'team-midway', 'as' => 'team-midway.'], function () use ($router) {
    $router->get('/', ['as' => 'list', 'uses' => 'AthleteController@index']);
    $router->get('{slug}', ['as' => 'detail', 'uses' => 'AthleteController@athlete']);
});

Route::get('/objetivos', 'GoalController@index')->name('objetivos');
Route::get('/objetivos/{goal}', ['as' => 'objetivo_exibicao', 'uses' => 'GoalController@goal']);

Route::get('/historia', 'HistoryController@index')->name('historia');
Route::get('/treinos', 'TrainingController@index')->name('treinos');

Route::get('/revenda', 'ResaleController@index')->name('revenda');
Route::post('/salvar-revenda', 'ResaleController@store')->name('salvar-revenda');

$router->group(['prefix' => 'lojas', 'as' => 'lojas.'], function () use ($router)
{
	$router->get('/', ['as' => 'index', 'uses' => 'StoreController@index']);
	$router->get('/pesquisar', ['as' => 'pesquisar', 'uses' => 'StoreController@pesquisar']);
	$router->get('/json', ['as' => 'json', 'uses' => 'StoreController@json']);
	$router->get('/pesquisa/json', ['as' => 'pesquisaJson', 'uses' => 'StoreController@pesquisaJson']);
});

$router->group(['prefix' => 'blog', 'as' => 'blog.'], function () use ($router)
{
    $router->get('{slug}', ['as' => 'see', 'uses' => 'BlogPostAdminController@see']);
    $router->get('/', ['as' => 'index', 'uses' => 'BlogPostAdminController@siteIndex']);
});

$router->group(['prefix' => 'science', 'as' => 'science.'], function () use ($router)
{
    $router->get('/', ['as' => 'index', 'uses' => 'BlogPostAdminController@siteIndex']);
});

Route::get('/contato', 'ContactController@index')->name('contato');

Route::get('/inscreverse', 'SubscribeController@index')->name('inscreverse');
Route::post('/inscrever', 'SubscribeController@store')->name('inscrever');

Route::get('/custom-plan', 'CustomPlanController@index')->name('custom-plan');
Route::post('/custom-plan/send', 'CustomPlanController@send')->name('custom-plan-send');

//testes
Route::get('/testes/{cep}', 'TesteController@index');

//final rotas de testes

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'adminCheck']], function () use ($router)
{
	Route::view('/', 'admin.index')->name('admin');
	
	$router->group(['prefix' => 'produtos', 'as' => 'produtos.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'ProductAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'ProductAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'ProductAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'ProductAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'ProductAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'ProductAdminController@update']);
		$router->get('{topico_id}/topic/destroy', ['as' => 'remover_topico', 'uses' => 'ProductAdminController@topicoDestroy']);
		$router->get('{portion_id}/portion/destroy', ['as' => 'remover_porcao', 'uses' => 'ProductAdminController@portionDestroy']);
	});
	
	$router->group(['prefix' => 'linhas', 'as' => 'linhas.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'LineAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'LineAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'LineAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'LineAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'LineAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'LineAdminController@update']);
	});
	
	$router->group(['prefix' => 'objetivos', 'as' => 'objetivos.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'GoalAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'GoalAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'GoalAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'GoalAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'GoalAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'GoalAdminController@update']);
	});
	
	$router->group(['prefix' => 'tipos', 'as' => 'tipos.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'TypeAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'TypeAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'TypeAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'TypeAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'TypeAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'TypeAdminController@update']);
	});
	
	$router->group(['prefix' => 'categorias', 'as' => 'categorias.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'CategoryAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'CategoryAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'CategoryAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'CategoryAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'CategoryAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'CategoryAdminController@update']);
	});
	
	$router->group(['prefix' => 'sabores', 'as' => 'sabores.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'FlavorAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'FlavorAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'FlavorAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'FlavorAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'FlavorAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'FlavorAdminController@update']);
	});
	
	$router->group(['prefix' => 'treinos', 'as' => 'treinos.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'TrainingAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'TrainingAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'TrainingAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'TrainingAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'TrainingAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'TrainingAdminController@update']);
		
		$router->group(['prefix' => 'categorias', 'as' => 'categorias.'], function () use ($router)
		{
			$router->get('/', ['as' => 'listar', 'uses' => 'TrainingCategoryAdminController@index']);
			$router->post('store', ['as' => 'gravar', 'uses' => 'TrainingCategoryAdminController@store']);
			$router->get('create', ['as' => 'criar', 'uses' => 'TrainingCategoryAdminController@create']);
			$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'TrainingCategoryAdminController@destroy']);
			$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'TrainingCategoryAdminController@edit']);
			$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'TrainingCategoryAdminController@update']);
		});
	});
	
	$router->group(['prefix' => 'videos', 'as' => 'videos.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'VideoAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'VideoAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'VideoAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'VideoAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'VideoAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'VideoAdminController@update']);
		
		$router->group(['prefix' => 'categorias', 'as' => 'categorias.'], function () use ($router)
		{
			$router->get('/', ['as' => 'listar', 'uses' => 'VideoCategoryAdminController@index']);
			$router->post('store', ['as' => 'gravar', 'uses' => 'VideoCategoryAdminController@store']);
			$router->get('create', ['as' => 'criar', 'uses' => 'VideoCategoryAdminController@create']);
			$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'VideoCategoryAdminController@destroy']);
			$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'VideoCategoryAdminController@edit']);
			$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'VideoCategoryAdminController@update']);
		});
	});
	
	$router->group(['prefix' => 'atletas', 'as' => 'atletas.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'AthleteAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'AthleteAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'AthleteAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'AthleteAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'AthleteAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'AthleteAdminController@update']);
	});
	
	$router->group(['prefix' => 'permissoes', 'as' => 'permissoes.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'PermissionAdminController@index']);
		$router->get('usuario/{user_id}/edit', ['as' => 'editar', 'uses' => 'PermissionAdminController@edit']);
		$router->get('{permissao_id}/permitir', ['as' => 'permitir', 'uses' => 'PermissionAdminController@setPermissao']);
	});
	
	$router->group(['prefix' => 'lojas', 'as' => 'lojas.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'StoreAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'StoreAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'StoreAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'StoreAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'StoreAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'StoreAdminController@update']);
	});

    $router->group(['prefix' => 'blog/posts', 'as' => 'posts.'], function () use ($router)
    {
        $router->get('/news', ['as' => 'news', 'uses' => 'BlogPostAdminController@index']);
        $router->get('/science', ['as' => 'science', 'uses' => 'BlogPostAdminController@index']);
        $router->get('{t}/create', ['as' => 'create', 'uses' => 'BlogPostAdminController@create']);
        $router->get('{post}/destroy', ['as' => 'destroy', 'uses' => 'BlogPostAdminController@destroy']);
    });

    $router->get('blog/categories/{category}/destroy', ['as' => 'categories.destroy', 'uses' => 'BlogCategoryAdminController@destroy']);
    Route::resource('blog/categories', 'BlogCategoryAdminController', ['except' => ['show','destroy']]);
    Route::resource('blog/posts', 'BlogPostAdminController', ['only' => ['store','edit','update']]);

	
	$router->group(['prefix' => 'menus', 'as' => 'menus.'], function () use ($router)
	{
		$router->get('/{menu_id?}', ['as' => 'listar', 'uses' => 'MenuAdminController@index']);
		//$router->post('store', ['as' => 'gravar', 'uses' => 'MenuAdminController@store']);
		/*$router->get('create', ['as' => 'criar', 'uses' => 'MenuAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'MenuAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'MenuAdminController@edit']);*/
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'MenuAdminController@update']);
	});
	
	$router->group(['prefix' => 'icons', 'as' => 'icons.'], function () use ($router)
	{
		$router->get('/', ['as' => 'listar', 'uses' => 'IconAdminController@index']);
		$router->post('store', ['as' => 'gravar', 'uses' => 'IconAdminController@store']);
		$router->get('create', ['as' => 'criar', 'uses' => 'IconAdminController@create']);
		$router->get('{id}/destroy', ['as' => 'remover', 'uses' => 'IconAdminController@destroy']);
		$router->get('{id}/edit', ['as' => 'editar', 'uses' => 'IconAdminController@edit']);
		$router->post('{id}/update', ['as' => 'atualizar', 'uses' => 'IconAdminController@update']);
	});
	
});

Route::group(['prefix' => 'atualizar-rotas'], function () use ($router)
{
	Route::get('/', function ()
	{
		$routeCollection = Route::getRoutes();
		foreach ($routeCollection as $rt)
		{
			if (preg_match('[admin]', $rt->getPrefix()) && $rt->getName() != 'admin')
			{
				$controller = explode('\\', explode('@', $rt->getActionName())[0])[3];
				$controllerAction = explode('\\', $rt->getActionName())[3];
				
				$res = \App\Permission::where('controller', $controller)
					->where('controller_action', $controllerAction)->first();
				
				if (!$res)
				{
					\App\Permission::create([
						'controller' => $controller,
						'controller_action' => $controllerAction,
						'route_name' => $rt->getName(),
						'action_name' => explode('@', $rt->getActionName())[1]
					]);
				}
			}
		}
	});
});
