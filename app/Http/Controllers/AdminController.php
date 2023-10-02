<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracao;
use App\Models\Postagem;
use App\Models\Secao;
use App\Models\usuario;
use App\Models\Lead;
use App\Models\Categoria;
use App\Models\Subcategoria;

class AdminController extends Controller
{
    function index()
    {
        return view("admin.inicio");
    }

    function editarConfiguracoes()
    {
        $configuracao = Configuracao::first();

        return view("admin.configuracoes", compact("configuracao"));
    }

    function atualizarConfiguracoes(Request $request)
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

    function atualizarSecao($secao, Request $request)
    {
        $secao = Secao::find($secao);

        salvar_imagem($request->imagem, "secao-" . $secao->id);

        $secao->update([
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? ''
        ]);

        return back()->with('saved', true);
    }

    function postagens($secao, $postagem = null)
    {
        $secao = Secao::find($secao);
        if ($postagem) $postagem = Postagem::find($postagem);

        return view("admin.postagens", compact("secao", "postagem"));
    }

    function inserirPostagem($secao, Request $request)
    {
        $postagem = Postagem::create([
            "inativo" => $request->inativo ? true : false,
            "destaque" => 0,
            "etiqueta_id" => 0,
            "categoria_id" => 0,
            "subcategoria_id" => 0,
            "imagem" => '',
            "detalhe" => '',
            "fonte" => '',
            "alinhamento" => '',
            "borda" => 0,
            "arredondado" => 0,
            "container" => 0,
            "sombra" => 0,
            "background" => '',
            "opiniao" => '',
            "views" => 0,
            "nome" => $request->nome ?? '',
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? '',
            "link" => $request->link ?? '',
            "secao_id" => $request->secao,
            "data_expira" => date("Y-m-d")
        ]);

        salvar_imagem($request->imagem, "postagem-" . $postagem->id);

        return back()->with('inserido', true);
    }

    function atualizarPostagem($secao, $postagem, Request $request)
    {
        $postagem = Postagem::find($postagem);

        salvar_imagem($request->imagem, "postagem-" . $postagem->id);

        $postagem->update([
            "inativo" => $request->inativo ? true : false,
            "nome" => $request->nome ?? '',
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? '',
            "link" => $request->link ?? ''
        ]);

        return back()->with('saved', true);
    }

    function excluirPostagem($secao, $postagem)
    {
        Postagem::find($postagem)->delete();
        return redirect()->route('postagens', ['secao' => $secao])->with('excluida', true);
    }

    function projetos($projeto = null)
    {
        $projetos = Categoria::get();
        if ($projeto) $projeto = Categoria::find($projeto);

        return view("admin.projetos", compact("projetos", "projeto"));
    }

    function inserirProjeto(Request $request)
    {
        $projeto = Categoria::create([
            "nome" => $request->nome ?? '',
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? '',
            "ordem" => 0,
            "inativo" => 0,
            "destaque" => 0,
            "secao_id" => 11,
            "imagem" => '',
            "alinhamento" => '',
            "container" => 0,
            "borda" => 0,
            "arredondado" => 0,
            "sombra" => 0,
            "background_color" => '',
            "background_img" => '',
            "parallax" => 0,
            "data_expira" => date("Y-m-d")
        ]);

        salvar_imagem($request->imagem, "projeto-" . $projeto->id);

        return back()->with('atualizado', true);
    }

    function atualizarProjeto($projeto, Request $request)
    {
        $projeto = Categoria::find($projeto);

        salvar_imagem($request->imagem, "projeto-" . $projeto->id);

        $projeto->update([
            "nome" => $request->nome ?? '',
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? ''
        ]);

        return back()->with('saved', true);
    }

    function excluirProjeto($projeto)
    {
        Categoria::find($projeto)->delete();
        return back()->with('excluido', true);
    }

    function fotos($projeto, $foto = null)
    {
        $projeto = Categoria::find($projeto);
        if ($foto) $foto = Subcategoria::find($foto);

        return view("admin.fotos", compact("projeto", "foto"));
    }

    function inserirFoto(Request $request)
    {
        $foto = Subcategoria::create([
            "nome" => $request->nome ?? '',
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? ''
        ]);

        salvar_imagem($request->imagem, "projeto-foto-" . $foto->id);

        return back()->with('inserido', true);
    }

    function atualizarFoto($projeto, $foto, Request $request)
    {
        $foto = Subcategoria::find($foto);

        salvar_imagem($request->imagem, "projeto-foto-" . $foto->id);

        $foto->update([
            "nome" => $request->nome ?? '',
            "titulo" => $request->titulo ?? '',
            "subtitulo" => $request->subtitulo ?? '',
            "descricao" => $request->descricao ?? ''
        ]);

        return back()->with('saved', true);
    }

    function excluirFoto($projeto, $foto)
    {
        $foto = Subcategoria::find($foto);
        $foto->delete();
        return back()->with('excluida', true);
    }

    function leads($lead = null)
    {
        $leads = Lead::orderBy("nome")->get();
        if ($lead) $lead = Lead::find($lead);

        return view("admin.leads", compact("leads", "lead"));
    }

    function inserirLead(Request $request)
    {
        Lead::create([
            "nome" => $request->nome ?? '',
            "empresa" => $request->empresa ?? '',
            "telefone" => $request->telefone ?? '',
            "email" => $request->email ?? '',
            "fonte" => $request->fonte ?? '',
            "observacao" => $request->observacao ?? ''
        ]);

        return back()->with('inserido', true);
    }

    function atualizarLead($lead, Request $request)
    {
        $lead = Lead::find($lead);
        $lead->update([
            "nome" => $request->nome ?? '',
            "empresa" => $request->empresa ?? '',
            "telefone" => $request->telefone ?? '',
            "email" => $request->email ?? '',
            "fonte" => $request->fonte ?? '',
            "observacao" => $request->observacao ?? ''
        ]);

        return back()->with("atualizado", true);
    }

    function excluirLead($lead)
    {
        Lead::find($lead)->delete();

        return back()->with("excluido", true);
    }

    function usuarios($acao = null)
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();

        return view("admin.usuarios", compact("usuarios", "acao"));
    }

    function inserirUsuario(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'usuario' => ['required'],
            'email' => ['required'],
            'senha' => ['required'],
            'confirmar_senha' => ['required']
        ]);

        if ($request->senha != $request->confirmar_senha) return back()->withErrors(['confirmar_senha' => 'Senhas não conferem.'])->onlyInput('confirmar_senha');

        Usuario::create([
            'nome' => $request->nome,
            'usuario' => $request->usuario,
            'telefone' => $request->telefone ?? '',
            'email' => $request->email,
            'senha' => md5($request->senha)
        ]);

        return back()->with("inserido", true);
    }

    function atualizarUsuario($usuario, Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'usuario' => ['required'],
            'email' => ['required']
        ]);

        $data = [
            'nome' => $request->nome,
            'usuario' => $request->usuario,
            'telefone' => $request->telefone ?? '',
            'email' => $request->email
        ];

        if ($request->senha) {
            if ($request->senha != $request->confirmar_senha) return back()->withErrors(['confirmar_senha' => 'Senhas não conferem.'])->onlyInput('confirmar_senha');
            $data['senha'] = md5($request->senha);
        }

        Usuario::find($usuario)->update($data);

        return back()->with("atualizado", true);
    }

    function excluirUsuario($usuario)
    {
        Usuario::find($usuario)->delete();

        return back()->with("excluido", true);
    }
}
