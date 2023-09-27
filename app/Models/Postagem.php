<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "postagens";
    protected $fillable = [
        "nome", "titulo", "subtitulo", "descricao", "link", "data_expira", "inativo", "destaque", "imagem", "detalhe", "fonte", "container", "borda", "arredondado", "sombra", "background", "opiniao", "views", "alinhamento", "etiqueta_id", "secao_id", "categoria_id", "subcategoria_id"
    ];

    public function secao()
    {
        return $this->belongsTo(Secao::class);
    }
}
