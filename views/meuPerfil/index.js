// DISPLAY NONE
function chamaPerfil(){
    document.getElementById("artEnderecoInput").style.display = "none"
    document.getElementById("artPerfilInput").style.display = "flex"
    document.getElementById("artSenhaInput").style.display = "none"
    document.getElementById("artCartaoInput").style.display = "none"
    document.getElementById("artPlanoInput").style.display = "none"
}

function chamaEndereco(){
    document.getElementById("artEnderecoInput").style.display = "flex"
    document.getElementById("artPerfilInput").style.display = "none"
    document.getElementById("artSenhaInput").style.display = "none"
    document.getElementById("artCartaoInput").style.display = "none"
    document.getElementById("artPlanoInput").style.display = "none"
}

function chamaSenha(){
    document.getElementById("artEnderecoInput").style.display = "none"
    document.getElementById("artPerfilInput").style.display = "none"
    document.getElementById("artSenhaInput").style.display = "flex"
    document.getElementById("artCartaoInput").style.display = "none"
    document.getElementById("artPlanoInput").style.display = "none"
}

function chamaCartao(){
    document.getElementById("artEnderecoInput").style.display = "none"
    document.getElementById("artPerfilInput").style.display = "none"
    document.getElementById("artSenhaInput").style.display = "none"
    document.getElementById("artCartaoInput").style.display = "flex"
    document.getElementById("artPlanoInput").style.display = "none"
}

function chamaPlano(){
    document.getElementById("artEnderecoInput").style.display = "none"
    document.getElementById("artPerfilInput").style.display = "none"
    document.getElementById("artSenhaInput").style.display = "none"
    document.getElementById("artCartaoInput").style.display = "none"
    document.getElementById("artPlanoInput").style.display = "flex"
}

// MASK'S
new Cleave('#inputTel', {
    delimiters: ['(', ')', ' ', '-'],
    blocks: [0, 2, 0, 5, 4],
    numericOnly: true
});

new Cleave('#inputCep', {
    delimiters: ['-'],
    blocks: [5, 3],
    numericOnly: true
});

new Cleave('#inputN°', {
    blocks: [5],
    numericOnly: true
});

new Cleave('#inputNumberCartao', {
    delimiters: [' ', ' ', ' '],
    blocks: [4, 4, 4, 4],
    numericOnly: true
});

new Cleave('#inputDataCartao', {
    date: true,
    datePattern: ['m', 'y']
});

new Cleave('#inputCvv', {
    blocks: [3],
    numericOnly: true
});


// INPUTS PERFIL
function testPerfil(){
    
    let inputNome = document.getElementById("inputNome").value;
    let inputTel = document.getElementById("inputTel").value;

    if(inputNome == ""){
        document.getElementById("inputNome").style.border = "1px solid red";
        return false
    }else if(inputTel.length < 15){
        document.getElementById("inputTel").style.border = "1px solid red";
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
        Command: toastr["success"]("Perfil alterado com sucesso", "Alteração concluída!")

        block();
        return true
    }
}
//resetar a borada do input
document.getElementById('inputNome').addEventListener("focus", function() {
    document.getElementById('inputNome').style.border = "1px solid #0e73e8";
});
document.getElementById('inputNome').addEventListener("focusout", function() {
    document.getElementById('inputNome').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputTel').addEventListener("focus", function() {
    document.getElementById('inputTel').style.border = "1px solid #0e73e8";
});
document.getElementById('inputTel').addEventListener("focusout", function() {
    document.getElementById('inputTel').style.border = "1px solid rgb(114, 114, 114)";
});

// INPUTS ENDEREÇO
function testEndereco(){
    
    let inputCep = document.getElementById("inputCep").value;
    let inputEndereco = document.getElementById("inputEndereco").value;
    let inputNumero = document.getElementById("inputN°").value;

    if(inputCep.length < 9){
        document.getElementById("inputCep").style.border = "1px solid red";
        return false
    }else if(inputEndereco.length < 1){
        document.getElementById("inputEndereco").style.border = "1px solid red";
        return false
    }else if(inputNumero.length < 1){
        document.getElementById("inputN°").style.border = "1px solid red";
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
        Command: toastr["success"]("Endereço alterado com sucesso", "Alteração concluída!")

        block();
        return true
    }
}
//resetar a borada do input
document.getElementById('inputCep').addEventListener("focus", function() {
    document.getElementById('inputCep').style.border = "1px solid #0e73e8";
});
document.getElementById('inputCep').addEventListener("focusout", function() {
    document.getElementById('inputCep').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputEndereco').addEventListener("focus", function() {
    document.getElementById('inputEndereco').style.border = "1px solid #0e73e8";
});
document.getElementById('inputEndereco').addEventListener("focusout", function() {
    document.getElementById('inputEndereco').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputN°').addEventListener("focus", function() {
    document.getElementById('inputN°').style.border = "1px solid #0e73e8";
});
document.getElementById('inputN°').addEventListener("focusout", function() {
    document.getElementById('inputN°').style.border = "1px solid rgb(114, 114, 114)";
});

