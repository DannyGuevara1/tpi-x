@extends('template')
@section('titlePage','Profile')
@section('head')
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
@vite(['resources/css/profile.css'])
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>
@vite(['resources/js/profile.js'])
@stop
@section('content')
<section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
            <div class="perfil-usuario-avatar">
                <img src="{{ asset('/storage/'. Auth::user()->image_profile) }}" alt="img-avatar">

                <form action="{{route('user.img', Auth::user()->id)}}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="label boton-avatar">
                    <span><i class="far fa-image"></i></span>
                    <input id="file" type="file" name="image_profile" ><br/>
                    </label>
                </form>

            </div>
        </div>

    </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">
            <h3 class="titulo">{{Auth::user()->name}}</h3>
            <p class="texto">{{Auth::user()->description}}</p>
        </div>
        <div class="perfil-usuario-footer">
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-signs"></i> Direccion de envio: {{Auth::user()->shipping_address}}</li>
                <li><i class="icono fa-solid fa-venus-mars"></i> Genero: {{Auth::user()->gender}}</li>
                <li><i class="icono fa-solid fa-calendar-days"></i> Edad. {{Auth::user()->age}}</li>
                <li><i class="icono fas fa-building"></i> Correo {{Auth::user()->email}}</li>
            </ul>
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-marker-alt"></i> Ubicacion. {{Auth::user()->address}}</li>
                <li><i class="icono fa-solid fa-earth-americas"></i> Pais {{Auth::user()->country}}</li>
                <li><i class="icono fas fa-user-check"></i> Usuario. {{Auth::user()->username}}</li>
                <li><i class="icono fas fa-user-check"></i> Codigo de referencia. {{Auth::user()->referral_link}}</li>
            </ul>
        </div>
        <div class="setting">
            <button class="button-setting" role="button" id="setting">Setting</button>
        </div>
        <form style="width: 100%" action="{{route('user.put', Auth::user()->id)}}" method="POST" id="FormProfile" enctype="multipart/form-data">
        <div class="perfil-usuario-form" id="perfil-usuario-form">
                @csrf
                @method('PUT')

                <ul class="lista-datos">
                    <div class="person-name">
                        <label for="person-name">Name</label>
                        <input id="person-name" placeholder="Name" type="text" name="name"></input>
                    </div>
                    <div class="person-gender">
                        <label for="person-gender-female">Gender</label>
                        <div class="radio-container">
                            <input id="person-gender-female"  name="gender" {{old('gender') == "female" ? 'checked' : ''}} type="radio" value="female"></input>
                            <label for="person-gender-female">Female</label>
                            <input id="person-gender-male"  name="gender" {{old('gender') == "male" ? 'checked' : ''}} type="radio" value="male"></input>
                            <label for="person-gender-male">Male</label>
                        </div>
                    </div>
                    <div class="person-age">
                        <label for="person-age">Age</label>
                        <input id="person-age" placeholder="Age" type="number" name="age" min="18" max="150"></input>
                    </div>
                    <div class="person-email">
                        <label for="person-email">Email</label>
                        <input id="person-email" placeholder="Email" type="email" name="email"></input>
                    </div>
                    <div class="person-name">
                        <label for="person-name">Password</label>
                        <input id="person-password" placeholder="password" type="text" name="password" ></input>
                    </div>
                </ul>
                <ul class="lista-datos">
                    <div class="person-location">
                        <label for="person-location">Address</label>
                        <input id="person-location" placeholder="address" type="text" name="address"></input>
                    </div>

                    <div class="person-location">
                        <label for="person-location">Shipping Address</label>
                        <input id="person-location" placeholder="shipping_address" name="shipping_address" type="text"></input>
                    </div>

                    <div class="person-country">
                        <label for="person-country">country</label>
                        <input id="person-country" placeholder="country" type="text" name="country"></input>
                    </div>
                    <div class="person-user">
                        <label for="person-user">user</label>
                        <input id="person-user" placeholder="user" type="text" name="username"></input>
                    </div>
                    <div class="person-user">
                        <label for="person-user">Description</label>
                        <input id="person-user" placeholder="user" type="text" name="description"></input>
                    </div>
                    <div class="update">
                        <button class="button-setting" role="button" id="update" type="submit">Update</button>
                    </div>

                </ul>
                <i class="fa-solid fa-xmark" id="close-cart"></i>
            </div>
        </form>
    </div>

      <script>
          document.getElementById('file').addEventListener("change",function(){
            document.getElementById('form').submit()
          });
      </script>
</section>
@stop
