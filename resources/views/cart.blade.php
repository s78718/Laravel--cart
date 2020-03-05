<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts._head')
    @include('layouts._style')
    <body>
        @include('layouts._header')
        <section>
            <div class="container cart">
                <h3>購物車 </h3>
                <!--判斷有沒有購物車-->
                @if(session()->has('cart'))
                    <div id="css-table" class="css-table">
                        <div  class="thead">
                            <div class="tr">
                                <div class="th">編號</div>
                                <div class="th">品名</div>
                                <div class="th">顏色</div>
                                <div class="th">尺寸</div>
                                <div class="th">原價</div>
                                <div class="th">數量</div>
                                <div class="th">活動價</div>
                                <div class="th">增減</div>
                                <div class="th">刪除</div>
                            </div>
                        </div>
                        <div class="tbody">
                            @foreach ($Carts as $c)
                                <div class="tr">
                                    <div class="td">{{ $c['item'][0]['lotid'] }}</div>
                                    <div class="td">{{ $c['item'][0]['product'] }}</div>
                                    <div class="td">{{ $c['item'][0]['color'] }}</div>
                                    <div class="td">{{ $c['item'][0]['size'] }}</div>
                                    <div class="td">{{$c['item'][0]['price']}}</div>
                                    <div class="td">{{ $c['qty']}}</div>
                                    <div class="td">{{$c['item'][0]['saleprice']}}</div>
                                    <div class="td">
                                        <a class="py-1 px-1"
                                            href="/Increase-one-item/{{ $c['item'][0]['lotid'] }}"><i class="fas fa-plus-square"></i>
                                        </a>
                                        <a class="py-1 px-1"
                                            href="/Decrease-one-item/{{ $c['item'][0]['lotid'] }}"><i class="fas fa-minus-square"></i>
                                        </a>
                                    </div>
                                    <div class="td">
                                        <a class="py-1 px-1"
                                            href="/Remove-item/{{ $c['item'][0]['lotid'] }}"><i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-center">Cart is Empty</p>
                @endif
                <div class="continer text-right">
                    <p class="mt-4">Total Qty: {{ $totalQty}}</p>
                    <p class="mt-4">Total: NT$ {{ $totalPrice}}</p>
                    <hr>
                    <a href="/Clear-cart" class="mr-3 btn clear-cart">清空</a>
                    <a href="/Order/new" class="btn buy">購買</a>
                </div>
            </div>
        </section>
        @include('layouts._footer')
    </body>
</html>



