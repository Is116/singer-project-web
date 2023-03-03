<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewsController;
use App\Http\Controllers\ContactController;

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

Route::get('/',[viewsController::class,'viewRecords'])->name('view-records');
Route::get('/add-record',[viewsController::class,'addRecord'])->name('add-record-view');
Route::get('/edit-record/{id}',[viewsController::class,'editRecord'])->name('edit-record-view');

Route::post('/record-add',[ContactController::class,'addRecord'])->name('record-add');
Route::put('/update-record',[ContactController::class,'updateRecord'])->name('update-record');
Route::get('/delete-srecord/{id}',[ContactController::class,'deleteRecord'])->name('delete-record');
Route::post('/search-contacts',[ContactController::class,'searchContacts'])->name('search-contacts');