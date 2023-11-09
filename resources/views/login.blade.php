@extends('template')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Login Users</div>
  <div class="card-body">
      <form action="{{route('user.validate')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <label>Email</label><br/>
        <input type="text" name="email" class="form-control {{-- @error('email') is-invalid @else is-valid @enderror --}}"><br/>
        <label>Password</label><br/>
        <input type="password" name="password"  class="form-control {{-- @error('password') is-invalid @else is-valid @enderror --}}" ><br/>
        <button type="submit" class="btn btn-success">SAVE</button>
        
        @error('Invalid_Credentials')
          <br><br><div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </form>
  </div>
</div>
  
@stop