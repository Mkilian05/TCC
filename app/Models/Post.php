<?php

namespace App\Models;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['titulo', 'descricao_breve', 'descricao_1', 'descricao_2', 'slug', 'filename', 'img_card'];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'post', 'id')->orderBy('created_at', 'desc');

    }
}
