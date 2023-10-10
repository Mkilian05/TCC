jQuery(function () {

    $('.edit-comment').on('click', function(){

        $.ajax({
            type: "get",
            url: url_consulta+'/'+$(this).attr('comentario'),
            data: {},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            success: function (objs) {
                montaModalBody(objs);
            },
            error: (errs) => {
                alert('ERRO AO TENTAR LOCALIZAR COMENTÁRIO ');

            },
            complete: () => {


            },
        });

        $('#modalComentario').modal('show');
    })

    function montaModalBody(objs)
    {
        debugger;
        $('.modal-body').append(`
            <form class="mt-3 fomr-modal" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="post" value="`+objs.response.id+`">
                    <div class="card">
                        <div class="card-body">
                            <div class="estrelas-edicao">
                                <input type="radio" id="edicao_star-empty" name="voto" value="{{$comentario->voto}}" checked />
                                <label for="edicao_star-1"><i class="fa"></i></label>
                                <input type="radio" id="edicao_star-1" name="voto" value="1" />
                                <label for="edicao_star-2"><i class="fa"></i></label>
                                <input type="radio" id="edicao_star-2" name="voto" value="2" />
                                <label for="edicao_star-3"><i class="fa"></i></label>
                                <input type="radio" id="edicao_star-3" name="voto" value="3" />
                                <label for="edicao_star-4"><i class="fa"></i></label>
                                <input type="radio" id="edicao_star-4" name="voto" value="4" />
                                <label for="edicao_star-5"><i class="fa"></i></label>
                                <input type="radio" id="edicao_star-5" name="voto" value="5" />
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="userInput" name="comentario" rows="4"
                                    placeholder="Edite aqui o seu comentário...">{{ $coment-> comentario}}</textarea>
                            </div>
                        </div>
                    </div>
            </form>
        `);
    }

});
