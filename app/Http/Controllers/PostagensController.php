<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;

class PostagensController extends Controller
{
    protected $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewRestaurante(string $slug ='')
    {
        $model = $this->service->getPostBySlug($slug);
        // dd($model);
        return view('restaurante', ['model' => $model]);
    }

    public function create()
    {
        $this->authorize('view-post-admin');
        return view('cadastro_posts');
    }

    public function store(PostRequest $request)
    {
        // dd(Post::all());
        $this->authorize('create-post');
        Post::create([
            'titulo' => $request->titulo,
            'descricao_breve' => $request->descricao_breve,
            'descricao_1' => $request->descricao_1,
            'descricao_2' => $request->descricao_2,
            'slug' => $request->slug,
            'filename' => $request->filename,
            'img_card' => $request->img_card,
        ]);

        // return "Post criado com sucesso!";

        return redirect()->route('painel.create')->with('success', 'Postagem cadastrada com sucesso!');
    }

    public function viewFAQ()
    {
        return view('FAQ');
    }
}
