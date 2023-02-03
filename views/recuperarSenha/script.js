function toast(){

    let email = document.getElementById("login").value;
    
    let erros = 0
        
    
    if(email == ""){
        document.getElementById('login').style.border = "1px solid red";
        erros++
    }

    if(erros > 0){
        return false
    }else{
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        Command: toastr["success"]("Enviamos a você um e-mail com sua nova senha!", "Email enviado")
        return true
    }
}


document.getElementById('login').addEventListener("focus", function() {
    document.getElementById('login').style.border = "1px solid #0e73e8";
});
document.getElementById('login').addEventListener("focusout", function() {
    document.getElementById('login').style.border = "1px solid rgb(114, 114, 114)";
});

function block(){
    const btn = document.getElementById('btnFinalizar');

    btn.setAttribute('type', 'button');
    btn.style.cursor = 'not-allowed';
}