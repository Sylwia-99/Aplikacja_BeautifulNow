const form = document.querySelector("form");
const nameInput = form.querySelector('input[name="name"]');
const surnameInput = form.querySelector('input[name="surname"]');
const descriptionInput = form.querySelector('input[name="description"]');
const addressInput = form.querySelector('input[name="address"]');
const phoneNumberInput = form.querySelector('input[name="telephone"]');

function testLength(name, length){
    return name.value.length >= length;
}

function isPhoneNumber(number){
    return /^[0-9\+]{8,13}$/.test(number);
}

function markValidation(element,condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateName(){
    setTimeout( function(){
            markValidation(nameInput, testLength(nameInput, 3));
        }, 1000
    );
}

nameInput.addEventListener('keyup', validateName);

function validateSurname(){
    setTimeout( function(){
            markValidation(surnameInput, testLength(surnameInput, 3));
        }, 1000
    );
}

surnameInput.addEventListener('keyup', validateSurname);

function validateDescription(){
    setTimeout( function(){
            markValidation(descriptionInput, testLength(descriptionInput, 3));
        }, 1000
    );
}

addressInput.addEventListener('keyup', validateDescription);

function validateAddress(){
    setTimeout( function(){
            markValidation(addressInput, testLength(addressInput, 3));
        }, 1000
    );
}

addressInput.addEventListener('keyup', validateAddress);

function validateNumber(){
    setTimeout( function(){
            markValidation(phoneNumberInput, isPhoneNumber(phoneNumberInput.value));
        }, 1000
    );
}

phoneNumberInput.addEventListener('keyup', validateNumber);