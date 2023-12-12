<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[Homecontroller::class,'homepage']);
Route::get('/articles',[Homecontroller::class,'articles']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[Homecontroller::class,'index'])->middleware('auth')->name('home');
Route::get('/post',[Homecontroller::class,'post'])->middleware(['auth', 'admin']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Route::middleware(['auth','admin'])->group(function(){
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// });

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagsController::class);
Route::resource('articles', ArticleController::class);