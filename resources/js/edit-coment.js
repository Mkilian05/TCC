function Comentario(obj, refs){

    let self         = this;

    self.id           = ko.observable(obj.id||null);
    self.post         = ko.observable(obj.post||null);
    self.comentario   = ko.observable(obj.comentario||null);
    self.voto         = ko.observable(obj.voto||null);
    self.user         = ko.observable(obj.user||null);
    self.userId         = ko.observable(obj.user||null);
    self.created_at   = ko.observable(base._formatDate(obj.created_at, 'DD/MM/YYYY HH:mm')||null);
    self.editando     = ko.observable(false);

    self.enableBtnEditar = ko.computed(function(){
        return self.userId() === base.Auth.id;
    });

    self.editar = function(){
        self.editando(true);
    }

    self.cancelar = function(){
        //reset original
        self.editando(false);
    }


    self.remove       = function(){

    };
}

function ViewModel()
{
    let self        = this;

    self.lista      = ko.observableArray();

    self.makeLista  = function(tmp){
        return new Comentario(tmp, {});
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
