<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreCadastro extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['nome_usuario', 'nome_restaurante', 'telefone', 'email', 'mensagem'];
}
