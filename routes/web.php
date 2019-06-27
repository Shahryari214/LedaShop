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


Route::group(['namespace' => 'Home'],function (){
    Route::get('/' , 'HomeController@index');
});

Route::group(['namespace' => 'User','middleware' => ['auth:web']],function (){
    Route::get('/user' , 'UserController@index');
});

Route::group(['namespace' => 'Admin','middleware' => ['auth:web','checkAdmin']],function (){
    Route::get('/admin' , 'PanelController@index');
    Route::resource('/admin/products' , 'ProductController');
    Route::resource('/admin/category','CategoryController');
    Route::post('/products/upload-image' , 'AdminController@uploadImageCKeditor');
    Route::get('category-tree-view',['uses'=>'TreeviewController@manageCategory']);
    Route::post('add-category',['as'=>'add.category','uses'=>'TreeviewController@addCategory']);
    Route::resource('roles' , 'RoleController');
    Route::resource('permissions' , 'PermissionController');


    Route::resource('/admin/users','UserController');
    Route::delete('/{user}/destroy' , 'UserController@destroy')->name('users.destroy');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
