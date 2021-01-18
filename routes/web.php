<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::post('users/edit/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

Route::get('login', function () {
    return view('welcome');
})->name('login');

//CLASE 9 VALIDACIONES

Route::resource('page', 'PageController');

//CLASE 10 BLADE AVANZADOS

Route::get('page/home',function(){
    return view('page.home',['title' => 'home']);
});

//CLASE 11 componente Laravel/UI

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//CLASE 12 trabajando con este ORM

Route::resource('employee','EmployeeController');
