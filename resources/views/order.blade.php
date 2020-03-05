<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts._head')
        @include('layouts._style')
    </head>
    <body>
        <header>
            @include('layouts._header')
        </header>
        <section>
            <div class="container buyer">
                <h3 class="text-left">訂單資訊</h3>
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
                            <div class="th">總計</div>
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
                                @if(!$c['item'][0]['saleprice'])
                                    <div class="td">NT${{$c['qty'] * $c['item'][0]['price']}}</div>
                                @else
                                    <div class="td">NT${{$c['qty'] * $c['item'][0]['saleprice']}}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container buyer mt-4 text-center">
                    <h3 class="m-4">買家資訊</h3>
                    <form method="POST" action="/Orders">
                        @csrf
                        <div class="m-4">
                            <label class="block pl-2" for="name">買家:</label>
                            <input
                                class="shadow border rounded w-full py-2 px-3"
                        name="name" id="name" type="text" value="{{session()->get('buyerName')}}" placeholder="name">
                        </div>
                        <div class="m-4">
                            <label class="block pl-2" for="email">信箱:</label>
                            <input
                                class="shadow border rounded  w-full py-2 px-3"
                                name="email" id="email" type="email" value="{{session()->get('buyerEmail')}}" placeholder="email">
                        </div>
                        <div class="m-4">
                            <label class="block pl-2" for="email">電話:</label>
                            <input
                                class="shadow border rounded w-full  py-2 px-3"
                                name="phone" id="phone" type="text" value="{{session()->get('buyerPhone')}}" placeholder="phone">
                        </div>
                        <div class="m-4">
                            <label class="block pl-2 w-full" for="address">地址:</label>
                            <input
                                class="shadow border rounded  w-full py-2 px-3"
                                name="address" id="address" type="text" value="{{session()->get('buyerAddress')}}" placeholder="address">
                        </div>
                        <div class="m-4">
                            <label class="block pl-2" for="payment">付款方式:</label>
                            <select id="payment" name="payment" class="shadow border rounded">
                                <option></option>
                                <option>信用卡</option>
                                <option>超商條碼</option>
                                <option>WebATM</option>
                            </select>
                        </div>
                        <div>
                            <button id="order-cart" class="btn" type="submit">送出訂單</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <footer>
            @include('layouts._footer')
        </footer>
    </body>
 </html>
