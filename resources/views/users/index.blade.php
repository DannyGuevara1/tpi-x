@extends('template')
@section('titlePage','index')
@section('head')

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Tienda</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->

@vite(['resources/css/styles.css'])
@vite(['resources/css/nav.css'])
@vite(['resources/css/index.css'])
<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/index-behaviour.js'])
@vite(['resources/js/index.js'])

<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>

@stop
@section('content')

<nav class="navResponsive">
    <div class="logo">
        Nike
    </div>
    <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
    </label>
    <input type="checkbox" id="btn">
    <ul>
        <li><a href="#">Home</a></li>
        <li>
            <label for="btn-1" class="show">Category +</label>
            <a href="#">Category</a>
            <input type="checkbox" id="btn-1">
            <ul>
                <li><a class="click" href="#product" id="showRunner" style="cursor: pointer">Runner</a></li>
                <li><a class="click" href="#product" id="showCasuals" style="cursor: pointer">Casuals</a></li>
            </ul>
        </li>
        <li>
            <label for="btn-2" class="show">Range Price +</label>
            <a href="#">Range Price</a>
            <input type="checkbox" id="btn-2">
            <ul>
                <li><a class="click" href="#product" id="rango1" style="cursor: pointer">50-100</a></li>
                <li><a class="click" href="#product" id="rango2" style="cursor: pointer">100-500</a></li>

            </ul>
        </li>

        <li>
            @auth
            @if(Auth::user()->country === 'undefined')
            <script>
                Swal.fire({
                    title: 'please update',
                    text: `your personal information on the profile page`,
                    icon: 'info',
                    confirmButtonText: 'Nice'
                })
            </script>
            @endif
            <form action="{{route('user.logout')}}" method="POST">
                @csrf
                <a href="#" class="log" onclick="this.closest('form').submit()">Salir</a>
            </form>
        </li>
        <li>

            <div class="profiles active_profile" id="div-profiles">
                <div class="profiles__group">
                    <img class="img-profile" src="{{ asset('storage/'. Auth::user()->image_profile) }}" alt="#" />
                    <p class="p-profile">
                        <a href="{{route('profile')}}" class="a-profile">profile</a>
                        <a href="{{route('ordersUser')}}" class="a-profile">Orders</a>
                        <a href="{{route('wishlist')}}" class="a-profile">Wishlist</a>
                        @if(Auth::user()->rol === 'admin')
                        <a href="{{route('adminProducts')}}" class="a-profile">Admin</a>
                        @endif
                    </p>
                </div>
            </div>
        </li>
        <li>
            @endauth
            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
            @guest
            <a href="{{route('user.login')}}" class="log " id="btn-login">Log in</a>
            @endguest
        </li>
    </ul>
</nav>

{{-- header--}}
<section class="home" id="home" style="margin-top: 10rem;">
    <div class="slide-container active">
        <div class="slide">
            <div class="content">
                <span>Nike Sport Shoes</span>
                <h3>Nike Metcon Shoes</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit
                    Sunt nam adipisci ipsa officiis Amet pariatur eaque soluta
                    sit iure neque voluptate.
                </p>

            </div>
            <div class="image">
                <img src="/slide/1.png" class="shoe">
            </div>
        </div>
    </div>
    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>Nike Sport Shoes</span>
                <h3>Nike Metcon Shoes</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit
                    Sunt nam adipisci ipsa officiis Amet pariatur eaque soluta
                    sit iure neque voluptate.
                </p>

            </div>
            <div class="image">
                <img src="/slide/2.png" class="shoe">
            </div>
        </div>
    </div>
    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>Nike Sport Shoes</span>
                <h3>Nike Metcon Shoes</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit
                    Sunt nam adipisci ipsa officiis Amet pariatur eaque soluta
                    sit iure neque voluptate.
                </p>

            </div>
            <div class="image">
                <img src="/slide/3.png" class="shoe">
            </div>
        </div>
    </div>
    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>Nike Sport Shoes</span>
                <h3>Nike Metcon Shoes</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit
                    Sunt nam adipisci ipsa officiis Amet pariatur eaque soluta
                    sit iure neque voluptate.
                </p>

            </div>
            <div class="image">
                <img src="/slide/4.png" class="shoe">
            </div>
        </div>
    </div>

    <div id="prev" class="fa fa-angle-left" onclick="prev();"></div>
    <div id="next" class="fa fa-angle-right" onclick="next();"></div>
</section>
<!-- tienda -->
<section class="product">
    @error('Message')
    <script>
        Swal.fire(
            'Hello!!!',
            'Welcome!',
            'success'
        )
    </script>
    @enderror

    <h1 class="heading">latest <span>Products</span></h1>
    <div class="box-container" id="product">


    </div>
</section>
<!-- pagination -->
<section>
    <div class="pagination pagenumbers" id="pagination">
        <ul>
            <!--pages or li are comes from javascript -->
        </ul>
    </div>
</section>
<!--end product-->
<!-- Modal Section -->
<section id="modal-section">
    <div class="bg-modal">
        <section class="featured" id="fearured">
            <div class="row">
                <div class="close">+</div>
                <div class="image-container">
                    <div class="small-image">
                        <img src="img/product1/1.jpg" alt="" class="featured-image-1">
                        <img src="img/product1/2.jpg" alt="" class="featured-image-1">
                        <img src="img/product1/3.jpg" alt="" class="featured-image-1">
                        <img src="img/product1/4.jpg" alt="" class="featured-image-1">
                    </div>
                    <div class="big-image">
                        <img src="img/product1/1.jpg" alt="" class="big-image-1">
                    </div>
                </div>
                <div class="content">
                    <h3>new nike airmac shoes</h3>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit officiis omnis quo laboriosam velit culpa ex illo, error enim nostrum?
                    </p>
                    <div class="price">$90 <span>$120</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>


        </section>
        <!--end featured-->
    </div>
</section>
@stop

@push('customjs')
<script type="text/javascript">
    function modal(id) {
        document.querySelector('#modal' + id).style.display = "flex";
    }

    function closeModal(id) {
        document.querySelector('#modal' + id).style.display = "none";
    }

    function addCarrito(id) {
        let timerInterval
        Swal.fire({
            title: 'Enviendo al carrito con exito!',
            html: 'Espere por favor <b></b> millisegundos.',
            timer: 2000,
            timerProgressBar: true,
            icon: 'success',
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = `http://127.0.0.1:8000/carrito/${id}`;
            }
        })
        



    }

    function addClass(id) {
        const element = document.getElementById("heart" + id);
        element.classList.toggle("click");
        window.location.href = `http://127.0.0.1:8000/wishlist/add/${id}`;
    }
    let slides = document.querySelectorAll('.slide-container');
    let index = 0;

    function next() {
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }

    function prev() {
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');
    }
</script>
@endpush