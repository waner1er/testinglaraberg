<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts', PostController::class)->middleware('auth');


Route::post('post', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::post('post-update', [PostController::class, 'update'])->name('posts.update')->middleware
('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix' => 'laraberg', 'middleware' => ['web', 'auth']], function() {
    Route::apiResource('blocks', 'VanOns\Laraberg\Http\Controllers\BlockController');
    Route::get('oembed', 'VanOns\Laraberg\Http\Controllers\OEmbedController');
});