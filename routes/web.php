<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImovelController;
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
Route::middleware(['auth'])->group(function(){

    Route::put('/imoveis/{id}',[ImovelController::class,'update'])->name('imovel.update');
    Route::get('/imoveis/create',[ImovelController::class,'create'])->name('imovel.create');
    Route::get('/imoveis/editar/{id}',[ImovelController::class,'edit'])->name('imovel.edit');
    Route::delete('/imoveis/{id}',[ImovelController::class,'destroy'])->name('imovel.destroy');
    Route::get('/imoveis/{id}',[ImovelController::class,'show'])->name('imovel.show');
    Route::post('/imoveis/store',[ImovelController::class,'store'])->name('imovel.store');
    Route::get('/imoveis',[ImovelController::class,'index'])->name('imovel.index');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
