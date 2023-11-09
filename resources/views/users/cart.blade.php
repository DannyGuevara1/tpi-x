@extends('template')
@section('titlePage','cart')
@section('head')
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/css/cart.css'])
@vite(['resources/css/styles.css'])
@vite(['resources/js/cart.js'])
<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>
<style>
    
</style>
@stop

@section('content')
<div class="container">
    <div class="CartContainer">
        <div class="Header">
            <h3 class="Heading">Shopping Cart</h3>
            <a href="{{route('carrito.destroy')}}">
                <h5 class="Action">Remove all</h5>
            </a>
        </div>
        <div id="cart_items">


        </div>


        <hr>
        <div id="checkout">

        </div>
    </div>
</div>
<section id="modal-section">
    <div class="bg-modal" id="modal">
        <section class="featured" id="fearured">
            <div class="row">
                <div class="close" id="close" onclick="closeModal();">+</div>
                <div class="wrapper">
    <div class="container">
        <form action="">
            <h1>
                <i class="fas fa-shipping-fast"></i>
                Shipping Details
            </h1>
            <div class="name">
                <div>
                    <label for="f-name">First</label>
                    <input type="text" name="f-name">
                </div>
                <div>
                    <label for="l-name">Last</label>
                    <input type="text" name="l-name">
                </div>
            </div>
            <div class="street">
                <label for="name">Street</label>
                <input type="text" name="address">
            </div>
            <div class="address-info">
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city">
                </div>
                <div>
                    <label for="state">State</label>
                    <input type="text" name="state">
                </div>
                <div>
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
                </div>
            </div>
            <h1>
                <i class="far fa-credit-card"></i> Payment Information
            </h1>
            <div class="cc-num">
                <label for="card-num">Credit Card No.</label>
                <input type="text" name="card-num">
            </div>
            <div class="cc-info">
                <div>
                    <label for="card-num">Exp</label>
                    <input type="text" name="expire">
                </div>
                <div>
                    <label for="card-num">CCV</label>
                    <input type="text" name="security">
                </div>
            </div>
            <div class="btns">
                <button>Purchase</button>
                <button>Back to cart</button>
            </div>
        </form>
    </div>
</div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>


        </section>
        <!--end featured-->
    </div>
</section>
@stop
@push('customjs')
<script>
    async function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then( async (result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            await axios.delete('http://127.0.0.1:8000/api/carrito/delete/' + id);
            //recargar pagina
            window.location.reload()
            }
            
        })
    }
    function modal(){
    document.querySelector('#modal').style.display = "flex";
    }
    function closeModal() {
        document.querySelector('#modal').style.display = "none";
    }

</script>
@endpush