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

Route::get('/', 'AllBooksController@index');
Route::get('/home', 'AllBooksController@index');
Route::resource('login', 'UserController');
Route::get('/contact-us', 'ContactController@show');
Route::post('/contact-us',  'ContactController@mailToAdmin');

/*Admin Routes*/
Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/new_item', 'NewItemController@index');
    Route::post('/new_item', 'NewItemController@create');
    Route::get('/datatable', 'NewItemController@show');
    Route::delete('/datatable/{id}/delete', 'NewItemController@destroy');
    Route::get('/new_item/{id}/edit', 'NewItemController@edit');
    Route::patch('/new_item/{id}/edit', 'NewItemController@update');
});

/*User Routes*/
Route::prefix('all_books')->group(function () {
    Route::get('/', 'AllBooksController@index');
    Route::get('/detail_page/{id}', 'AllBooksController@detail');
    Route::post('detail_page/{id}', 'AllBooksController@create');
    Route::post('/detail_page/{id}/comment', 'AllBooksController@comment');
    Route::delete('/detail_page/comment/delete/{comment_id}', 'AllBooksController@destroy');
    Route::post('/detail_page/{id}/favorite', 'FavoritesController@create');
    Route::delete('/detail_page/favorite/delete/{id}/{book_id}', 'AllBooksController@destroyFavorite');
    Route::get('/favorites_of/{id}', 'FavoritesController@index');
});

/*Route::get('/all_books', 'AllBooksController@index');
Route::get('/all_books/detail_page/{id}', 'AllBooksController@detail');
Route::post('/all_books/detail_page/{id}', 'AllBooksController@create');
Route::post('/all_books/detail_page/{id}/comment', 'AllBooksController@comment');
Route::delete('/all_books/detail_page/comment/delete/{comment_id}', 'AllBooksController@destroy')->name('comment.delete');*/


Route::get('user/{id}', function ($id){
    echo 'about 1 :P' .$id;
});

Auth::routes();


