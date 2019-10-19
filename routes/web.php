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
    return view('pages.index');
});

Route::get('/about','HelloController@aboutcatagory')->name('about');
Route::get('/write','Postcontroller@writePost')->name('write.post');

//CRUD..........
Route::get('all/catagory','HelloController@AllCatagory')->name('all.catagory');
Route::get('add/catagory','HelloController@AddCatagory')->name('add.catagory');
Route::post('store/catagory','HelloController@StoreCatagory')->name('store.category');
Route::get('view/category/{id}','boloController@ViewCatagory');
Route::get('delete/category/{id}','Postcontroller@DeleteCatagory');
Route::get('edit/category/{id}','boloController@EditCategory');
Route::post('update/category/{id}','boloController@UpdateCategory');

Route::post('store/post','Postcontroller@StorePost')->name('store.post');