@extends('template')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Users</div>
  <div class="card-body">
       
      <form action="{{route('user.register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label>Name</label><br/>
        <input type="text" name="name" class="form-control"><br/>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror 

        <label>Age</label><br/>
        <input type="text" name="age" class="form-control"><br/>
        @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Username</label><br/>
        <input type="text" name="username"  class="form-control"><br/>
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Country</label><br/>
        <input type="text" name="country"  class="form-control"><br/>
        @error('country')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Address</label><br/>
        <input type="text" name="address" class="form-control"><br/>
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Shipping Address</label><br/>
        <input type="text" name="shipping_address" class="form-control"><br/>
        @error('shipping_address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Gender</label><br/>
        <input type="text" name="gender"  class="form-control"><br/>
        @error('gender')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Image Profile</label><br/>
        <input type="file" name="image_profile"  class="form-control"><br/>
        @error('image_profile')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Email</label><br/>
        <input type="text" name="email"  class="form-control"><br/>
        
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Password</label><br/>
        <input type="text" name="password"  class="form-control"><br/>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

          <button type="submit" class="btn btn-success">SAVE</button>
    </form>

  </div>
</div>
  
@stop