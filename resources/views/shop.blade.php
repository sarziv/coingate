<div class="container">
    <div class="row">
        <div class="col-sm-7 col-md-9">
            <div class="row">
                @foreach($products as $product)
                    <div class="card" style="width: 18rem; margin: 10px 10px 10px 10px">
                        <img class="card-img-top" src="{{ URL::asset('/image/'. $product->id .'.jpg') }}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">
                                @if(Session::has('currency'))
                                    {{$product->price_usd * $currencyRate}}
                                    {{$currencyType}}
                                @else
                                    {{$product->price_usd}} USD
                                @endif
                            </p>
                            <a href="{{route('product.addToCart',['id'=>$product->id])}}"
                               class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-5 col-md-3" style="margin-top: 10px">
            <div>
                <div class="card text-center">
                    <div class="card-header">
                        Cart
                    </div>
                        @if(Session::has('cart'))
                            <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach($items as $item)
                                    <li class="">

                                        <div class="text-left">{{$item['qty']}} x {{$item['item']['name']}} </div>
                                        <div class="text-right">Price: <strong>
                                                @if(Session::has('currency'))
                                                    {{ number_format( $item['price'] * $currencyRate, 4)}}
                                                    {{$currencyType}}
                                                @else
                                                    {{$item['price']}} USD
                                                @endif
                                            </strong>
                                        </div>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>

                            <div class="text-left">
                                TotalQty: <strong>{{$totalQty}}</strong>
                                <br>
                                TotalPrice: <strong>
                                    @if(Session::has('currency'))
                                        {{ number_format(($totalPrice * $currencyRate), 4)}}
                                        {{$currencyType}}
                                    @else
                                        {{$totalPrice}} USD
                                    @endif
                                </strong>
                            </div>
                            <hr>
                    </div>
                    <div class="card-footer text-muted">
                        <a class="btn btn-dark" href="{{route('cart.remove')}}">Empty cart</a>
                        <a class="btn btn-primary" href="{{route('cart.checkout')}}">Checkout</a>
                    </div>
                    @else
                        <div class="card-body">
                            <div>Your cart is empty :|</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>