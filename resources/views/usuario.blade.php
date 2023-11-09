@extends('template')
@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header">User Page</div>
  <div class="card-body">
        <div class="card-body">
          @php
            ($usuario['rol'] === 0)? $rol = 'Usuario' : $rol = 'Admin';
          @endphp

        <p class="card-title">Name : {{ $usuario["name"] }}</p>
        <p class="card-text">Address : {{ $usuario["address"] }}</p>
        <p class="card-text">Age : {{ $usuario["age"] }}</p>
        <p class="card-text">Email : {{ $usuario["email"] }}</p>
        <p class="card-text">Gender : {{ $usuario["gender"] }}</p>
        <p class="card-text">Discount : {{ $usuario["discount"] }}</p>
        <p class="card-text">Updated At : {{ $usuario["updated_at"] }}</p>
        <p class="card-text">Created At : {{ $usuario["created_at"] }}</p>
        <p class="card-text">Image Profile : <img height="40px" src="{{ asset('storage/'. $usuario['image_profile']) }}" alt=""></p>
        <p class="card-text">Role : {{$rol}}</p>
        <p class="card-text">Country : {{ $usuario["country"] }}</p>
        <p class="card-text">Referral Link : {{ $usuario["referral_link"] }}</p>

  </div>
    <hr/>
  </div>
</div>
@endsection