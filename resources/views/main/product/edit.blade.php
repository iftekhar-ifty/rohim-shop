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

                <div class="main" style="margin-top: 50px">
                    <form action="{{url('product-update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" value="{{$product->name}}">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" name="price" name="title" class="form-control" value="{{$product->price}}">
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Offer Price</label>
    <input type="number" name="off_price" class="form-control" value="{{$product->off_price}}">
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Expiry Date</label>
    <input type="date" id="birthday" name="expiry" class="form-control" value="{{$product->expiry}}">
  </div>


  <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
</form>
                </div>
              </div>
          </div>
      </div>
@endsection
