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

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return 'Você não esta autenticado.';
})->name('login');

Route::prefix('posts')->group(function () {
    Route::name('post.')->group(function () {
        Route::get('/', [PostsController::class, 'index'])
            ->name('index');

        Route::middleware('auth')->group(function () {
            Route::get('criar-novo-post', [PostsController::class, 'create'])
                ->name('create');
            Route::post('store', [PostsController::class, 'store'])
                ->name('store');
        });
    });
});
