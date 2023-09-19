<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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

    function salvarConfiguracoes(Request $request)
    {
        salvar_imagem($request->imagem, "imagem-principal");

        Configuracao::find(1)->update([
            "site" => $request->site,
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? '',
            "p_chaves" => $request->p_chaves,
            "email" => $request->email,
            "email2" => $request->email2 ?? '',
            "email3" => $request->email3 ?? '',
            "telefone" => $request->telefone,
            "telefone2" => $request->telefone2 ?? '',
            "telefone3" => $request->telefone3 ?? '',
            "cep" => $request->cep ?? '',
            "endereco" => $request->endereco,
            "numero" => $request->numero ?? '',
            "complemento" => $request->complemento ?? '',
            "bairro" => $request->bairro ?? '',
            "cidade" => $request->cidade ?? '',
            "estado" => $request->estado ?? '',
            "endereco2" => $request->endereco2 ?? '',
            "endereco3" => $request->endereco3 ?? '',
            "horatend" => $request->horatend,
            "horatend2" => $request->horatend2 ?? '',
            "horatend3" => $request->horatend3 ?? '',
            "info"   => $request->info,
            "whatstxt"   => $request->whatstxt,
            "whatstxt2"   => $request->whatstxt2,
            "whatstxt3"   => $request->whatstxt3,
            "instagram" => $request->instagram,
            "facebook" => $request->facebook,
            "youtube" => $request->youtube ?? '',
            "google_maps" => $request->google_maps,
            "play_store" => $request->play_store ?? '',
            "apple_store" => $request->apple_store ?? '',
            "linkedin" => $request->linkedin ?? '',
            "twitter" => $request->twitter ?? '',
            "tiktok" => $request->tiktok ?? '',
            "termos" => $request->termos,
            "privacidade" => $request->privacidade,
            "cookies" => $request->politica_cookies ?? ''
        ]);

        return back()->with('saved', true);
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
