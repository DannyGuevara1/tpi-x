@extends('template')
@section('titlePage','cart')
@section('head')
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bulma.min.css">
<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bulma.min.js" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@vite(['resources/css/cart.css'])
@vite(['resources/js/wishList.js'])
<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>
<style>
  .btn-wishlist {

    background-color: #222;
    border-radius: 4px;
    border-style: none;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: "Farfetch Basis", "Helvetica Neue", Arial, sans-serif;
    font-size: 16px;
    font-weight: 700;
    line-height: 1.5;
    margin: 0;
    max-width: 150px;
    min-height: 44px;
    min-width: 10px;
    outline: none;
    overflow: hidden;
    padding: 9px 20px 8px;
    position: relative;
    text-align: center;
    text-transform: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: 100%;

  }

  .btn-wishlist:hover,
  .btn-wishlist:focus {
    opacity: .75;
  }
  td{
    max-height: 100px;
  }
  td span{
    line-height: 100px;
    font-size: 15px;
  }
  
</style>
@stop

@section('content')
<div class="container">
  <div class="CartContainer">
    <div class="Header">
      <h3 class="Heading">My Wishlist</h3>
      <a href="#">
        <h5 class="Action">Remove all</h5>
      </a>
    </div>
    <div id="cart_items">
      <table id="wishlist" class="table is-striped" style="width: 100%;">
        <thead>
          <tr>
            <th>THUMBNAIL</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>STOCK</th>
            <th>ADD TO CART</th>
            <th>Eliminate</th>
          </tr>
        </thead>
        <tbody id="wishListTable">
        </tbody>

      </table>

    </div>




  </div>
</div>
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
    }).then(async (result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        await axios.delete('http://127.0.0.1:8000/api/wishlistDelete/' + id);
        //recargar pagina
        
      }

    })
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
</script>
@endpush