const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
const PasswordInput = form.querySelector('input[name="password"]');
const phoneNumberInput = form.querySelector('input[name="phone"]');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function isPhoneNumber(number){
    return /^[0-9\+]{8,13}$/.test(number);
}

function markValidation(element,condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail(){
    setTimeout( function(){
            markValidation(emailInput, isEmail(emailInput.value));
        }, 1000
    );
}

emailInput.addEventListener('keyup', validateEmail);

function validatePassword(){
    setTimeout( function(){
            const condition = arePasswordSame(
                PasswordInput.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        }, 1000
    );
}

confirmedPasswordInput.addEventListener('keyup', validatePassword);

function validateNumber(){
    setTimeout( function(){
            markValidation(phoneNumberInput, isPhoneNumber(phoneNumberInput.value));
        }, 1000
    );
}

phoneNumberInput.addEventListener('keyup', validateNumber);