<?php

use App\Http\Controllers\TblOpePeliculasController;
use App\Http\Controllers\TblOpeFuncionController;
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


//Route::get('/CineUbam', [TblOpePeliculasController::class, 'index'])->name('peliculas.index');
Route::get('/', [TblOpePeliculasController::class, 'index'])->name('peliculas.index');
Route::post('/store', [TblOpePeliculasController::class, 'store'])->name('peliculas.store');
Route::post('/store2', [TblOpeFuncionController::class, 'store'])->name('funcion.store');
//Route::get('/', [TblOpeFuncionController::class, 'index'])->name('funcion.index');
//Route::get('/edit', [TblOpePeliculaController::class, 'edit'])->name('pelicula.edit');