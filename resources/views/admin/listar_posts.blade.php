@extends('layouts.admintemplate')

@section('content')

<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Administrar Posts</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Desc. Breve</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Filename</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->descricao_breve }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->filename }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('painel.editar_post', $post->id) }}" class="btn btn-success">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('painel.excluir_post', $post->id) }}" class="btn btn-danger">
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
