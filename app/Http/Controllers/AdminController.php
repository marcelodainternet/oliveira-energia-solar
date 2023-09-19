<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use App\Models\Postagem;
use App\Models\Secao;
use App\Models\usuario;
use App\Models\Lead;
use App\Models\Categoria;

class AdminController extends Controller
{
    function index()
    {
        return view("admin.inicio");
    }

    function configuracoes()
    {
        $configuracao = Configuracao::first();

        return view("admin.configuracoes", compact("configuracao"));
    }

    function secoes($secao = null)
    {
        $secoes = Secao::where("inativo", 0)->get();
        if ($secao) $secao = Secao::find($secao);

        return view("admin.secoes", compact("secoes", "secao"));
    }

    function postagens($secao, $postagem = null)
    {
        $secao = Secao::find($secao);
        if ($postagem) $postagem = Postagem::find($postagem);

        return view("admin.postagens", compact("secao", "postagem"));
    }

    function projetos($projeto = null)
    {
        $projetos = Categoria::get();
        if ($projeto) $projeto = Categoria::find($projeto);

        return view("admin.projetos", compact("projetos", "projeto"));
    }

    function leads()
    {
        $leads = Lead::orderBy("nome")->get();

        return view("admin.leads", compact("leads"));
    }

    function usuarios($acao = null)
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();

        return view("admin.usuarios", compact("usuarios", "acao"));
    }
}
