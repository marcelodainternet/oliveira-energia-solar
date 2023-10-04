<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Secao;
use App\Models\Configuracao;
use App\Models\Categoria;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;
use App\Mail\ContatoRespostaEmail;

class SiteController extends Controller
{
    function index()
    {
        $configuracao = Configuracao::first();
        $categorias = Categoria::get();

        $vitrine = Secao::where("id", 3)->where("inativo", 0)->first();
        $principal = Secao::where("id", 4)->where("inativo", 0)->first();
        $vitrine2 = Secao::where("id", 5)->where("inativo", 0)->first();
        $destaque = Secao::where("id", 8)->where("inativo", 0)->first();
        $vitrine3 = Secao::where("id", 9)->where("inativo", 0)->first();
        $parceiros = Secao::where("id", 10)->where("inativo", 0)->first();
        $portfolio = Secao::where("id", 11)->where("inativo", 0)->first();
        $depoimentos = Secao::where("id", 12)->where("inativo", 0)->first();
        $empresa = Secao::where("id", 13)->where("inativo", 0)->first();
        $equipe = Secao::where("id", 14)->where("inativo", 0)->first();
        $contato = Secao::where("id", 15)->where("inativo", 0)->first();
        $redes_sociais = Secao::where("id", 16)->where("inativo", 0)->first();

        return view("inicio", compact("configuracao", "categorias", "principal", "vitrine", "vitrine2", "destaque", "vitrine3", "parceiros", "portfolio", "depoimentos", "empresa", "equipe", "contato", "redes_sociais"));
    }

    function dicas()
    {
        $configuracao = Configuracao::first();

        $dicas = Secao::where("id", 17)->where("inativo", 0)->first();

        return view("dicas", compact("configuracao", "dicas"));
    }

    function videos()
    {
        $configuracao = Configuracao::first();

        $videos = Secao::where("id", 18)->where("inativo", 0)->first();

        return view("videos", compact("configuracao", "videos"));
    }

    function faq()
    {
        $configuracao = Configuracao::first();

        $faq = Secao::where("id", 20)->where("inativo", 0)->first();

        return view("faq", compact("configuracao", "faq"));
    }

    function leadStore(Request $request)
    {
        $timeNow = time();
        $timeForm = $request->input('timestamp');

        if (($timeNow - $timeForm) < 5) return response()->json(["lead_enviada" => false, "error" => "Suspeita de atividade de bot. Tente novamente."]);

        try {
            Lead::create([
                "nome" => $request->nome ?? '',
                "empresa" => $request->empresa ?? '',
                "telefone" => $request->telefone ?? '',
                "email" => $request->email ?? '',
                "fonte" => $request->fonte ?? '',
                "observacao" => $request->observacao ?? ''
            ]);

            return response()->json(["lead_enviada" => true]);
        } catch (Exception $exception) {
            return response()->json(["lead_enviada" => false, "error" => $exception->getMessage()]);
        }
    }

    function mostrarCategoria($categoria)
    {
        $configuracao = Configuracao::first();

        $categoria = Categoria::find($categoria);

        return view("categoria", compact("configuracao", "categoria"));
    }

    function privacidade()
    {
        $configuracao = Configuracao::first();

        return view("privacidade", compact("configuracao"));
    }

    function termos()
    {
        $configuracao = Configuracao::first();

        return view("termos", compact("configuracao"));
    }

    function enviarContato(Request $request)
    {
        Mail::to('contato@oliveiraenergiasolar.com.br')->send(new ContatoEmail(
            $request->nome,
            $request->fone,
            $request->email,
            $request->assunto,
            $request->mensagem
        ));

        Mail::to($request->email)->send(new ContatoRespostaEmail(
            $request->nome,
            $request->assunto
        ));

        return redirect('/#mail')->with('email-enviado', true);
    }
}
