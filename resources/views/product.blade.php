@extends('template')
@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header">User Page</div>
  <div class="card-body">
        <div class="card-body">

        <p class="card-title">Name Product: {{ $producto["name_product"] }}</p>
        <p class="card-text">Category : {{ $producto["category"] }}</p>
        <p class="card-text">Stock : {{ $producto["stock"] }}</p>
        <p class="card-text">Precio : {{ $producto["price"] }}</p>
        <p class="card-text">Supplier : {{ $producto["supplier"] }}</p>
        <p class="card-text">Cost : {{ $producto["cost"] }}</p>
        <p class="card-text">Description : {{ $producto["description"] }}</p>
        <p class="card-text">Image Product :  <img height="40px" src="{{ asset('storage/'. $producto['image_product']) }}" alt=""></p>
        <p class="card-text">Created At : {{ $producto["created_at"] }}</p>
        <p class="card-text">Updated At : {{ $producto["updated_at"] }}</p>


  </div>
    <hr/>
  </div>
</div>
@endsection