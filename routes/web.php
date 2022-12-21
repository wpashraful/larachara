<?php

use App\Http\Controllers\newHopeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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

Route::get('/read-post', function () {
    return view('posts');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('lara-post');

    Route::post('/add-post', [PostController::class, 'add'])->name('add-post');
    Route::post('/read-post', [PostController::class, 'index'])->name('read');
    Route::get('/edit-post/{id}', [PostController::class, 'editpost'])->name('editpost');
    Route::post('/update-post/{id}', [PostController::class, 'update'])->name('update');
    Route::post('/delete-post/{id}', [PostController::class, 'delete'])->name('delete.post');

    

});

Route::get('/home', function(){
    return view('home');

})->middleware(['auth','verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/home-plus', [newHopeController::class, 'plusPost'])->name('plusPost');
    
});

require __DIR__.'/auth.php';
