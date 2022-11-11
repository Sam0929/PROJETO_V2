<?php

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

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\CursosController;



Route::get('/', [AlunosController::class,'index01']);                                       // Home                    

Route::get('/alunos', [AlunosController::class,'index']);
Route::get('/alunos/novo', [AlunosController::class,'new'])->middleware('admin');
Route::post('/alunos/add', [AlunosController::class,'add'])->middleware('admin');
Route::get('alunos/{id}/edit', [AlunosController::class,'edit'])->middleware('admin');                           // Rotas para Alunos
Route::post('alunos/update/{id}', [AlunosController::class,'update'])->middleware('admin');
Route::delete('alunos/delete/{id}', [AlunosController::class,'delete'])->middleware('admin');

Route::get('/professores', [ProfessoresController::class,'index']);
Route::get('/professores/novo', [ProfessoresController::class,'new']);
Route::post('/professores/add', [ProfessoresController::class,'add']);
Route::get('professores/{id}/edit', [ProfessoresController::class,'edit']);
Route::post('professores/update/{id}', [ProfessoresController::class,'update']);           // Rotas para Professores
Route::delete('/professores/delete/{id}', [ProfessoresController::class,'delete']);

Route::get('/cursos', [CursosController::class, 'index']);
Route::get('/cursos/novo', [CursosController::class,'new']);
Route::post('/cursos/add', [CursosController::class,'add']);
Route::get('/cursos/{id}/edit/', [CursosController::class,'edit']);
Route::post('/cursos/update/{id}', [CursosController::class,'update']);
Route::delete('/cursos/delete/{id}', [CursosController::class,'delete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
