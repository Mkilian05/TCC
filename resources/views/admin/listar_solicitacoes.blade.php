@extends('layouts.admintemplate')

@section('content')

<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Administrar Solicitações</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width: 150px !important">Usuário</th>
                    <th scope="col" style="width: 200px !important">Nome Restaurante</th>
                    <th scope="col" style="width: 150px !important">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mensagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pre_cadastros as $precadastro)
                <tr>
                    <th scope="row">{{ $precadastro->id }}</th>
                    <td>{{ $precadastro->nome_usuario }}</td>
                    <td>{{ $precadastro->nome_restaurante }}</td>
                    <td>{{ $precadastro->telefone }}</td>
                    <td>{{ $precadastro->email }}</td>
                    <td>{{ $precadastro->mensagem }}</td>
                    <td>
                        <a href="{{ route('painel.excluir_solicitacao', $precadastro->id) }}" class="btn btn-success">
                            <i class="fas fa-check"></i> Aceitar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Adicione seus estilos personalizados aqui */
    .btn {
        margin-right: 5px;
    }
</style>
@endsection
