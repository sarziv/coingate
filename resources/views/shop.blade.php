
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
                                    {{$product->price_usd * (session()->get('currency')->currencyRate)}}
                                    {{session()->get('currency')->currencyType}}
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
                    <div class="card-body">
                        @if(Session::has('cart'))
                            <ul class="list-unstyled">
                                @foreach(session()->get('cart')->items as $item)
                                    <li class="">

                                        <div class="text-left">{{$item['qty']}} x {{$item['item']['name']}} </div>
                                        <div class="text-right">Price: <strong>
                                                @if(Session::has('currency'))
                                                    {{ number_format( $item['price'] * (session()->get('currency')->currencyRate), 4, '.', ',')}}
                                                    {{session()->get('currency')->currencyType}}
                                                @else
                                                    {{$item['price']}} USD
                                                @endif
                                            </strong></div>
                                    </li>
                                    <hr>
                                @endforeach

                            </ul>

                            <div class="text-left">
                                TotalQty: <strong>{{session()->get('cart')->totalQty}}</strong>
                                <br>
                                TotalPrice: <strong>
                                    @if(Session::has('currency'))
                                        {{ number_format(session()->get('cart')->totalPrice * (session()->get('currency')->currencyRate), 4, '.', ',')}}
                                        {{session()->get('currency')->currencyType}}
                                    @else
                                        {{session()->get('cart')->totalPrice}} USD

                                    @endif
                                </strong>
                            </div>

                            <hr>
                        @else
                            Your cart is empty :|
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>