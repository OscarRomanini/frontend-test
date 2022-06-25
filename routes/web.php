<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::controller(HomeController::class)->group(function () {

        Route::get('/', 'index');

        Route::name('task.')->group(function () {
            Route::post('/salvar-tarefa', 'store')->name('store');
            Route::put('/atualizar-tarefa/{id}', 'update')->name('update');
            Route::get('/excluir-tarefa/{id}', 'delete')->name('delete');
        });
});
