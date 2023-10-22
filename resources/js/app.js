require('./bootstrap');


showMessage = function (message, type = 'info', redirect = null) {
    Swal.fire({
        icon: type,
        title: message,
        text: 'Tecle Espaço para fechar',
        width: 600,
        allowEnterKey: true,
        target: 'body',
        heightAuto: false
    }).then((result) => {
        if (redirect !== null) {
            window.location.href = redirect;
        }
    });
};

showConfirm = function (message, type = 'question') {
    return Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
        allowEscapeKey: false,
        allowOutsideClick: false
    })
        .fire({
            icon: type,
            title: message,
            width: 700,
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> SIM',
            cancelButtonText: '<i class="fa fa-thumbs-down"></i> NÃO'
        });
}
