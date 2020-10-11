<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ExcelExportController;
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

Route::get('/', [BooksController::class, 'index']);
Route::get('/download', [ExcelExportController::class, 'export'])->name("download");
//Route::get('user/profile', [UserProfileController::class, 'show'])->name('profile');
//Route::any('download', ['as' => 'books-dl', 'uses' =>'ExcelExportController@export']);
//Route::get('download', [ExcelExportController::class, 'export']);
Route::resource('books', BooksController::class);