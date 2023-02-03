// CONF SENHA
function testCampos(){

    let senha = document.getElementById("inputSenha").value;
    let conf_senha = document.getElementById("inputConfSenha").value;
    let cpf = document.getElementById("inputCpf").value;
    let inputTel = document.getElementById("inputTel").value;
    let email = document.getElementById("inputEmail").value;

    const regexSenha = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    const regexMail = /\S+@\S+\.\S+/;

    //CPF -----
    cpf = cpf.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");

    dig10 = parseInt(cpf[9]);
    dig11 = parseInt(cpf[10]);

    var cont = 0, tot1 = 0; //verificar o primeiro dígito

    for (let i = 10; i >= 2; i--) {

        var dig = parseInt(cpf[cont]);
        
        tot1 += dig * i;

        cont++;    
    }
    var digV10 = 11 - (tot1 % 11);

    if(digV10 > 9){
        digV10 = 0;
    }

    var cont = 0, tot2 = 0; //verificar o segundo dígito

    for (let i = 11; i >= 2; i--) {

        var dig = parseInt(cpf[cont]);
        
        tot2 += dig * i;

        cont++;    
    }
    var digV11 = 11 - (tot2 % 11);

    if(digV11 > 9){
        digV11 = 0;
    }
    //FIM TESTE CPF ----

    if (senha != conf_senha) { //verifica se os campos são iguais -----

        document.getElementById("inputConfSenha").value = "";
        document.getElementById("inputConfSenha").style.border = "1px solid red";

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
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
        Command: toastr["error"]("Favor verificar os campos", "Senhas não conferem")
        return false

    }else if(regexSenha.test(senha) == false){ //verifica o regex -----

        document.getElementById("inputSenha").value = "";
        document.getElementById("inputConfSenha").value = "";
        document.getElementById("inputSenha").style.border = "1px solid red";

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
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

    }else if(regexMail.test(email) == false){

        document.getElementById("inputEmail").value = "";
        document.getElementById("inputEmail").style.border = "1px solid red";

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
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
        Command: toastr["error"]("O e-mail que você digitou não é válido", "E-mail inválido")
        return false

    }else if(dig10 != digV10 || dig11 != digV11){

        document.getElementById("inputCpf").value = "";
        document.getElementById("inputCpf").style.border = "1px solid red";
        
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
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
        Command: toastr["error"]("Favor verificar o campo de CPF", "CPF inválido")
        return false

    }else if(inputTel.length < 15){

        document.getElementById("inputTel").style.border = "1px solid red";

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
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
        Command: toastr["error"]("Favor verificar o campo de telefone", "Telefone inválido")
        return false
    
    }else{ //se não houver nenhuma convergência nos campos irá executar e retornar true para o form -----

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
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
        Command: toastr["success"]("Você será redirecionado!", "Cadastro concluído")

        block();
        return true
    }
    
}
//resetar a borada do input
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
document.getElementById('inputCpf').addEventListener("focus", function() {
    document.getElementById('inputCpf').style.border = "1px solid #0e73e8";
});
document.getElementById('inputCpf').addEventListener("focusout", function() {
    document.getElementById('inputCpf').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputTel').addEventListener("focus", function() {
    document.getElementById('inputTel').style.border = "1px solid #0e73e8";
});
document.getElementById('inputTel').addEventListener("focusout", function() {
    document.getElementById('inputTel').style.border = "1px solid rgb(114, 114, 114)";
});

// MASK'S
new Cleave('#inputCpf', {
    delimiters: ['.', '.', '-'],
    blocks: [3, 3, 3, 2],
    numericOnly: true
});

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

function block(){
    const btn = document.getElementById('btn');

    btn.setAttribute('type', 'button');
    btn.style.cursor = 'not-allowed';
}