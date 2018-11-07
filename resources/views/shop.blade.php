<div class="container">
    <div class="row">
        <div class="col-sm-7 col-md-9">
            <div class="row">
                <div class="card" style="width: 18rem; margin: 10px 10px 10px 10px">
                    <img class="card-img-top" src="{{ URL::asset("/image/9.jpg") }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Shirt 1</h5>
                        <p class="card-text">Price: 9.99</p>
                        <a href="{{route('product.addToCart',['id'=>1,'price'=>9.99,'item'=>'Shirt 1'])}}"
                           class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin: 10px 10px 10px 10px">
                    <img class="card-img-top" src="{{ URL::asset("/image/10.jpg") }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Shirt 2</h5>
                        <p class="card-text">Price: 19.99</p>
                        <a href="{{route('product.addToCart',['id'=>2,'price'=>19.99,'item'=>'Shirt 2'])}}"
                           class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin: 10px 10px 10px 10px">
                    <img class="card-img-top" src="{{ URL::asset("/image/11.jpg") }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Shirt 3</h5>
                        <p class="card-text">Price: 5.99</p>
                        <a href="{{route('product.addToCart',['id'=>3,'price'=>5.99,'item'=>'Shirt 3'])}}"
                           class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-md-3" style="margin-top: 10px">
            <div>
                <div class="card text-center">
                    <div class="card-header">
                        Cart
                    </div>
                    <div class="card-body">
                        @if(Session::has('cart'))
                            <ul class="list-unstyled">
                                @foreach(session()->get('cart')->items as $item)
                                    <li class="">

                                        <div class="text-left">{{$item['qty']}} x {{$item['item']}} </div>
                                        <div class="text-right">Price: <strong>{{$item['price']}}</strong></div>
                                    </li>
                                    <hr>
                                @endforeach


                            </ul>
                            <hr>
                        <div class="text-left">
                            TotalQty: <strong>{{session()->get('cart')->totalQty}}</strong>
                            <br>
                            TotalPrice: <strong>{{session()->get('cart')->totalPrice}}</strong>
                        </div>
                        @else
                            Your cart is empty :|
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>