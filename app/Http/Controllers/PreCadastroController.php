<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreCadastro;

class PreCadastroController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_usuario' => 'required|min:4',
            'nome_restaurante' => 'required|min:10',
            'telefone' => 'required|min:8|max:19',
            'email' => 'required',
            'mensagem' => 'required',
        ]);

        $precadastro = new PreCadastro();
        $precadastro->nome_usuario = $data['nome_usuario'];
        $precadastro->nome_restaurante = $data['nome_restaurante'];
        $precadastro->telefone = $data['telefone'];
        $precadastro->email = $data['email'];
        $precadastro->mensagem = $data['mensagem'];
        $precadastro->save();

        return redirect()->route('home')->with('success', 'Pré cadastro efetuado com sucesso! Em breve entraremos em contato para avisar se sua solicitação foi aceita!');
    }

    public function viewListarSolicitacoes()
    {
        $this->authorize('view-admin');
        $pre_cadastros = PreCadastro::all();
        return view('admin.listar_solicitacoes', ['pre_cadastros'=>$pre_cadastros]);
    }

    public function deleteSolicitacao(int $id){
        $this->authorize('delete-post');
        try{
            PreCadastro::where('id', $id)->delete();

            return redirect()->route('painel.listar_solicitacoes')->with('success', 'Solicitação aceita!');
        }catch(Exception $e)
        {
            Log::error('Erro ao aceitar solicitação. Error =>'.$e->getMessage());

            return redirect()->route('painel.listar_solicitacoes')->with('warning', 'Houve um erro ao aceitar solicitação.');
        }
    }
}
