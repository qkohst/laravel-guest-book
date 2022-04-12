<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/', 'HomeController',  [
    'uses' => ['index', 'create', 'store']
]);
Route::get('login', 'AuthController@login_page')->name('login');
Route::post('login', 'AuthController@login_post')->name('login');
Route::get('city/{code}', 'GetCityController@city');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
