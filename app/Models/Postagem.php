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
        "nome", "titulo", "subtitulo", "descricao", "link"
    ];

    public function secao()
    {
        return $this->belongsTo(Secao::class);
    }
}
