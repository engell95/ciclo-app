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


//CLASE 20 VISTA INDEX Y BOTONES DE ACCION
Auth::routes();
Route::middleware(['auth'])->group(function () {

    //Route::get('/', [UserController::class, 'index']);
    Route::get('/',function(){
        return view('home',['title' => 'home']);
    });
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::post('users/edit/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('post','PostController');

    Route::get('posts','PostController@posts')->name('post.posts');

});


//Route::resource('verification', 'Auth.VerificationController');

//CLASE 9 VALIDACIONES

Route::resource('page', 'PageController');

//CLASE 10 BLADE AVANZADOS

Route::get('page/home',function(){
    return view('page.home',['title' => 'home']);
});

//CLASE 11 componente Laravel/UI


Route::get('/home', 'HomeController@index')->name('home');

//CLASE 12 trabajando con eloquent ORM

Route::resource('employee','EmployeeController');

//CLASE 13 trabajando con eloquent ORM relaciones



//CLASE 14 Colecciones y serialización de datos
use App\User;
Route::get('collections',function(){
    $users = User::all();
    //dd($users->contains(5));
    //dd($users->except([1,2,3]));
    //dd($users->only(1));
    //dd($users->find(4));
    dd($users->load('posts'));
});

Route::get('serialization',function(){
    $users = User::all();
    //dd($users->toArray());
    $user = $users->find(4);
    dd($user->json());
});

//CLASE 18 Colecciones y serialización de datos
//Route::get('/', 'PageController@posts');
Route::get('blog/{post}','PageController@post')->name('post');

Route::get('/home', 'HomeController@index')->name('home');
