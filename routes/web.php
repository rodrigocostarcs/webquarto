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

    Route::post('imoveis/store',[ImovelController::class,'store'])->name('imovel.store');
    Route::get('/imoveis',[ImovelController::class,'index'])->name('imovel.index');
    Route::get('/imoveis/create',[ImovelController::class,'create'])->name('imovel.create');

});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
