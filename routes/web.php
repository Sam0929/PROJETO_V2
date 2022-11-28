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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;




Route::get('/', [AlunosController::class,'index01']);                                       // Home

Route::get('/login', [UserController::class,'index']);                                    // Login
Route::post('/auth', [UserController::class, 'auth']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/userinfo', [UserController::class, 'userinfo'])->middleware('auth');  

Route::get('/alunos', [AlunosController::class,'index'])->middleware('admin');            
Route::get('/alunos/novo', [AlunosController::class,'new']) ->middleware('admin');           
Route::post('/alunos/add', [AlunosController::class,'add']) ->middleware('admin');           
Route::get('alunos/{id}/edit', [AlunosController::class,'edit'])  ->middleware('auth');                          // Rotas para Alunos
Route::post('alunos/update/{id}', [AlunosController::class,'update']) ->middleware('auth'); 
Route::delete('alunos/delete/{id}', [AlunosController::class,'delete']) ->middleware('admin');

Route::get('/professores', [ProfessoresController::class,'index'])->middleware('profe');
Route::get('/professores/novo', [ProfessoresController::class,'new']) ->middleware('admin');
Route::post('/professores/add', [ProfessoresController::class,'add']) ->middleware('admin');
Route::get('professores/{id}/edit', [ProfessoresController::class,'edit'])->middleware('profe');
Route::post('professores/update/{id}', [ProfessoresController::class,'update']) ->middleware('profe');           // Rotas para Professores
Route::delete('/professores/delete/{id}', [ProfessoresController::class,'delete']) ->middleware('admin');
Route::get('/professores/{id}/add', [CursosController::class,'addCurso']) ->middleware('profe');
Route::get('/professores/{id}/cursos', [ProfessoresController::class,'cursos']) ->middleware('profe');

Route::get('/cursos', [CursosController::class, 'index'])->middleware('auth');
Route::get('/cursos/info/{id}', [CursosController::class, 'CursosInfo'])->middleware('auth');
Route::get('/cursos/novo', [CursosController::class,'new']) ->middleware('admin');
Route::post('/cursos/add', [CursosController::class,'add']) ->middleware('admin');
Route::get('/cursos/{id}/edit/', [CursosController::class,'edit']) ->middleware('admin');
Route::post('/cursos/update/{id}', [CursosController::class,'update']) ->middleware('admin');
Route::delete('/cursos/delete/{id}', [CursosController::class,'delete']) ->middleware('admin');

Route::post('/cursos/{id}/join', [CursosController::class,'Join']) ->middleware('auth');

Route::get('/cursos/aluno', [CursosController::class,'CursosDoAluno']) ->middleware('auth');
Route::get('/cursos/profe', [CursosController::class,'CursosDoProfe']) ->middleware('profe');
Route::delete('/cursos/{id}/leave', [CursosController::class,'LeaveCurso']) ->middleware('auth');

