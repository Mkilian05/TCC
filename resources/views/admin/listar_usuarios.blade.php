@extends('layouts.admintemplate')

@section('content')

<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Administrar Usuários</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">
                        #
                    </th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ call_user_func(['App\Libraries\Helpers', 'getRoleUser'], $user->id) }}
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('painel.edit_usuario', $user->id) }}" class="btn btn-success me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('painel.excluir_usuario', $user->id) }}" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </div>
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
