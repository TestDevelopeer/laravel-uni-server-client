$(function (){
    if($('.was-validated').length > 0) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance($('#updated'));
        toastBootstrap.show();
        setTimeout(function (){
            $('.was-validated').removeClass('was-validated');
        }, 2000);
    }
});
