@extends('layouts.admintemplate')


@section('content')
<div class="container-fluid pt-3">
    <h2 class="text-center">Painel Administrativo</h2>
    <hr>
</div>


<div class="container justify-content-center align-items-center vh-100 mt-5">
    <h2 class="text-center mb-4">Estatísticas do Site</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="display-1">{{ $posts }}</h1>
                    <h4>Posts</h4>
                    <p class="alert alert-success mt-3">Número de posts disponíveis no site.</p>
                    <a href="{{ route('painel.listar') }}" class="btn btn-outline-success float-end">Gerenciar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3 mt-md-0">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="display-1">{{ $users }}</h1>
                    <h4>Usuários</h4>
                    <p class="alert alert-success mt-3">Número de usuários ativos no site.</p>
                    <a href="{{ route('painel.listar_usuarios') }}" class="btn btn-outline-success float-end">Gerenciar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-md-0">
            <div class="card text-center mt-3">
                <div class="card-body">
                    <h1 class="display-1">{{ $precadastro }}</h1>
                    <h4>Solicitações</h4>
                    <p class="alert alert-success mt-3">Número de solicitações de entrada de restaurtantes no catálogo.</p>
                    <a href="{{ route('painel.listar_solicitacoes') }}" class="btn btn-outline-success float-end">Gerenciar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-md-0">
            <div class="card text-center my-3" style="height: 290px !important;">
                <div class="card-body">
                    <h1 class="display-1">1000+</h1> <!-- Número informativo -->
                    <h4>Visitantes Diários</h4> <!-- Título informativo -->
                    <p class="alert alert-info mt-3">O site recebe mais de 1000 visitantes diariamente, explorando nossos
                        conteúdos e recursos.</p>
                    <p class="text-muted">Número fictício.</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
