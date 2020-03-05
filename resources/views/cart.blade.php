
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts._head')
    @include('layouts._style')
    <body>
        @include('layouts._header')
        <section>
            <div class="container cart">
                <div class="">
                    <h3 class="m-3">購物車 </h3>
                    <!--判斷有沒有購物車-->
                    @if(session()->has('cart'))
                        <table class="border-collaspe ">
                            <thead>
                                <th class="px-1 py-2">編號</th>
                                <th class="px-1 py-2">品名</th>
                                <th class="px-1 py-2">顏色</th>
                                <th class="px-1 py-2">尺寸</th>
                                <th class="px-1 py-2">單價</th>
                                <th class="px-1 py-2">數量</th>
                                <th class="px-1 py-2">增減</th>
                                <th class="px-1 py-2">刪除</th>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($Carts as $c)
                                    <tr>
                                        <td class="border px-1 py-2">{{ $c['item'][0]['lotid'] }}</td>
                                        <td class="border px-1 py-2">{{ $c['item'][0]['product'] }}</td>
                                        <td class="border px-1 py-2">{{ $c['item'][0]['color'] }}</td>
                                        <td class="border px-1 py-2">{{ $c['item'][0]['size'] }}</td>
                                        <td class="border px-1 py-2">{{$c['item'][0]['price']}}</td>
                                        <!-- Remove Items / Increase +1 / Decrease By 1 -->
                                        <td class="border px-1 py-2">{{$c['qty']}}</td>
                                        <td class="border px-1 py-2">
                                            <a class="py-1 px-1"
                                                href="/Increase-one-item/{{ $c['item'][0]['lotid'] }}"><i class="fas fa-plus-square"></i></a>
                                            <a class="py-1 px-1"
                                                href="/Decrease-one-item/{{ $c['item'][0]['lotid'] }}"><i class="fas fa-minus-square"></i></a>
                                        </td>
                                        <td class="border px-1 py-2">
                                            <a class="py-1 px-1"
                                                href="/Remove-item/{{ $c['item'][0]['lotid'] }}"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            </div>
        </section>
        @include('layouts._footer')
    </body>
</html>

