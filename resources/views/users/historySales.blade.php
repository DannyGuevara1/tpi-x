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
    @vite(['resources/js/historySales.js'])
@stop
@section('content')
    <header>
        <div id="menu-bar" class="fa fa-bars"></div>
        <a href="#" class="logo">Logo</a>
        <nav class="navbar">
            <a href="{{route('index')}}">Home</a>
            <a href="{{route('ordersUser')}}" >Orders</a>
            <a href="#fearured" class="active">History sales</a>
            <a href="coupons.html">coupons</a>

        </nav>
        <div class="icons">

        </div>
    </header>
    <section class="featured" id="fearured">
        <h1 class="heading">My <span>History</span></h1>
        <form action="#" method="POST">
            <div class="row" id="ordersContend">

            </div>
        </form>

    </section>
@stop
