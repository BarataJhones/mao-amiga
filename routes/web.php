<?php

use App\Http\Controllers\AulasController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [AulasController::class, 'listaAulasIndex'])->name('aula.listaIndex');

Route::middleware(['auth'])->group(function (){
    Route::get('/user', [AulasController::class, 'userAulasList'])->name('aula.userList');
    Route::get('/cadastro-aulas', [AulasController::class, 'cadastraAula'])->name('aula.cadastra');
});

Route::put('/aula/{id}', [AulasController::class, 'update'])->name('aula.update');
Route::get('/aula/edit-aula/{id}', [AulasController::class, 'edit'])->name('aula.edit');
Route::delete('/aula/{id}', [AulasController::class, 'destroy'])->name('aula.destroy');
Route::get('/aula/{id}', [AulasController::class, 'viewAula'])->name('aula.viewAula');
Route::post('/cadastro-aulas', [AulasController::class, 'store'])->name('aulas.store');
Route::get('/index', [AulasController::class, 'listaAulasIndex'])->name('aula.listaIndex');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';