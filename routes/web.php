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

Route::get('/', function () {
	if (Auth::check()){
		return redirect('/home');
	}
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas del controlador de Posts
//Route::post('posts/create', 'PostController@create');
//Route::get('posts/delete/{id}', 'PostController@delete');
Route::post('posts/create', array(
		'as' => 'createPost',
		'middleware'=> 'auth',
		'uses'=> 'PostController@create'
));
Route::get('posts/delete/{id}', array(
		'as' => 'deletePost',
		'middleware'=> 'auth',
		'uses'=> 'PostController@delete'
));

Route::get('images/{filename}', array(
		'as' => 'getPostImage',
		'uses'=> 'PostController@getPostImage'
));
Route::get('videos/{filename}', array(
		'as' => 'getPostVideo',
		'uses'=> 'PostController@getPostVideo'
));

Route::get('profiles/{filename}', array(
		'as' => 'getUserImage',
		'uses'=> 'HomeController@getUserImage'
));

Route::post('comments/create',array(
	'as' => 'createComment',
	'middleware'=> 'auth',
	'uses' => 'CommentsController@create',
));


Route::post('/buscador',array(
	'as' => 'buscador',
	'middleware' => 'auth',
	'uses' => 'HomeController@search',
));