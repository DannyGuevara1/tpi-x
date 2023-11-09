@extends('template')
@section('titlePage','manageProduct')
@section('head')
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Users</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bulma.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/css/styles.css'])
@vite(['resources/css/adminProduct.css'])

<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bulma.min.js" defer></script>
<script src="https://kit.fontawesome.com/5c73f70816.js" crossorigin="anonymous" defer></script>


@vite(['resources/js/adminProduct.js'])
@stop
@section('content')
<header>
    <div id="menu-bar" class="fa fa-bars"></div>
    <a href="#" class="logo">Logo</a>
    <nav class="navbar">
        <a href="{{route('index')}}">Home</a>
        <a href="#fearured" class="active">Manage products</a>
        <a href="{{route('adminUsers')}}">Manage users</a>

    </nav>
    <div class="icons">

    </div>
</header>
<section class="featured" id="fearured">
    <form action="{{route('product.register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="image-container">
                <div class="big-image image-center">
                    <label class="label boton-avatar">
                        <input id="img-product" name="image_product" type="file" required />
                        <span><i class="far fa-image"></i></span>
                    </label>
                </div>
            </div>
            <div class="content">
                <div class="perfil-usuario-form" id="perfil-usuario-form">
                    <ul class="lista-datos">
                        <div class="product-code">
                            <label for="product-code">Product code</label>
                            <input id="product-code" placeholder="Code" type="text" name="code"></input>
                        </div>
                        <div class="product-name">
                            <label for="product-name">Product name</label>
                            <input id="product-name" placeholder="Name" type="text" name="name_product"></input>
                        </div>
                        <div class="product-categories">
                            <label for="product-categories-runner">categories</label>
                            <div class="radio-container">
                                <input id="product-categories-runner" {{old('category') == "runner" ? 'checked' : ''}} name="category" type="radio" value="runner"></input>
                                <label for="product-categories-runner">Runner</label>
                                <input id="product-categories-casual" {{old('category') == "casual" ? 'checked' : ''}} name="category" type="radio" value="casual"></input>
                                <label for="product-categories-casual">casual</label>
                            </div>
                        </div>
                        <div class="product-supplier">
                            <label for="product-supplier">Supplier</label>
                            <input id="product-supplier" placeholder="supplier" type="text" name="supplier"></input>
                        </div>
                        <div class="product-stock">
                            <label for="product-stock">Stock</label>
                            <input id="product-stock" placeholder="Stock" type="number" name="stock"></input>
                        </div>

                    </ul>
                    <ul class="lista-datos">
                        <div class="product-cost">
                            <label for="product-cost">Cost</label>
                            <input id="product-cost" placeholder="cost" type="number" name="cost"></input>
                        </div>
                        <div class="product-saleprice">
                            <label for="product-saleprice">Sale price</label>
                            <input id="product-saleprice" placeholder="sale price" type="number" name="price"></input>
                        </div>
                        <div class="person-user">
                            <label for="person-user">Size</label>
                            <input id="person-user" placeholder="Size" type="text" name="size"></input>
                        </div>

                        <div class="person-user">
                            <label for="person-user">Description</label>
                            <input id="person-user" placeholder="description" type="textarea" name="description"></input>
                        </div>

                        <div class="update">
                            <button class="button-setting" role="button" id="btnsubmit" type="submit">Submit</button>
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
    <table id="product" class="table is-striped" style="width:100%">
        <thead>
            <tr>
                {{-- <th>Product Code</th>
                        <th>Product Code</th>
                        --}}
                <th>Name</th>
                <th>Categories</th>
                <th>Supplier</th>
                <th>Stock</th>
                <th>Cost</th>
                <th>Sale Price</th>
                <th>Description</th>
                <th>View</th>
                <th>Eliminate</th>
            </tr>
        </thead>
        <tbody id="productTable">


        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Categories</th>
                <th>Supplier</th>
                <th>Stock</th>
                <th>Cost</th>
                <th>Sale Price</th>
                <th>Description</th>
                <th>View</th>
                <th>Eliminate</th>
            </tr>
        </tfoot>
    </table>
</section>

<!-- end table -->
@stop
@push('customjs')
<script>
    async function eliminarProduct(id) {
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
                await axios.delete('http://127.0.0.1:8000/api/products/delete/' + id);
                //recargar pagina
                // window.location.reload()
            }

        })
    }
</script>
@endpush