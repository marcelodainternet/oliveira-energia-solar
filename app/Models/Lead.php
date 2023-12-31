<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "emails_cap";
    protected $fillable = [
        "nome", "empresa", "telefone", "email", "fonte", "observacao"
    ];
}
