@extends('template')
@section('titlePage','orders')
@section('head')
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Orders and coupons</title>
@vite(['resources/css/styles.css'])
@vite(['resources/css/orders.css'])
<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>
@vite(['resources/js/orders.js'])
@vite(['resources/js/adminProduct.js'])
@stop
@section('content')
<header>
        <div id="menu-bar" class="fa fa-bars"></div>
        <a href="#" class="logo">Logo</a>
        <nav class="navbar">
            <a href="{{route('index')}}">Home</a>
            <a href="#fearured" class="active">Orders</a>
            <a href="{{route('Hsales')}}">History sales</a>
            <a href="coupons.html">coupons</a>

        </nav>
        <div class="icons">

        </div>
    </header>
    <section class="featured" id="fearured">
        <h1 class="heading">My <span>Orders</span></h1>
        <form action="#" method="POST">
        <div class="row" id="ordersContend">

        </div>
        </form>

    </section>
@stop
@push('customjs')
    <script>
        async function deleteSale(id){
            await axios.delete('http://127.0.0.1:8000/api/sales/delete/'+id);
            //recargar pagina
            window.location.reload()
        }
    </script>
@endpush
