<?php

/*use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController; */

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MunicipioController;
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
//use App\Models\Departamento;

Route::get('/', function () {
   
  /*  $departamentos = Departamento::all();

    foreach ($departamentos as $departamento) {
       echo $departamento->id_departamento."<br/>";
       echo $departamento->nombre_departamento."<br/>"."<hr>";
    }
    die();*/
    return view('welcome');   
});

/*
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/departamento', [DepartamentoController::class, 'depto'])->name('depto');
Route::post('/nuevo_departamento', [DepartamentoController::class, 'create'])->name('create');
Route::post('/editar_departamento', [DepartamentoController::class, 'edit'])->name('edit');
Route::get('/eliminar_departamento-{id}', [DepartamentoController::class, 'delete'])->name('delete');
Route::get('/municipio', [MunicipioController::class, 'muni'])->name('muni');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

// Rutas autenticadas
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas relacionadas con Departamentos
    Route::prefix('departamento')->group(function () {
        Route::get('/', [DepartamentoController::class, 'depto'])->name('depto');
        Route::post('/nuevo_departamento', [DepartamentoController::class, 'create'])->name('create');
        Route::post('/editar_departamento', [DepartamentoController::class, 'edit'])->name('edit');
        Route::get('/eliminar_departamento-{id}', [DepartamentoController::class, 'delete'])->name('delete');
    });

    // Rutas relacionadas con Municipios
    Route::get('/municipio', [MunicipioController::class, 'muni'])->name('muni');
    Route::post('/nuevo_municipio', [MunicipioController::class, 'create'])->name('create');
    Route::post('/editar_municipio', [MunicipioController::class, 'edit'])->name('edit');
    Route::get('/eliminar_municipio-{id}', [MunicipioController::class, 'delete'])->name('delete');

});


// Rutas de administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});