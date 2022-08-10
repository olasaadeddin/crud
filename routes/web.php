<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {

Route::get('/index','ProductController@index')->name('index');
Route::get('/create','ProductController@create')->name('create');
Route::post('store/','ProductController@store')->name('store');
Route::get('show/{product}','ProductController@show')->name('show');
Route::get('edit/{product}','ProductController@edit')->name('edit');
Route::put('edit/{product}','ProductController@update')->name('update');
Route::delete('/{product}','ProductController@destroy')->name('destroy');



});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