// INPUTS SENHA
function testSenha(){
    let inputSenhaAntiga = document.getElementById("inputSenhaAntiga").value;
    let inputSenha = document.getElementById("inputSenha").value;
    let inputConfSenha = document.getElementById("inputConfSenha").value;
    const regexSenha = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

    if(inputSenhaAntiga.length < 1){

        document.getElementById("inputSenhaAntiga").style.border = "1px solid red";
        return false

    }else if(inputSenha != inputConfSenha){

        document.getElementById("inputSenha").style.border = "1px solid red";
        document.getElementById("inputSenha").value = "";
        document.getElementById("inputConfSenha").value = "";

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
        Command: toastr["error"]("Confirmação de senha não confere", "Senhas não conferem")
        return false

    }else if(regexSenha.test(inputSenha) == false){ //verifica o regex -----

        document.getElementById("inputSenha").value = "";
        document.getElementById("inputConfSenha").value = "";
        document.getElementById("inputSenha").style.border = "1px solid red";

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
        Command: toastr["error"]("Mínimo de 8 caracteres entre números, letras e caracteres especiais", "Senha fraca")
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
        Command: toastr["success"]("Senha alterada com sucesso", "Alteração concluída!")

        block();
        return true
    }
}
//resetar a borada do input
document.getElementById('inputSenhaAntiga').addEventListener("focus", function() {
    document.getElementById('inputSenhaAntiga').style.border = "1px solid #0e73e8";
});
document.getElementById('inputSenhaAntiga').addEventListener("focusout", function() {
    document.getElementById('inputSenhaAntiga').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputSenha').addEventListener("focus", function() {
    document.getElementById('inputSenha').style.border = "1px solid #0e73e8";
});
document.getElementById('inputSenha').addEventListener("focusout", function() {
    document.getElementById('inputSenha').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputConfSenha').addEventListener("focus", function() {
    document.getElementById('inputConfSenha').style.border = "1px solid #0e73e8";
});
document.getElementById('inputConfSenha').addEventListener("focusout", function() {
    document.getElementById('inputConfSenha').style.border = "1px solid rgb(114, 114, 114)";
});

// INPUTS CARTÃO
function testCartao(){
    
    let inputNumberCartao = document.getElementById("inputNumberCartao").value;
    let inputNomeCartao = document.getElementById("inputNomeCartao").value;
    let inputDataCartao = document.getElementById("inputDataCartao").value;
    let inputCvv = document.getElementById("inputCvv").value;

    if(inputNumberCartao.length < 19){
        document.getElementById("inputNumberCartao").style.border = "1px solid red";
        return false
    }else if(inputNomeCartao.length < 1){
        document.getElementById("inputNomeCartao").style.border = "1px solid red";
        return false
    }else if(inputDataCartao.length < 5){
        document.getElementById("inputDataCartao").style.border = "1px solid red";
        return false
    }else if(inputCvv.length < 3){
        document.getElementById("inputCvv").style.border = "1px solid red";
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
        Command: toastr["success"]("Endereço alterado com sucesso", "Alteração concluída!")

        block();
        return true
    }
}
//resetar a borada do input
document.getElementById('inputNumberCartao').addEventListener("focus", function() {
    document.getElementById('inputNumberCartao').style.border = "1px solid #0e73e8";
});
document.getElementById('inputNumberCartao').addEventListener("focusout", function() {
    document.getElementById('inputNumberCartao').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputNomeCartao').addEventListener("focus", function() {
    document.getElementById('inputNomeCartao').style.border = "1px solid #0e73e8";
});
document.getElementById('inputNomeCartao').addEventListener("focusout", function() {
    document.getElementById('inputNomeCartao').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputDataCartao').addEventListener("focus", function() {
    document.getElementById('inputDataCartao').style.border = "1px solid #0e73e8";
});
document.getElementById('inputDataCartao').addEventListener("focusout", function() {
    document.getElementById('inputDataCartao').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputCvv').addEventListener("focus", function() {
    document.getElementById('inputCvv').style.border = "1px solid #0e73e8";
});
document.getElementById('inputCvv').addEventListener("focusout", function() {
    document.getElementById('inputCvv').style.border = "1px solid rgb(114, 114, 114)";
});

// meu plano
function testPlano(){
    let inputSenha = document.getElementById("inputPlano").value;

    if(inputPlano.length < 1){

        document.getElementById("inputPlano").style.border = "1px solid red";
        
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
        Command: toastr["error"]("Senha informada incorreta", "Senha não confere")

        return false
    }else{

        block();
        return true
    }
}

function block(){
    const btns = document.querySelectorAll('.btnSalvar');

    btns.forEach(btn =>{
        btn.setAttribute('type', 'button');
        btn.style.cursor = 'not-allowed';
    });
}