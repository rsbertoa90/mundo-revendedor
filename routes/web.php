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

/* FACEBOOK LOGIN */
Route::get('/redirect', 'FacebookUserController@redirect');
Route::get('/callback', 'FacebookUserController@callback');
/*  */

Auth::routes();

Route::middleware('CheckSuper')->prefix('super')->group(function(){
    Route::get('/', 'SuperController@panel');

    Route::post('/category/image','CategoryController@uploadImage')->middleware('OptimizeImages');

    Route::put('/metadata','MetadataController@update');
});


Route::middleware('CheckAdmin')->prefix('admin')->group(function(){

    Route::get('/','AdminController@tableView');
    Route::get('/cotizador','AdminController@cotizador');

    Route::post('/category','CategoryController@create');
    Route::put('/category','CategoryController@update');


    Route::post('/product','ProductController@create');
    Route::put('/product','ProductController@update');
    Route::delete('/product/{id}','ProductController@destroy');

    Route::post('/product/image','ProductImageController@create')->middleware('OptimizeImages');
    Route::delete('/product/image/{id}','ProductImageController@destroy');

    Route::put('/order','OrderController@edit');
    Route::get('/ordenes','AdminController@orders');
    Route::get('/getOrders','OrderController@getOrders');

    Route::put('/config','ConfigController@update');
});

Route::get('/config','ConfigController@get');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function(){return redirect('/');});

Route::get('/cotizador','HomeController@cotizer');
Route::get('/regalos-empresariales','HomeController@regalosEmpresariales');
Route::post('/regalos-empresariales','MailController@regalosEmpresariales')->middleware('OptimizeImages');;
Route::get('/franquicia','HomeController@franquicia');
Route::post('/franquicia','MailController@franquicia');
Route::get('/sucursales','HomeController@sucursales');
Route::get('/contacto','HomeController@contacto');
Route::post('/contacto','MailController@contacto');
Route::get('/buscar','ProductController@searchResults');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Auth::routes();


Route::get('/getUser','HomeController@getUser');

Route::post('/cotizer/send','OrderController@create');

Route::get('/lista-de-precios','PdfController@prices');

Route::post('/suscription','SuscriptionController@create');

/* ESTAS RUTAS SIEMPRE AL FINAL */

Route::get('/{category}','CategoryController@detail');

Route::get('/{category}/{product}','ProductController@detail');