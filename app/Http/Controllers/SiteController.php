<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    function index()
    {
        $nome="Marcelo";
        return view('home', compact("nome"));
    }
    function contato()
    {
        return view('contato');
    }
}
