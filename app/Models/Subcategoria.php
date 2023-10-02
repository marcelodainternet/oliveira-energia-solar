<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "nome", "titulo", "subtitulo", "descricao", "ordem", "inativo", "destaque", "categoria_id", "imagem", "alinhamento", "container", "borda", "arredondado", "sombra", "background_color", "background_img", "parallax", "data_expira"
    ];
}
