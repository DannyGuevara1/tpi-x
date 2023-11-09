@extends('template')
@section('titlePage','admin')
@section('head')
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bulma.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/css/styles.css'])
@vite(['resources/css/adminUsers.css'])
<!-- <link rel="stylesheet" href="css/table.css"> -->
<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>
<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bulma.min.js" defer></script>
@vite(['resources/js/adminUsers.js'])

@stop

@section('content')
<header>
    <div id="menu-bar" class="fa fa-bars"></div>
    <a href="#" class="logo">Logo</a>
    <nav class="navbar">
        <a href="{{route('index')}}">Home</a>
        <a href="{{route('adminProducts')}}">Manage products</a>
        <a href="#fearured" class="active">Manage users</a>
    </nav>
    <div class="icons">

    </div>
</header>
<section class="featured" id="fearured">
    @error('Message')
    <br><br>
    <div class="alert alert-success">
        <h2>{{ $message }}</h2>
    </div>
    @enderror
    <form action="{{route('user.register')}}" method="POST" id="FormProfile" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="image-container">
                <div class="big-image image-center">
                    <label class="label boton-avatar" style="border-color: @error('image_profile') red;  @else green; @enderror">
                        <input id="img-user" type="file" name="image_profile" />
                        <span><i class="far fa-image"></i></span>
                    </label>

                </div>
            </div>
            <div class="content">
                <div class="perfil-usuario-form" id="perfil-usuario-form">
                    <ul class="lista-datos">
                        <div class="person-name">
                            <label for="person-name">Name</label>
                            <input id="person-name" placeholder="Name" name="name" type="text" style="border-color: @error('name') red;  @else green; @enderror"></input>

                        </div>
                        <div class="person-gender">
                            <label for="person-gender-female">Gender</label>
                            <div class="radio-container" style="border-color: @error('gender') red;  @else green; @enderror">
                                <input id="person-gender-female" name="gender" type="radio" value="female" onchange="getValue(this)"></input>
                                <label for="person-gender-female">Female</label>
                                <input id="person-gender-male" name="gender" type="radio" value="male" onchange="getValue(this)"></input>
                                <label for="person-gender-male">Male</label>

                            </div>
                        </div>
                        <div class="person-age">
                            <label for="person-age">Age</label>
                            <input id="person-age" placeholder="Age" type="number" name="age" style="border-color: @error('age') red;  @else green; @enderror" min="18" max="150"></input>

                        </div>
                        <div class="person-email">
                            <label for="person-email">Email</label>
                            <input id="person-email" placeholder="Email" name="email" type="email" style="border-color: @error('email') red;  @else green; @enderror"></input>

                        </div>
                        <div class="person-email">
                            <label for="person-email">Password</label>
                            <input id="person-password" placeholder="Password" name="password" type="password" style="border-color: @error('password') red;  @else green; @enderror"></input>

                        </div>
                    </ul>
                    <ul class="lista-datos">
                        <div class="person-location">
                            <label for="person-location">Address</label>
                            <input id="person-location" placeholder="Address" name="address" type="text" style="border-color: @error('address') red;  @else green; @enderror"></input>

                        </div>

                        <div class="person-location">
                            <label for="person-location">Shipping Address</label>
                            <input id="person-location" placeholder="Shipping Address" name="shipping_address" type="text" style="border-color: @error('shipping_address') red;  @else green; @enderror"></input>

                        </div>

                        <div class="person-location">
                            <label for="person-location">Description</label>
                            <input id="person-location" placeholder="Description" name="description" type="text" style="border-color: @error('description') red;  @else green; @enderror"></input>

                        </div>

                        <div class="person-country">
                            <label for="person-country">country</label>
                            <input id="person-country" placeholder="country" name="country" type="text" style="border-color: @error('country') red;  @else green; @enderror"></input>

                        </div>
                        <div class="person-user">
                            <label for="person-user">user</label>
                            <input id="person-user" placeholder="user" name="username" type="text" style="border-color: @error('username') red;  @else green; @enderror"></input>

                        </div>
                        <div class="update">
                            <button class="button-setting" role="button" type="submit" id="create">Create</button>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </form>

</section>
<!--end featured-->

<!-- table  -->

<section class="admin-table">
    <table id="example" class="table is-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Username</th>
                <th>Country</th>
                <th>Address</th>
                <th>Shipping address</th>
                <th>Discount</th>
                <th>Gender</th>
                <th>Rol</th>
                <th>View</th>
                <th>Eliminate</th>
            </tr>
        </thead>
        <tbody id="tableUsers">

        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Username</th>
                <th>Country</th>
                <th>Address</th>
                <th>Shipping address</th>
                <th>Discount</th>
                <th>Gender</th>
                <th>Rol</th>
                <th>View</th>
                <th>Eliminate</th>
            </tr>
        </tfoot>
    </table>
</section>

@stop
@push('customjs')
<script>
    async function eliminarUsers(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                await axios.delete('http://127.0.0.1:8000/api/users/delete/' + id);
                //recargar pagina
                // window.location.reload()
            }

        })
    }
    let FormProfile = document.getElementById('FormProfile');
    FormProfile.addEventListener('submit', validarCampos)

    function validarCampos(event) {
        event.preventDefault();
        let name = document.getElementById('person-name').value;
        let country = document.getElementById('person-country').value;
        let password = document.getElementById('person-password').value;
        let nameLetters = /^[a-zA-Z\s]*$/;
        if (!nameLetters.exec(name)) {
            alert("Nombre Invalido, no se permiten numeros, ni simbolos!");

            return false;
        }
        if (!nameLetters.exec(country)) {
            alert("Country Invalido, no se permiten numeros, ni simbolos!");

            return false;
        }
        let ExpRegPassFuerte = /(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=|:;"'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}/;

        if (/\s/.test(password)) {
            alert("La contraseña no debe contener espacios en blanco.");
            return false;
        } else if (password.match(ExpRegPassFuerte) != null) {
            //si los demás datos están bien y la contraseña es segura, se envian los datos del formulario
            alert("DATOS VALIDOS!");
            this.submit();
        } else {
            alert("CONTRASEÑA INVALIDA! Debe contener al menos 8 caracteres, una mayuscula y una minuscula, un caracter especial +*. y almenos un número!");

            return false;
        }
        this.submit();
    }
</script>
@endpush