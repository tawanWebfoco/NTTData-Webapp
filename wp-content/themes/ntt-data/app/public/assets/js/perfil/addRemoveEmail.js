const formGuest = document.querySelector('form#formGuest')
const containerField = document.querySelector('form#formGuest .container')
let addEmail = document.getElementById('addEmail')

addEmail.addEventListener('click', fnAddEmail)

function fnAddEmail(){
    
    const boxField = document.createElement('div')
    boxField.className = 'field';

    const boxLabel = document.createElement('label')
    boxLabel.className = 'label';
    boxLabel.innerText= 'e-mail';
    boxLabel.setAttribute('for', 'email');

    const boxInput = document.createElement('input');
    boxInput.setAttribute('type', 'email[]')
    boxInput.setAttribute('name', 'email[]')
    boxInput.setAttribute('required','')
    
    const boxImg = document.createElement('img');
    boxImg.className = 'addEmail';
    boxImg.id = 'removeEmail';
    boxImg.src = '../wp-content/themes/ntt-data/app/public/assets/img/icons/perfil/remove-circle.svg';
    boxImg.setAttribute('alt', 'Icone AddEmail')

    boxField.insertAdjacentElement('afterbegin', boxImg)
    boxField.insertAdjacentElement('afterbegin', boxInput)
    boxField.insertAdjacentElement('afterbegin', boxLabel)
    
    containerField.insertAdjacentElement('beforebegin', boxField)

    boxImg.addEventListener('click',()=>{
        boxField.remove(boxField);
    })
}
