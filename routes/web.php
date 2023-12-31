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
Route::get('/categorias/{categoria}', [SiteController::class, 'mostrarCategoria']);
Route::get('/privacidade', [SiteController::class, 'privacidade']);
Route::get('/termos', [SiteController::class, 'termos']);
Route::post('/contato', [SiteController::class, 'enviarContato']);

Route::group(["prefix" => "adm"], function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(["middleware" => "auth"], function () {
        Route::get('/', [AdminController::class, 'index']);

        Route::get('/configuracoes', [AdminController::class, 'editarConfiguracoes'])->name('configuracoes.editar');
        Route::put('/configuracoes', [AdminController::class, 'atualizarConfiguracoes'])->name('configuracoes.atualizar');

        Route::get('/secoes/{secao?}', [AdminController::class, 'secoes'])->name("secoes");
        Route::put('/secoes/{secao}', [AdminController::class, 'atualizarSecao'])->name("secoes.atualizar");
        Route::put('/secoes/{secao}/status', [AdminController::class, 'atualizarSecaoStatus'])->name("secoes.atualizar.status");
        Route::delete('/secoes/{secao}', [AdminController::class, 'excluirSecao'])->name("secoes.excluir");
        Route::get('/secoes/{secao}/postagens/{postagem?}', [AdminController::class, 'postagens'])->name("postagens");
        Route::post('/secoes/{secao}/postagens', [AdminController::class, 'inserirPostagem'])->name("postagens.inserir");
        Route::put('/secoes/{secao}/postagens/{postagem}', [AdminController::class, 'atualizarPostagem'])->name("postagens.atualizar");
        Route::put('/secoes/{secao}/postagens/{postagem}/status', [AdminController::class, 'atualizarPostagemStatus'])->name("postagens.atualizar.status");
        Route::delete('/secoes/{secao}/postagens/{postagem}', [AdminController::class, 'excluirPostagem'])->name("postagens.excluir");

        Route::get('/projetos/{projeto?}', [AdminController::class, 'projetos'])->name("projetos");
        Route::post('/projetos', [AdminController::class, 'inserirProjeto'])->name("projetos.inserir");
        Route::put('/projetos/{projeto}', [AdminController::class, 'atualizarProjeto'])->name("projetos.atualizar");
        Route::put('/projetos/{projeto}/status', [AdminController::class, 'atualizarProjetoStatus'])->name("projetos.atualizar.status");
        Route::delete('/projetos/{projeto}', [AdminController::class, 'excluirProjeto'])->name("projetos.excluir");
        Route::get('/projetos/{projeto}/fotos/{foto?}', [AdminController::class, 'fotos'])->name("fotos");
        Route::post('/projetos/{projeto}/fotos', [AdminController::class, 'inserirFoto'])->name("fotos.inserir");
        Route::put('/projetos/{projeto}/fotos/{foto}', [AdminController::class, 'atualizarFoto'])->name("fotos.atualizar");
        Route::put('/projetos/{projeto}/fotos/{foto}/status', [AdminController::class, 'atualizarFotoStatus'])->name("fotos.atualizar.status");
        Route::delete('/projetos/{projeto}/fotos/{foto}', [AdminController::class, 'excluirFoto'])->name("fotos.excluir");

        Route::get('/leads/{lead?}', [AdminController::class, 'leads'])->name("leads");
        Route::post('/leads', [AdminController::class, 'inserirLead'])->name("leads.inserir");
        Route::put('/leads/{lead}', [AdminController::class, 'atualizarLead'])->name("leads.atualizar");
        Route::delete('/leads/{lead}', [AdminController::class, 'excluirLead'])->name("leads.excluir");

        Route::get('/usuarios', [AdminController::class, 'usuarios'])->name("usuarios");
        Route::post('/usuarios', [AdminController::class, 'inserirUsuario'])->name("usuarios.inserir");
        Route::put('/usuarios/{usuario}', [AdminController::class, 'atualizarUsuario'])->name("usuarios.atualizar");
        Route::delete('/usuarios/{usuario}', [AdminController::class, 'excluirUsuario'])->name("usuarios.excluir");
    });
});
