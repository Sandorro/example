<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuitarController;
use App\Http\Controllers\GoodController;

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

use App\Http\Controllers\MainController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', 'App\Http\Controllers\MainController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('guitar', 'App\Http\Controllers\GuitarController');

Route::get('good/{tabl}/{id}', 'App\Http\Controllers\GoodController@index');

Route::get('good/{tabl}', 'App\Http\Controllers\GoodController@clas');

Route::post('getListOver', 'App\Http\Controllers\GoodController@getListOver');

Route::post('getListLess', 'App\Http\Controllers\GoodController@getListLess');

Route::post('/cart', 'App\Http\Controllers\CartController@index')->name('cartIndex');

Route::post('/add-to-cart', 'App\Http\Controllers\CartController@addToCart')->name('addToCart');

Route::post('/deleteFromCart', 'App\Http\Controllers\CartController@deleteFromCart')->name('deleteFromCart');

Route::post('/cart/schAjax', 'App\Http\Controllers\CartController@actionSchAjax')->name('actionSchAjax');

Route::post('/cart/price', 'App\Http\Controllers\CartController@actionPrice')->name('actionPrice');

Route::resource('/order', 'App\Http\Controllers\OrderController');

Route::get('/changeLogin', 'App\Http\Controllers\Auth\ChangeLoginController@index');

Route::get('/mainPage', 'App\Http\Controllers\GoodController@clean');
