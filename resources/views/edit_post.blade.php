@extends('layouts.admintemplate')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('warning') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-warning alert-dismissible show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Editar Postagem</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('painel.post_update', ['id'=>$posts->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Título:</label>
                            <input type="text" class="form-control" name="titulo" value="{{ $posts->titulo }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição Breve:</label>
                            <input type="text" class="form-control" name="descricao_breve"
                                value="{{ $posts->descricao_breve }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição 1:</label>
                            <textarea style="height: 200px !important" class="form-control"
                                name="descricao_1">{{ $posts->descricao_1 }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição 2:</label>
                            <textarea style="height: 200px !important" class="form-control"
                                name="descricao_2">{{ $posts->descricao_2 }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slug:</label>
                                <input type="text" class="form-control" name="slug" value="{{ $posts->slug }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Filename:</label>
                                <input type="text" class="form-control" name="filename" value="{{ $posts->filename }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Filename:</label>
                                <input type="text" class="form-control" name="filename" value="{{ $posts->img_card }}">
                            </div>
                        </div>
                        <button class="btn btn-success rounded">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
