// ADICIONA INFORMAÇÕES NO CARTÃO
const numero = document.getElementById("inputNumber")
const nome = document.getElementById("inputNome")
const data = document.getElementById("inputData")
const cvv = document.getElementById("inputCvv")

numero.addEventListener("keyup", function(){
    document.getElementById("number").innerHTML = numero.value
})

nome.addEventListener("keyup", function(){
    document.getElementById("nome").innerHTML = nome.value
})

data.addEventListener("keyup", function(){
    document.getElementById("data").innerHTML = data.value
})

cvv.addEventListener("keyup", function(){
    document.getElementById("cvv").innerHTML = cvv.value
})

// INPUTS ENDEREÇO
function testCartao(){
    
    let inputNumber = document.getElementById("inputNumber").value;
    let inputNome = document.getElementById("inputNome").value;
    let inputData = document.getElementById("inputData").value;
    let inputCvv = document.getElementById("inputCvv").value;

    if(inputNumber.length < 19){
        document.getElementById("inputNumber").style.border = "1px solid red";
        return false
    }else if(inputNome.length < 1){
        document.getElementById("inputNome").style.border = "1px solid red";
        return false
    }else if(inputData.length < 5){
        document.getElementById("inputData").style.border = "1px solid red";
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
        Command: toastr["success"]("Compra concluída", "Compra realizada com sucesso!")
        return true
    }
}
//resetar a borada do input
document.getElementById('inputNumber').addEventListener("click", function() {
    document.getElementById('inputNumber').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputNome').addEventListener("click", function() {
    document.getElementById('inputNome').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputData').addEventListener("click", function() {
    document.getElementById('inputData').style.border = "1px solid rgb(114, 114, 114)";
});
document.getElementById('inputCvv').addEventListener("click", function() {
    document.getElementById('inputCvv').style.border = "1px solid rgb(114, 114, 114)";
});

// MASK
new Cleave('#inputNumber', {
    delimiters: ['  ', '  ', '  '],
    blocks: [4, 4, 4, 4],
    uppercase: true,
    numericOnly: true
});

new Cleave('#inputData', {
    date: true,
    datePattern: ['m', 'y']
});

new Cleave('#inputCvv', {
    blocks: [3],
    numericOnly: true
});


