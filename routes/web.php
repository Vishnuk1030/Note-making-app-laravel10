<?php

use App\Http\Controllers\NoteController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//create
Route::get('/create_note', [NoteController::class, 'create'])->name('create.note');

//store
Route::post('/create_note', [NoteController::class, 'store']);

//edit
Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('edit.note');

//update
Route::put('/update/{id}', [NoteController::class, 'update'])->name('update.note');

//delete
Route::get('/delete/{id}', [NoteController::class, 'delete'])->name('delete.note');

//view
Route::get('/view/{id}',[NoteController::class,'view'])->name('view.note');
