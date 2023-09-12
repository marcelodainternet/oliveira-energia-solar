<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secao;

class SiteController extends Controller
{
    function index()
    {
        $secoes=Secao::get();
        $nome="Marcelo";
        return view('home', compact("nome", "secoes"));
    }
    function contato()
    {
        return view('contato');
    }
}
