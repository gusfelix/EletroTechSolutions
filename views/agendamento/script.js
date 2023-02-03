let data = new Date();
const calendar = document.getElementById('calendar');

if(localStorage.getItem('date')){

    let date = JSON.parse(localStorage.getItem('date'));

    calendar.value = date;

}else{

    let date = date_format(data);
    calendar.value = date;
    localStorage.setItem('date', JSON.stringify(date));
}

function setDia(){

    let date = calendar.value;

    localStorage.setItem('date', JSON.stringify(date))

    window.location.href = `?data=${date}`;
}

function date_format(data){
            
    let dia = data.toLocaleString("default", { day: "2-digit" });
    let mes = data.toLocaleString("default", { month: "2-digit" });
    let ano = data.toLocaleString("default", { year: "numeric" });
    
    return `${ano}-${mes}-${dia}`;
}

document.getElementById('calendar').min = date_format(data);

//POP UP
function toast(){
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
    Command: toastr["success"]("Seu agendamento foi concluído com sucesso", "Agendamento concluído!")
    return true
}

function block(){
    const btn = document.getElementById('btnFinalizar');

    btn.setAttribute('type', 'button');
    btn.style.cursor = 'not-allowed';
}