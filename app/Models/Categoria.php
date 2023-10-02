<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "nome", "titulo", "subtitulo", "descricao", "ordem", "inativo", "destaque", "secao_id", "imagem", "alinhamento", "container", "borda", "arredondado", "sombra", "background_color", "background_img", "parallax", "data_expira"
    ];

    public function subcategorias(): HasMany
    {
        return $this->hasMany(Subcategoria::class);
    }
}
