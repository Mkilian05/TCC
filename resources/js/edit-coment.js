function Comentario(obj, refs){

    let self          = this;

    self.original     = obj||{};

    self.id           = ko.observable(obj.id||null);
    self.post         = ko.observable(obj.post||null);
    self.comentario   = ko.observable(obj.comentario||null);
    self.voto         = ko.observable(obj.voto||null);
    self.user         = ko.observable(obj.user||null);
    self.userId         = ko.observable(obj.user_id||null);
    self.created_at   = ko.observable(base._formatDate(obj.created_at, 'DD/MM/YYYY HH:mm')||null);
    self.editando     = ko.observable(false);

    self.enableBtnEditar = ko.computed(function(){
        return self.userId() === base.Auth.id;
    });

    self.editar = function(){
        self.editando(true);
    };

    self.salvar = function()
    {
        var postData = JSON.parse(ko.toJSON(self));
        base.post(url_edicao+'/'+self.id(),postData, function(resp){
            if(resp.status == 1)
            {
                self.editando(false);
                self.original = resp.response ;
                self.voto(parseInt(resp.response.voto));
                self.comentario(resp.response.comentario);
                showMessage('Edição realizada com sucesso.', 'success');
            }
            if (resp.status == 0) {
                let errors = base.handle_error(resp);
                if (errors) showMessage(errors, 'error');
            }
            return;
        })
    }

    self.cancelar = function(){
        self.comentario(self.original.comentario);
        self.voto(self.original.voto);
        self.editando(false);
    };


    self.remove       = function(){
        showConfirm('Tem certeza que deseja remover seu comentário ?')
            .then((result) => {
                (result.dismiss === Swal.DismissReason.cancel ? false : base.post(url_deleta + '/' + self.id(), {}, function(resp){
                    if (resp.status == 1) {
                        refs.lista.remove(self);
                        showMessage('Comentário removido com sucesso !', 'success');
                    }
                }));
            });
    };
}

function ViewModel()
{
    let self        = this;

    self.lista      = ko.observableArray();

    self.makeLista  = function(tmp){
        return new Comentario(tmp, {
            lista : self.lista
        });
    }

    self.setData    = function (){
        ko.utils.arrayForEach(model.comentarios, function(i){
            var tmp = self.makeLista(i);
            self.lista.push(tmp);
        });

    }
}

var viewModel = new ViewModel;
viewModel.setData();

$(document).ready(function () {
    ko.applyBindingsWithValidation(viewModel, document.getElementById('knockoutContainer'));
});
