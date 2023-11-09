@extends('template')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>CRUD - PRODUCTS</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{route('product.form')}}" class="btn btn-success btn-sm">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name Product</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)

                                    <tr>
                                        <td>{{ $item["id"] }}</td>
                                        <td>{{ $item["name_product"] }}</td>
                                        <td>{{ $item["stock"] }}</td>
                                        <td>{{ $item["category"] }}</td>
  
                                        <td>
                                            <a href=" {{route('product.one', $item['id'])}} "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href=" {{route('product.edit', $item['id'])}}  " title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action=" {{route('product.delete', $item['id'])}} " style="display:inline">
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


