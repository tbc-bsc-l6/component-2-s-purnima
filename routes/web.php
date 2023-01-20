<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CDsController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginControllers;

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

Auth::routes();

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('admin/home',[HomeController::class, 'adminHome'])->name('ahome');
    Route::resource('/admin/books', BooksController::class);
    Route::resource('/admin/cds', CDsController::class);
    Route::resource('/admin/games', GamesController::class);
    
});

Route::middleware(['auth', 'is_user'])->group(function () {
    
    Route::get('/home',[HomeController::class, 'userHome'])->name('user.home');
    Route::get('/user/books',[BooksController::class, 'userIndex'])->name('userBooks');
    Route::get('/user/cds',[CDsController::class, 'userIndex'])->name('userCds');
    Route::get('/user/games',[CDsController::class, 'userIndex'])->name('userGames');
});
