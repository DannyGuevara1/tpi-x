const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const sign_up_container = document.querySelector('#form-sing-up');
const sign_in_container = document.querySelector('#form-sing-in');

let formRegistro = document.getElementById('formRegistro');
formRegistro.addEventListener('submit',validarCampos);
function validarCampos(evento){
    evento.preventDefault();
    let name = document.getElementById("name").value;
    let age = document.getElementById("age").value;
    let username = document.getElementById("username").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById('password').value;
    if(name == "" && age == "" && username == "" && email == "" && password == "") {
        
        Swal.fire({
            title: 'Error!',
            text: `Debe rellenar todos los campos`,
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("name").style.border = "2px solid red;";
        document.getElementById("age").style.border = "2px solid red;";
        document.getElementById("username").style.border = "2px solid red;";
        document.getElementById("email").style.border = "2px solid red;";
        document.getElementById("password").style.border = "2px solid red;";
        return false;
    }

    //para cuando se deja un solo campo vacio
    if(name == "" || age == "" || username == "" || email == ""  || password == "") {
        Swal.fire({
            title: 'Error!',
            text: 'Verifique y rellene todos los campos',
            icon: 'error',
            confirmButtonText: 'Cool'
          })
        document.getElementById("name").style.border = "2px solid red";
        document.getElementById("age").style.border = "2px solid red";
        document.getElementById("username").style.border = "2px solid red";
        document.getElementById("email").style.border = "2px solid red";
        document.getElementById("password").style.border = "2px solid red";
        return false;
    }

    //Se compara la expreseion regular de solo letras May o min permitiendo uso de espacio con el valor ingresado
    //la s permite espacios entre palabras
    let nameLetters = /^[a-zA-Z\s]*$/;
    if(!nameLetters.exec(name)){
        Swal.fire({
            title: 'Error!',
            text: 'Nombre Invalido, no se permiten numeros, ni simbolos!',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("name").style.border = "2px solid red";
        return false;
    }

    //se valida el tamaño minimo de caracteres que puede incluir el nombre
    let nameLength = /.{3,}/;

    if(!nameLength.exec(name)){
        Swal.fire({
            title: 'Error!',
            text: 'El nombre debe tener minimo 3 caracteres o mas letras',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("name").style.border = "2px solid red";
        return false;
    }

    //si valida el tamaño minimo y los tipos de datos que se pueden ingresar
    let userNameLength = /.{4,}/;

    if(!userNameLength.exec(username)){
        Swal.fire({
            title: 'Error!',
            text: 'nombre de usuario muy pequeño, al menos 6 caracteres o mas',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("username").style.border = "2px solid red";
        return false;
    }

    let userNameLetter = /^[a-zA-Z0-9\_]+$/;

    if(!userNameLetter.exec(username)){
        Swal.fire({
            title: 'Error!',
            text: 'El usuario debe contener solo letras/numeros y guio bajo sin espacios',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("username").style.border = "2px solid red";
        return false;
    }

    //username no contenga espacios ni al inicio, centro o al final
    if(/\s/.test(username))
    {
        Swal.fire({
            title: 'Error!',
            text: 'el usuario no debe contener espacios en blanco.',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("username").style.border = "2px solid red";
        return false;
    }


    //VALIDAR EDAD
    if(age<18)
    {
        Swal.fire({
            title: 'Error!',
            text: 'La edad debe ser mayor o igual a 18 años',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("age").style.border = "2px solid red";
        return false;
    }

    /////// VALIDAR RADIOS QUE NO QUEDEN SIN MARCAR ////////////////////////////////////////

    // obtenemos todos los input radio del grupo genero y rol que esten chequeados
    // si no hay ninguno lanzamos alerta

    //en este caso es cuando ninguna de las categorias se ha seleccionado
    if(!document.querySelector('input[name="gender"]:checked')) {
        Swal.fire({
            title: 'Error!',
            text: 'Error, por favor, completa la opcion de GENERO',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("gender").style.border = "2px solid red";
        return false;
    }



    /////// VALIDAR CORREO, ES DECIR QUE TENGA ESTA FORMA example@gmail.com ////////////////////////////////////////
    let expresion = /\w+@\w+\.+[a-z]/;
    if (!expresion.test(email)) {

        Swal.fire({
            title: 'Error!',
            text: `El email: ${email} no es valido. Debe contener @ y extension -> example@gmail.com`,
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("email").style.border = "2px solid red";
        return false;
    }
    let ExpRegPassFuerte=/(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=|:;"'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}/;

    if(/\s/.test(password))
    {
        Swal.fire({
            title: 'Error!',
            text: 'La contraseña no debe contener espacios en blanco.',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("password").style.border = "2px solid red";
        return false;
    }
    else if(password.match(ExpRegPassFuerte)!=null)
    {
        //si los demás datos están bien y la contraseña es segura, se envian los datos del formulario
        Swal.fire(
            'DATOS VALIDOS!',
            '',
            'success'
        )
        this.submit();
    }
    else
    {
        
        Swal.fire({
            title: 'Error!',
            text: 'CONTRASEÑA INVALIDA! Debe contener al menos 8 caracteres, una mayuscula y una minuscula, un caracter especial +*. y almenos un número!',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        document.getElementById("password").style.border = "2px solid red";
        return false;
    }
}
function error(text){
    Swal.fire({
        title: 'Error!',
        text: text,
        icon: 'error',
        confirmButtonText: 'Cool'
    })
}
signUpButton.addEventListener('click', () => {
	sign_up_container.classList.add('active');
	sign_in_container.classList.add('disable');
});

signInButton.addEventListener('click', () => {
	sign_in_container.classList.remove('disable');
    sign_up_container.classList.remove('active');
});







