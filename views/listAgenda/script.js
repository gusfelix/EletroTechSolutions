const cards = document.querySelectorAll('.artInfos');

cards.forEach(card =>{
    if(card.getAttribute('value') == 'PENDENTE'){
        card.style.backgroundColor = '#e49d1a'
        
    }else{
        card.style.backgroundColor = '#6ed246'
    }
})