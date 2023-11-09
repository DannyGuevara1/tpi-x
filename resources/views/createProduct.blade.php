@extends('template')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Products</div>
  <div class="card-body">
       
      <form action="{{route('product.register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label>Name Product</label><br/>
        <input type="text" name="name_product" class="form-control"><br/>
        
        <label>Category</label><br/>
        <input type="text" name="category" class="form-control"><br/>
        
        <label>Supplier</label><br/>
        <input type="text" name="supplier"  class="form-control"><br/>
        
        <label>Stock</label><br/>
        <input type="text" name="stock"  class="form-control"><br/>
        
        <label>Cost</label><br/>
        <input type="text" name="cost" class="form-control"><br/>
        
        <label>Price</label><br/>
        <input type="text" name="price"  class="form-control"><br/>

        <label>Image Product</label><br/>
        <input type="file" name="image_product"  class="form-control"><br/>

        <label>Description</label><br/>
        <input type="text" name="description"  class="form-control"><br/>

          <button type="submit" class="btn btn-success">SAVE</button>
    </form>
    
  </div>
</div>
  
@stop