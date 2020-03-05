<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts._head')
    @include('layouts._style')
    <body>
        @include('layouts._header')
        <section>
            <div class="container buyer">
                <h3 class="text-left">訂單資訊</h3>

                <table class="border-collaspe">
                    <thead>
                        <th class="px-1 py-2">編號</th>
                        <th class="px-1 py-2">品名</th>
                        <th class="px-1 py-2">顏色</th>
                        <th class="px-1 py-2">尺寸</th>
                        <th class="px-1 py-2">單價</th>
                        <th class="px-1 py-2">數量</th>
                        <th class="px-1 py-2">總計</th>
                    </thead>

                    <body class="text-center">
                        @foreach ($Carts as $C)
                        <tr>
                            <td class="border px-1 py-2">{{ $C['item'][0]['lotid'] }}</td>
                            <td class="border px-1 py-2">{{ $C['item'][0]['product'] }}</td>
                            <td class="border px-1 py-2">{{ $C['item'][0]['color'] }}</td>
                            <td class="border px-1 py-2">{{ $C['item'][0]['size'] }}</td>
                            <td class="border px-1 py-2">{{$C['item'][0]['price']}}</td>
                            <td class="border px-1 py-2">{{$C['qty']}}</td>
                            <td class="border px-1 py-2">NT${{$C['qty'] * $C['item'][0]['price']}}</td>
                        </tr>
                        @endforeach
                    </body>
                </table>

                <div class="container buyer mt-4">
                    <h3 class="text-left m-4">買家資訊</h3>
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

        @include('layouts._footer')
    </body>
 </html>
