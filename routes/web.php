<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('apuntes',['imagen' => true]);
});

Route::resource('apuntes',  App\Http\Controllers\ApuntesController::class );
Route::get('apuntes_ss', [App\Http\Controllers\ApuntesSSController::class, 'index'])->name('apuntes_ss');
Route::get('apuntes_ss/borrar/{id_apunte}', [App\Http\Controllers\ApuntesSSController::class, 'borrar'])->name('apuntes_ss.borrar');
Route::get('apuntes_pg', [App\Http\Controllers\ApuntesPGController::class, 'index'])->name('apuntes_pg');

Route::resource('tipos',  App\Http\Controllers\TiposController::class );