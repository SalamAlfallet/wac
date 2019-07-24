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


Route::get('hh', function () {
    return view('admin.users.role');
});

Route::get('web', function () {
    return view('posts.index2');
});
Route::view('/', 'welcome')->name('home');

Route::get('/about/me', function () {
    return 'about me !';
});
Route::get('/contact', function () {
    return ['name' => "salam"];
});

Route::redirect('/about/me', '/contact');
Route::get('/posts', 'PostsController@index2')->name('home.page');
Route::get('/posts2', 'PostsController@index');
Route::get('/posts/{id}', 'PostsController@view')->name('posts.view');
Route::get('/category/{id}', 'PostsController@categoryposts')->name('postsOfcategory');
Route::post('/comment/create', 'CommentsController@store')->name('comment.store');

// ********************* Rout likes *****************
Route::get('/posts/addlike/{id}', 'PostsController@addLike')->name('post.like');



// ****************** admin route **************
Route::namespace('admin')->prefix('/admin/posts')->middleware(['auth', 'admin'])->group(function () {



    Route::get('notifications', 'NotificationsController@index')->name('admin.notifications');


    Route::get('/', 'PostsController@index')->name('admin.posts');
    // ->middleware('Chekage');



    Route::get('createpost', 'PostsController@create')->name('admin.posts.create')->middleware('verified');
    Route::post('/', 'PostsController@store')->name('admin.posts.store');

    Route::get('{id}', 'PostsController@edit')->name('admin.posts.edit');
    Route::put('{id}', 'PostsController@update')->name('admin.posts.update');


    Route::delete('{id}', 'PostsController@delete')->name('admin.posts.delete');
});

// **************** category route **********************************

Route::namespace('admin')->prefix('/admin/category')->middleware(['auth', 'admin'])->group(function () {


    Route::get('/', 'CategoryController@indexCategory')->name('admin.category');

    Route::get('create', 'CategoryController@createCategory')->name('admin.category.create');

    Route::post('/', 'CategoryController@storeCategory')->name('admin.category.store');

    Route::get('{id}', 'CategoryController@editCategory')->name('admin.category.edit');
    Route::put('{id}', 'CategoryController@updateCategory')->name('admin.category.update');

    Route::delete('{id}', 'CategoryController@delete')->name('admin.category.delete');
});


// **************************  Tags route *************************
Route::namespace('admin')->prefix('/admin/tag')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/', 'TagContoller@indexTag')->name('admin.tag');
    Route::get('create', 'TagContoller@create')->name('admin.tag.create');

    Route::post('/', 'TagContoller@store')->name('admin.tag.store');
    Route::get('{id}', 'TagContoller@editTag')->name('admin.tag.edit');
    Route::put('{id}', 'TagContoller@updateTag')->name('admin.tag.update');
    Route::delete('{id}', 'TagContoller@delete')->name('admin.tag.delete');
});

// **************************  comments route *************************

Route::namespace('admin')->prefix('/admin/comments')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'CommentsController@index')->name('admin.comments');
    Route::delete('{id}', 'CommentsController@delete')->name('admin.comments.delete');

    Route::get('{id}', 'CommentsController@edit_Status')->name('admin.comments.edit');
    Route::put('{id}', 'CommentsController@update_Status')->name('admin.comments.update');
});
// **************************************

Route::get('downloads/{id}/preview', 'admin\DownloadsController@preview')->name('admin.downloads.preview')->middleware(['auth', 'admin']);

Route::get('/trashed', 'admin\PostsController@trashed')->name('admin.posts.trashed');


Route::delete('/restore/{id}/delete', 'admin\PostsController@forceDelete')->name('admin.posts.forceDelete')->middleware(['auth', 'admin']);
Route::put('/restore/{id}/restore', 'admin\PostsController@restore')->name('admin.posts.restore')->middleware(['auth', 'admin']);

// ********************** Route Statistac ******************************
Route::get('/statistac', 'admin\StatController@index')->name('statistac')->middleware(['auth', 'admin']);


// *********************** Route Downloads && Upload ***********************
Route::delete('downloads/{id}/delete', 'admin\DownloadsController@delete')->name('admin.downloads.delete')->middleware(['auth', 'admin']);
Route::get('downloads', 'admin\DownloadsController@index')->name('downloads')->middleware(['auth', 'admin']);
Route::post('downloads', 'admin\DownloadsController@store')->name('admin.downloads.store')->middleware(['auth', 'admin']);
Route::get('downloads/{id}/download', 'admin\DownloadsController@downloads')->name('admin.downloads.download')->middleware(['auth', 'admin']);


// ********************************** Route user **************************
Route::get('/admin/users', 'admin\UsersController@index')->name('admin.users')->middleware(['auth', 'admin']);
Route::get('admin/users/create', 'admin\UsersController@create')->name('admin.users.create')->middleware(['auth', 'admin']);
Route::post('/admin/users', 'admin\UsersController@store')->name('admin.users.store')->middleware(['auth', 'admin']);


// *************************** route Role ****************************
Route::get('/admin/roles', 'admin\RolesController@index')->name('admin.users.roles')->middleware(['auth', 'admin']);
Route::post('/admin/users/roles', 'admin\RolesController@store')->name('admin.roles.store')->middleware(['auth', 'admin']);
Route::delete('admin/{id}/role', 'admin\RolesController@delete')->name('admin.roles.delete')->middleware(['auth', 'admin']);


// ************************ Route Permission ***************************
Route::get('/admin/permission', 'admin\PermissionController@index')->name('admin.users.permission')->middleware(['auth', 'admin']);
Route::post('/admin/users/permission', 'admin\PermissionController@store')->name('admin.permissions.store')->middleware(['auth', 'admin']);
Route::delete('admin/{id}/permission', 'admin\PermissionController@delete')->name('admin.permissions.delete')->middleware(['auth', 'admin']);


// ************************ Route Permission_Role ***************************
Route::get('/admin/permissionRole', 'admin\PermissionRoleController@index')->name('admin.users.permissionRole')->middleware(['auth', 'admin']);
Route::post('/admin/users/perk4missionRole', 'admin\PermissionRoleController@store')->name('admin.permissionsRole.store')->middleware(['auth', 'admin']);


// ************************ Route Setting site ***************************
Route::get('/admin/setting', 'admin\SettingController@index')->name('admin.web.setting')->middleware(['auth', 'admin']);
Route::post('/admin/setting/update','admin\SettingController@update')->name('admin.web.setting.update')->middleware(['auth', 'admin']);


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
