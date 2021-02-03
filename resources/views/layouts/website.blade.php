<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{asset('website')}}/css/main.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/')}}">Rohim Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex justify-content-center h-100">
                        <div class="searchbar">
                            <form action="{{url('/search-product')}}" method="get">
                                @csrf
                                 <input class="search_input" type="text" name="searchData" placeholder="Search..." />
                           <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                            </form>
                           
                        </div>
                    </div>
                </div>
                <a href="{{route('admin')}}" class="text-right">Admin</a>
            </div>
        </nav>


            
            @yield('content')
            <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" /></div>
       
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <!-- <script src="{{asset('website')}}/js/main.js"></script> -->

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
        $(".clicked").on("click", function () {
            // swal("Add to cart Successfully !");
            swal({
                text: "Add to cart Successfully !",
                button: "Close",
            });
        });
    </script>

<script type="text/javascript">
    var main_site="{{ url('/') }}";
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".load-more").on('click',function(){
            var _totalCurrentResult=$(".product-box").length;
            // Ajax Reuqest
            $.ajax({
                url:'/load-more-data',
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult
                },
                beforeSend:function(){
                    $(".load-more").html('Loading...');
                },
                success:function(response){
                    var _html='';
                    var image="{{ asset('imgs') }}/";
                    $.each(response,function(index,value){
                    _html+=`
                             <div class="col-sm-4 product-box" style="margin-top: 20px;">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{asset('storage/uploads')}}/`+value.image+`" alt="a" />
                                        </div>
                                        <div class="cart_info">
                                            <div class="title">
                                                <p>`+value.name+`</p>
                                            </div>
                                            <div class="price">
                                                <p>$`+value.off_price+`<del> $`+value.price+`</del></p>
                                            </div>
                                            <div class="exper_date">
                                                <p>expiry date - `+value.expiry+`</p>
                                            </div>
                                            <div class="addToCart">
                                                <button class="custom clicked">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    `;

                    console.log(value);
                    });
                    $(".product-list").append(_html);
                    // Change Load More When No Further result
                    var _totalCurrentResult=$(".product-box").length;
                    var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                    console.log(_totalCurrentResult);
                    console.log(_totalResult);
                    if(_totalCurrentResult==_totalResult){
                        $(".load-more").remove();
                    }else{
                        $(".load-more").html('Load More');
                    }
                }
            });
        });
    });
</script>
</html>
