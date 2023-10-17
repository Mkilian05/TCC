<?php

namespace App\Services;

use App\Models\Post;
use App\Services\BaseService;

Class PostService extends BaseService{

    public function getPostBySlug(string $slug){

        return Post::with(['comentarios' => function($query){
            $query->select('comentarios.id', 'comentarios.voto', 'comentarios.comentario', 'comentarios.post', 'comentarios.created_at', 'users.name as user', 'users.id as user_id')
            ->join('users', 'users.id', '=', 'comentarios.user');
        }])->where('slug', $slug)->first() ?? [];
    }
}


