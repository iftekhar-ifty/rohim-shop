@extends('layouts.website')

@section('content')
        <div class="container">
            <div class="row">
    <div class="col-md-3">
                    <div class="filter_bow" style="margin-top: 50px;">
                        <h5>Filter Results By</h5>
                        <hr />

                        <form action="{{url('/filter-price')}}" method="get" style="margin-bottom: 20px;">
                            @csrf
                            <label for="">Price</label>
                            <div class="livecount" style="margin-top: 10px; margin-bottom: 10px;">
                                <input type="number" min="0" name="min" id="min_price" class="price-range-field" value="0" />
                                <span>To</span>
                                <input type="number" min="0" name="max" id="max_price" class="price-range-field" />
                            </div>

                            <div class="addToCart text-center" style="margin-top: 10px;">
                                <button type="submit" class="custom">Search</button>
                            </div>
                        </form>

                        <hr />

                          <form action="{{url('/filter-date')}}" method="get" style="margin-bottom: 20px;">
                            @csrf
                            <label for="birthday">Expiry Date:</label>
                            <input type="date" id="birthday" class="form-control" name="date" />

                            <div class="addToCart text-center" style="margin-top: 10px;">
                                <button class="custom">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
    <div class="col-md-9">
                    <div class="main_items" style="margin-top: 30px;">
                        <div class="item">
                            <div class="row product-list">
                         @if(count($products) > 0)
                              @foreach($products as $product)
                               <div class="col-sm-4 product-box" style="margin-top: 20px;">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{asset('storage/uploads')}}/{{$product->image}}" alt="a" />
                                        </div>
                                        <div class="cart_info">
                                            <div class="title">
                                                <p>{{$product->name}}</p>
                                            </div>
                                            <div class="price">
                                                <p>${{$product->off_price}}<del> ${{$product->price}}</del></p>
                                            </div>
                                            <div class="exper_date">
                                                <p>expiry date - {{$product->expiry}}</p>
                                            </div>
                                            <div class="addToCart">
                                                <button class="custom clicked">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                              @endif

                            </div>
                                @if(count($products)>0)
    <p class="text-center mt-4 mb-5"><button class="load-more btn btn-dark" data-totalResult="{{ App\Models\Product::count() }}">Load More</button></p>
    @endif
                        </div>
                    </div>
                </div>
                </div>
                </div>
@endsection
