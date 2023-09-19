<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;

Route::get('/', [SiteController::class, 'index']);
Route::get('/dicas', [SiteController::class, 'dicas']);
Route::get('/videos', [SiteController::class, 'videos']);
Route::get('/faq', [SiteController::class, 'faq']);
Route::post('/lead', [SiteController::class, 'leadStore']);

Route::group(["prefix" => "adm"], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(["middleware" => "auth"], function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/configuracoes', [AdminController::class, 'configuracoes']);
        Route::post('/configuracoes', [AdminController::class, 'salvarConfiguracoes']);
        Route::get('/secoes/{secao?}', [AdminController::class, 'secoes'])->name("secoes.editar");
        Route::get('/secoes/{secao}', [AdminController::class, 'secoes'])->name("secoes.excluir");
        Route::get('/secoes/{secao}/postagens/{postagem?}', [AdminController::class, 'postagens'])->name("postagens.editar");
        Route::get('/secoes/{secao}/postagens/{postagem}', [AdminController::class, 'postagens'])->name("postagens.excluir");
        Route::get('/projetos/{projeto?}', [AdminController::class, 'projetos'])->name("projetos.editar");
        Route::get('/projetos/{projeto}', [AdminController::class, 'projetos'])->name("projetos.excluir");
        Route::get('/leads', [AdminController::class, 'leads']);
        Route::get('/usuarios', [AdminController::class, 'usuarios']);
    });
});
