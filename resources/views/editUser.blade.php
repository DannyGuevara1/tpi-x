@extends('template')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Updated Users</div>
  <div class="card-body">
      <form action="{{route('user.put', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name</label><br/>
        <input type="text" name="name" value="{{$user->name}}" class="form-control"><br/>
        
        <label>Age</label><br/>
        <input type="text" name="age" value="{{$user->age}}" class="form-control"><br/>
        
        <label>Username</label><br/>
        <input type="text" name="username"  value="{{$user->username}}" class="form-control"><br/>
        
        <label>Country</label><br/>
        <input type="text" name="country"  value="{{$user->country}}" class="form-control"><br/>
        
        <label>Address</label><br/>
        <input type="text" name="address" value="{{$user->address}}" class="form-control"><br/>
        
        <label>Gender</label><br/>
        <input type="text" name="gender"  value="{{$user->gender}}" class="form-control"><br/>

        
        <label>Email</label><br/>
        <input type="text" name="email"  value="{{$user->email}}" class="form-control"><br/>
        
        <label>Password</label><br/>
        <input type="text" name="password"  value="{{$user->password}}" class="form-control"><br/>
        
        
        <button type="submit" class="btn btn-success">SAVE</button>
      </form>
      
      <form action="{{route('user.img', $user->id)}}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Image Profile</label><br/>
        <input id="file" type="file" name="image_profile"  value="{{$user->image_profile}}" class="form-control"><br/>  
      </form>
      <script>
          document.getElementById('file').addEventListener("change",function(){
            document.getElementById('form').submit()
          });
      </script>
  </div>
</div>
  
@stop