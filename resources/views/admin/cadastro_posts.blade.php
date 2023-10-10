@extends('layouts.admintemplate')

@section('content')


<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Criar Postagem</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('painel.salvar_post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Título:</label>
                            <input type="text" class="form-control" name="titulo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição Breve:</label>
                            <input type="text" class="form-control" name="descricao_breve">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição 1:</label>
                            <textarea style="height: 200px !important" class="form-control"
                                name="descricao_1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição 2:</label>
                            <textarea style="height: 200px !important" class="form-control"
                                name="descricao_2"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slug:</label>
                                <input type="text" class="form-control" name="slug">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Filename:</label>
                                <input type="text" class="form-control" name="filename">
                            </div>
                        </div>
                        <button class="btn btn-primary rounded">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
