@extends('layouts.template')

@section('content')
{{-- {{dd()}} --}}
<title>{{$model->titulo}}</title>
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8" style="word-wrap: break-word;">
            <h1 class="mt-3 text-center">{{$model->titulo}}</h1>
            <hr class="solid">
            <p class="mt-2 fs-6 text-star">
                {!! $model->descricao_1 !!}
            </p>
            @php
            $tmp = "images/{$model->filename}";
            @endphp
            <img src="{{ asset($tmp) }}" alt="Imagem da Notícia" class="img-fluid rounded mt-1 mx-auto">
            <p class="mt-3 fs-6">
                {!! $model->descricao_2 !!}
            </p>
            <div class="container mt-3 mb-3">
                <div class="row justify-content-center">

                    @guest
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Comentários
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Para deixar um comentário, por favor faça login na sua
                                            conta.</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Fazer Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <form class="mt-3 pb-3" action="{{ route('comentar') }}" method="POST">
                            @csrf
                            <!-- Adicione o token CSRF para proteção -->
                            <input type="hidden" name="post" value="{{ $model->id}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title fs-5">Deixe sua Avaliação:</h5>
                                    <div class="estrelas">
                                        <input type="radio" id="cm_star-empty" name="voto" value="" checked />
                                        <label for="cm_star-1"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-1" name="voto" value="1" />
                                        <label for="cm_star-2"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-2" name="voto" value="2" />
                                        <label for="cm_star-3"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-3" name="voto" value="3" />
                                        <label for="cm_star-4"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-4" name="voto" value="4" />
                                        <label for="cm_star-5"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-5" name="voto" value="5" />
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="userInput" name="comentario" rows="4"
                                            placeholder="Digite aqui o seu comentário...">{{ old('comentario') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-icon">
                                        Enviar <i class="fas fa-paper-plane ms-1"></i>
                                    </button>


                                </div>
                            </div>

                        </form>
                    </div>
                    @endguest
                    <h5 class="text-center fs-5 pb-2">Avaliações:</h5>
                    <div class="col-sm-12">
                        <div class="card comentario-card px-3 pt-2" id="knockoutContainer">
                            <!-- ko foreach: lista -->
                                <!-- ko if: !editando() -->
                                    <div data-bind="visible: enableBtnEditar()">
                                        <div class="d-flex justify-content-end mb-2">
                                            <a class="mr-2 edit-link edit-comment" style="margin-right: 1em !important;" data-bind="click: editar" >
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="delete-link" data-bind="click: remove">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-subtitle mt-2  mb-2 text"><strong data-bind="text: 'Usuário: '+user()"></strong></h6>
                                        <h6 class="text-muted mt-2 "><span data-bind="text: 'Data: '+created_at()"></span></h6>
                                    </div>
                                    <div class="avaliacao d-flex">
                                        <p><strong>Avaliação:</strong>
                                            <div class="estrelas">
                                                <label data-bind="attr:{ for: 'cm_star_1'} "><i class="fa"></i></label>
                                                <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 1, attr:{id : 'cm_star_1'}, disable: true ">

                                                <label for="cm_star_2"><i class="fa"></i></label>
                                                <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 2, attr:{id : 'cm_star_2'}, disable: true ">

                                                <label for="cm_star_3"><i class="fa"></i></label>
                                                <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 3, attr:{id : 'cm_star_3'}, disable: true ">

                                                <label for="cm_star_4"><i class="fa"></i></label>
                                                <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 4, attr:{id : 'cm_star_4'}, disable: true ">

                                                <label for="cm_star_5"><i class="fa"></i></label>
                                                <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 5, attr:{id : 'cm_star_5'}, disable: true ">

                                            </div>
                                    </div>
                                    <p class="card-text"><strong>Comentário:</strong><br><span data-bind="text: comentario"></span></p>

                                    </p>
                                <!-- /ko -->
                                <!-- ko if: editando() -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title fs-5">Editar sua Avaliação:</h5>
                                            <div class="estrelas">

                                                <label data-bind="attr:{ for: 'cm_star_1'} "><i class="fa"></i></label>
                                                    <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 1, attr:{id : 'cm_star_1'} ">

                                                <label for="cm_star_2"><i class="fa"></i></label>
                                                    <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 2, attr:{id : 'cm_star_2'} ">

                                                <label for="cm_star_3"><i class="fa"></i></label>
                                                    <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 3, attr:{id : 'cm_star_3'} ">

                                                <label for="cm_star_4"><i class="fa"></i></label>
                                                    <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 4, attr:{id : 'cm_star_4'} ">

                                                <label for="cm_star_5"><i class="fa"></i></label>
                                                    <input class="form-check-input" type="radio" data-bind="checked: voto, checkedValue: 5, attr:{id : 'cm_star_5'} ">

                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" id="userInput" data-bind="value: comentario, valueUpdate: 'afterkeydown' " rows="4" placeholder="Digite aqui o seu comentário..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-icon" data-bind="click: salvar">
                                                Salvar
                                                <i class="fas fa-paper-plane ms-1"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger btn-icon" data-bind="click: cancelar">
                                                Cancelar
                                                <i class="fas fa-paper-plane ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                <!-- /ko -->
                            <!-- /ko -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>






</div>
<script>
    var model = @json($model);
</script>
@endsection

@section('pageScripts')
    <script  type="text/javascript">
        var url_deleta = "{{ route('excluir_comentario')}}",
            url_edicao = "{{ route('update_comentario') }}";
    </script>


    <script src="{{ mix('js/edit-coment.js')}}"></script>

@endsection
