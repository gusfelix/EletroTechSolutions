// abrir e fechar pop up
function popUpUser(){
    
    if(document.getElementById('popUp').style.display == "block"){
        document.getElementById('popUp').style.display = "none"
    }else{
        document.getElementById('popUp').style.display = "block"
    }
    
}
function exitPopUpUser(){
    document.getElementById('popUp').style.display = "none"
    
}

let data = new Date();
const linkAgenda = document.getElementById('link-agenda');

linkAgenda.href = `../agendamento/?data=${date_format(data)}`;

function date_format(data){
            
    let dia = data.toLocaleString("default", { day: "2-digit" });
    let mes = data.toLocaleString("default", { month: "2-digit" });
    let ano = data.toLocaleString("default", { year: "numeric" });
    
    return `${ano}-${mes}-${dia}`;
}

if(localStorage.getItem('date')){

    let date = date_format(data);
    localStorage.setItem('date', JSON.stringify(date));

}else{

    let date = date_format(data);
    localStorage.setItem('date', JSON.stringify(date));
}

// menu lateral
function barraLateral(){

    let menu = document.getElementById('mainMenu')
    let btn = document.getElementById('btnMenu')
  
    if(menu.style.display == 'block'){
      menu.style.display = 'none'
      
    }else{
      menu.style.display = 'block'
      
    }
}