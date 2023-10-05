<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secao extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "secoes";
    protected $fillable = [
        "titulo", "subtitulo", "descricao", "inativo"
    ];

    public function postagens(): HasMany
    {
        return $this->hasMany(Postagem::class);
    }
}
