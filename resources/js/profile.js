const setting = document.getElementById('setting');
const perfil_usuario_form = document.getElementById('perfil-usuario-form');
const close_cart = document.getElementById('close-cart');
setting.addEventListener('click',function (){
    perfil_usuario_form.classList.add('active');
})
close_cart.addEventListener('click', function(){
    perfil_usuario_form.classList.remove('active');
})

let FormProfile = document.getElementById('FormProfile');
let FormProfiles = document.getElementById('FormProfiles');
FormProfiles.addEventListener('submit',validarCamposProfiles);
FormProfile.addEventListener('submit',validarCampos);
function validarCampos(event){
    event.preventDefault();
    let name = document.getElementById('person-name').value;
    let country = document.getElementById('person-country').value;
    let password = document.getElementById('person-password').value;
    let nameLetters = /^[a-zA-Z\s]*$/;
    if(!nameLetters.exec(name)){
        alert("Nombre Invalido, no se permiten numeros, ni simbolos!");

        return false;
    }
    if(!nameLetters.exec(country)){
        alert("Country Invalido, no se permiten numeros, ni simbolos!");

        return false;
    }
    let ExpRegPassFuerte=/(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=|:;"'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}/;

    if(/\s/.test(password))
    {
        alert("La contraseña no debe contener espacios en blanco.");
        return false;
    }
    else if(password.match(ExpRegPassFuerte)!=null)
    {
        //si los demás datos están bien y la contraseña es segura, se envian los datos del formulario
        alert("DATOS VALIDOS!");
        this.submit();
    }
    else
    {
        alert("CONTRASEÑA INVALIDA! Debe contener al menos 8 caracteres, una mayuscula y una minuscula, un caracter especial +*. y almenos un número!");

        return false;
    }
    this.submit();
}

function validarCamposProfiles(event){
    event.preventDefault();
    let name = document.getElementById('person-name').value;
    let country = document.getElementById('person-country').value;

    let nameLetters = /^[a-zA-Z\s]*$/;
    if(!nameLetters.exec(name)){
        alert("Nombre Invalido, no se permiten numeros, ni simbolos!");

        return false;
    }
    if(!nameLetters.exec(country)){
        alert("Country Invalido, no se permiten numeros, ni simbolos!");

        return false;
    }

    this.submit();
}
