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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('hhhh', function () {
        return view('layouts.master');
    });
Route::view('/', 'welcome')->name('home');

Route::get('/about/me', function () {
    return 'about me !';
});
Route::get('/contact', function () {
    return ['name' => "salam"];
});

Route::redirect('/about/me', '/contact');

Route::get('/posts','PostsController@index');
Route::get('/posts/{id}','PostsController@view')->name('posts.view');
Route::get('/category/{id}','PostsController@categoryposts')->name('postsOfcategory');

// ****************** admin route **************
Route::namespace('admin')->prefix('/admin/posts')->middleware(['auth' ,'admin'])->group(function(){





    Route::get('/','PostsController@index')->name('admin.posts');
    // ->middleware('Chekage');




    Route::get('createpost','PostsController@create')->name('admin.posts.create')->middleware('verified');
    Route::post('/','PostsController@store')->name('admin.posts.store');

    Route::get('{id}','PostsController@edit')->name('admin.posts.edit');
    Route::put('{id}','PostsController@update')->name('admin.posts.update');


    Route::delete('{id}','PostsController@delete')->name('admin.posts.delete');






});

// **************** category route ****************
Route::namespace('admin')->prefix('/admin/category')->middleware(['auth' ,'admin'])->group(function(){


    Route::get('/','CategoryController@indexCategory')->name('admin.category');

    Route::get('create','CategoryController@createCategory')->name('admin.category.create');

    Route::post('/','CategoryController@storeCategory')->name('admin.category.store');

    Route::get('{id}','CategoryController@editCategory')->name('admin.category.edit');
    Route::put('{id}','CategoryController@updateCategory')->name('admin.category.update');

    Route::delete('{id}','CategoryController@delete')->name('admin.category.delete');



});
Route::namespace('admin')->prefix('/admin/tag')->middleware(['auth' ,'admin'])->group(function(){

    Route::get('/','TagContoller@indexTag')->name('admin.tag');
    Route::get('create','TagContoller@create')->name('admin.tag.create');

    Route::post('/','TagContoller@store')->name('admin.tag.store');
    Route::get('{id}','TagContoller@editTag')->name('admin.tag.edit');
    Route::put('{id}','TagContoller@updateTag')->name('admin.tag.update');
    Route::delete('{id}','TagContoller@delete')->name('admin.tag.delete');






});
Route::get('/trashed','admin\PostsController@trashed')->name('admin.posts.trashed');


Route::delete('/restore/{id}/delete','admin\PostsController@forceDelete')->name('admin.posts.forceDelete')->middleware(['auth' ,'admin']);
Route::put('/restore/{id}/restore','admin\PostsController@restore')->name('admin.posts.restore')->middleware(['auth' ,'admin']);

Route::get('/statistac','admin\StatController@index')->name('statistac')->middleware(['auth' ,'admin']);


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/logout', function () {
  Auth::logout();
  return redirect('/login');
})->name('admin.logout');
Route::get('salam', function () {
    return view('layouts.default2');
});

