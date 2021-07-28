function sessionTimeout(){
    bootbox.alert({
        message: `<i class="fa fa-times-circle text-danger fa-lg mr-1"></i> Session anda telah habis, silahkan login kembali`,
        size: 'medium',
        centerVertical: true,
        buttons: {
            ok: {
                label: 'Ok',
                className: 's-btn-pink',
            }
        },
        callback: function () {
            window.location = '/login';
        }
    });
}