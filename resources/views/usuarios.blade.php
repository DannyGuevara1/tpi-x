@extends('template')

@section('header-login')
<div class="text-end">
    <a href="#" class="d-block link-dark text-decoration-none ">
      <p>{{ session('username') }}</p>
    </a>
  </div>
@endsection

@section('content')
@if (session('rol') == 1)
    <p>NO HAY NADA</p>
@else
@error('Message')
<br><br><div class="alert alert-success">{{ $message }}</div>
@enderror
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>CRUD - USERS</h2>
                </div>
                <div class="card-body">
                    <a href="{{route('user.form')}}" class="btn btn-success btn-sm" title="Add New Student">
                        Add New
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Directon</th>
                                    <th>Username</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $item)

                                <tr>
                                    <td>{{ $item["id"] }}</td>
                                    <td>{{ $item["name"] }}</td>
                                    <td>{{ $item["address"] }}</td>
                                    <td>{{ $item["username"] }}</td>

                                    <td>
                                        <a href=" {{route('users.one', $item['id'])}} "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href=" {{route('user.edit', $item['id'])}}  " title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action=" {{route('user.delete', $item['id'])}} " style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endif
    

