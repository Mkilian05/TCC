<?php

namespace App\Services;

use App\Models\Post;
use App\Services\BaseService;

Class PostService extends BaseService{

    public function getPostBySlug(string $slug){

        return Post::with('comentarios')->where('slug', $slug)->first() ?? [];
    }
}


