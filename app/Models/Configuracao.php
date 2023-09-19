<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "configuracoes";
    protected $fillable = [
        "site", "titulo", "subtitulo", "descricao", "p_chaves", "email", "email2", "email3", "telefone", "telefone2", "telefone3", "cep", "endereco", "numero", "complemento", "bairro", "cidade", "estado", "endereco2", "endereco3", "horatend", "horatend2", "horatend3", "info", "whatstxt", "whatstxt2", "whatstxt3", "instagram", "facebook", "youtube", "google_maps", "play_store", "apple_store", "linkedin", "twitter", "tiktok", "termos", "privacidade", "cookies"
    ];
}
