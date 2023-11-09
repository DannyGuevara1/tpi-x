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
                <img src="{{ asset('/storage/'. $user->image_profile) }}" alt="img-avatar">

            </div>
        </div>

    </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">
            <h3 class="titulo">{{$user->name}}</h3>
            <p class="texto">{{$user->description}}</p>
        </div>
        <div class="perfil-usuario-footer">
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-signs"></i> Direccion de envio: {{$user->shipping_address}}</li>
                <li><i class="icono fa-solid fa-venus-mars"></i> Genero: {{$user->gender}}</li>
                <li><i class="icono fa-solid fa-calendar-days"></i> Edad. {{$user->age}}</li>
                <li><i class="icono fas fa-building"></i> Correo {{$user->email}}</li>
            </ul>
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-marker-alt"></i> Ubicacion. {{$user->address}}</li>
                <li><i class="icono fa-solid fa-earth-americas"></i> Pais {{$user->country}}</li>
                <li><i class="icono fas fa-user-check"></i> Usuario. {{$user->username}}</li>
            </ul>
        </div>
        <div class="setting">
            <button class="button-setting" role="button" id="setting">Setting</button>
        </div>
        <form style="width: 100%" action="{{route('user.put', $user->id)}}" method="POST" id="FormProfiles" enctype="multipart/form-data">
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
                            <input id="person-gender-female" name="gender" {{old('gender') == "female" ? 'checked' : ''}} type="radio" value="female"></input>
                            <label for="person-gender-female">Female</label>
                            <input id="person-gender-male" name="gender" {{old('gender') == "male" ? 'checked' : ''}} type="radio" value="male"></input>
                            <label for="person-gender-male">Male</label>
                        </div>
                    </div>
                    <div class="person-age">
                        <label for="person-age">Age</label>
                        <input id="person-age" placeholder="Age" type="number" name="age"></input>
                    </div>
                    <div class="person-email">
                        <label for="person-email">Email</label>
                        <input id="person-email" placeholder="Email" type="email" name="email"></input>
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
                    <div class="person-gender">
                        <label for="person-rol-admin">Rol</label>
                        <div class="radio-container">
                            <input id="person-rol-admin" name="rol" {{old('rol') == "admin" ? 'checked' : ''}} type="radio" value="admin"></input>
                            <label for="person-rol-admin">Admin</label>
                            <input id="person-rol-user" name="rol" {{old('rol') == "user" ? 'checked' : ''}} type="radio" value="user"></input>
                            <label for="person-rol-user">User</label>
                        </div>
                    </div>


                    <div class="update">
                        <button class="button-setting" role="button" id="update" type="submit">Update</button>
                    </div>

                </ul>
                <i class="fa-solid fa-xmark" id="close-cart"></i>
            </div>
        </form>
    </div>


</section>
@stop
