<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
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

Route::get('/dashboard', function () {
   return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

 require __DIR__.'/auth.php';
Route::get('contact',[FrontendController::class,'contact']);
Route::get('contact','FrontendController@contact');
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('categories',[CategoryController::class,'categories'])->name('categories');
Route::get('add-category',[CategoryController::class,'addcategory'])->name('addcategory');
Route::get('delete-category/{bilai}',[CategoryController::class,'deletecategory'])->name('deletecategory');
Route::post('post-category',[CategoryController::class,'postcategory'])->name('postcategory');
Route::post('update-category',[CategoryController::class,'updatecategory'])->name('updatecategory');
Route::get('edit-category/{bilai}',[CategoryController::class,'editcategory'])->name('editcategory');