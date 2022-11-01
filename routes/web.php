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
use App\Http\Controllers\ProfessoresController;

use App\Http\Controllers\ApiController;


Route::get('/', [AlunosController::class,'index01']);
Route::get('/alunos', [AlunosController::class,'index']);

Route::get('/alunos/novo', [AlunosController::class,'new']);
Route::post('/alunos/add', [AlunosController::class,'add']);
Route::get('alunos/{id}/edit', [AlunosController::class,'edit']);
Route::post('alunos/update/{id}', [AlunosController::class,'update']);
Route::delete('alunos/delete/{id}', [AlunosController::class,'delete']);

Route::get('/professores', [ProfessoresController::class,'index']);
Route::get('/professores/novo', [ProfessoresController::class,'new']);
Route::post('/professores/add', [ProfessoresController::class,'add']);
Route::get('professores/{id}/edit', [ProfessoresController::class,'edit']);
Route::post('professores/update/{id}', [ProfessoresController::class,'update']);
Route::delete('/professores/delete/{id}', [ProfessoresController::class,'delete']);




