var openOption = function(){
    const modal = document.querySelector('.option-modal');
    const actualStyle = modal.style.display;
    if(actualStyle == 'block'){
        modal.style.display = 'none';
    }
    else{
        modal.style.display = 'block';
    }
    const btn = document.querySelector('.button-back');
    btn.addEventListener('click', openOption);
}

var openMenu = function(){
    const modal = document.querySelector('.profile-modal');
    const actualStyle = modal.style.display;
    if(actualStyle == 'block'){
        modal.style.display = 'none';
    }
    else{
        modal.style.display = 'block';
    }
    const btn = document.querySelector('.profile-button-close');
    btn.addEventListener('click', openMenu);
}