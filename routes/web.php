<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[InvoiceController::class,'home'])->name('home');
Route::get('/list',[InvoiceController::class,'list'])->name('list');
Route::get('/download/{invoice}',[InvoiceController::class,'download'])->name('download');