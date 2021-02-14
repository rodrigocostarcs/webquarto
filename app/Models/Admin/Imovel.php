<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','foto','endereco','cep','cidade','estado','descricao','valor','status'];
}
