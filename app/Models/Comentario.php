<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['post', 'user', 'comentario', 'voto'];

    public function usuarios()
    {
        return $this->hasOne(User::class, 'id', 'user'); // porra

    }
}
