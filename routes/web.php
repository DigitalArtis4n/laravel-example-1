<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/dashboard', function(){
    return Redirect::to('/posts');
});


Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);

    Route::get('/count-post',function(){
        return PostController::countPosts();
    })->name("count-posts");


});

require __DIR__.'/auth.php';

