<?php

use App\Http\Controllers\ContatoController;
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

Route::get('/index', [ContatoController::class, 'index'])->name('contatos.index');
Route::get('/create', [ContatoController::class, 'create'])->name('contatos.create');
Route::post('/store', [ContatoController::class, 'store'])->name('contatos.store');
Route::get('/show/{id}', [ContatoController::class, 'show'])->name('contatos.show');
Route::get('/edit/{id}', [ContatoController::class, 'edit'])->name('contatos.edit');
Route::put('/update/{id}', [ContatoController::class, 'update'])->name('contatos.update');
Route::delete('/destroy/{id}', [ContatoController::class, 'destroy'])->name('contatos.destroy');


