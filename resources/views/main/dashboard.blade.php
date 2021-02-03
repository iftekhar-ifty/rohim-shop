@extends('layouts.website')

@section('content')
    <div class="container-fluid">
          <div class="row">
               @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
              <div class="col-md-3" >
                    <div class="list-group" style="margin-top: 50px">
  <a href="{{url('admin')}}" class="list-group-item list-group-item-action active" aria-current="true">
    Products
  </a>

</div>
              </div>
              <div class="col-md-9">
                <div class="main_items" style="margin-top: 50px">
                <div class="card">
                  <div class="card-header">
                    <a href="{{route('product.create')}}" class="btn btn-primary" style="float:left">Add</a>
                    <h5 class="text-center">All Product List</h5>

                  </div>
                   <!-- class="table table-sm table-hover table-border" -->
                  <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Title</th>
                              <th scope="col">Price</th>
                              <th scope="col">Expiry</th>
                              <th scope="col">Image</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($products as $key=> $product)
                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$product->name}}</td>
                              <td>{{$product->price}}</td>
                              <td>{{$product->expiry}}</td>
                              <td><img class="img-responsive" src="{{asset('storage/uploads')}}/{{$product->image}}" width="40px" height="30px" alt=""></td>
                              <td>
                                <a href="{{url('product-edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('product-delete', $product->id)}}" class="btn btn-danger">Delete</a>
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
