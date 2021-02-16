<?php

use App\Http\Controllers\AbsensController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\MatakuliahsController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\JadwalsController;
use App\Http\Controllers\KontraksController;
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

Route::get('', [StudentsController::class, 'index']);
//Route::get('/students', [StudentController::class, 'index']);
//Route::get('/students/create', [StudentController::class, 'create']);
//Route::post('/students', [StudentController::class, 'store']);
//Route::get('/students/{id}', [StudentController::class, 'show']);
//Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
//Route::put('/students/{id}', [StudentController::class, 'update']);
//Route::delete('/students/{id}', [StudentController::class, 'destroy']);
Route::resources([
    'students' => StudentsController::class,
    'absens' => AbsensController::class,
    'matakuliahs' => MatakuliahsController::class,
    'semesters' => SemestersController::class,
    'jadwals' => JadwalsController::class,
    'kontraks' => KontraksController::class,

]);
Route::get('/absens/addmember/{absen}', [AbsensController::class, 'addmember']);
Route::put('/absens/addmember/{absen}', [AbsensController::class, 'updateaddmember']);
Route::put('/absens/deleteaddmember/{absen}', [AbsensController::class, 'deleteaddmember']);