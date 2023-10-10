<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->validate([
            'post' => 'required|exists:posts,id',
            'comentario' => 'required|string',
            'voto' => 'required|integer',
        ]);

        $comentario = new Comentario();
        $comentario->post = $data['post'];
        $comentario->user = Auth::user()->id;
        $comentario->comentario = $data['comentario'];
        $comentario->voto = $data['voto'];
        $comentario->save();

        $post = Post::where('id', $request->post)->first();
        return redirect()->route('restaurante',$post->slug)->with('success', 'Comentário efetuado com sucesso!');
    }

    public function deleteComentario(int $id, Request $request)
    {

        $post = Post::join('comentarios', 'comentarios.post', '=', 'posts.id')->where('comentarios.id', $id)->first();

        try{
            Comentario::where('id', $id)->delete();

            return redirect()->route('restaurante', $post->slug)->with('success', 'Comentário excluído com sucesso!');
        }catch(Exception $e)
        {
            Log::error('Erro ao remover post. Error =>'.$e->getMessage());

            return redirect()->route('restaurante', $post->slug)->with('warning', 'Erro ao excluir comentário!');
        }
    }

    public function getComentarioById(int $comentario)
    {
        try{
            $comentario = Comentario::find($comentario);

            return response()->json(['status' => true, 'response' => $comentario], 200);

        }catch(Exception $e)
        {
            throw new Exception("Error Processing Request => {$e->getMessage()}", 500);

        }
    }

    public function updateComentario(int $id, Request $request)
    {
        dd($resquet->all());

        $comentario = Comentario::find($id);

        $data = [
            'comentario' => $request->comentario,
            'voto' => $request->voto,
        ];

        Comentario::where('id', $id)->update($data);

        session()->flash('success', 'Comentário atualizado com sucesso.');

        return redirect()->route('painel.listar');
    }
}
