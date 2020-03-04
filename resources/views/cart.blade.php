
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>mik</title>

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css");
            *{
                padding: 0;
                margin: 0;
                font-family: 'Noto Sans TC' ;
                list-style:none;
            }
            .nav-categroy a{
                text-decoration: none;
                color: #444;
                font-weight: 500;
                font-size: 20px;
                padding: 20px 20px 0 ;
                transition: 0.8s;
                transform: translateY(0px);
            }
            .nav-categroy{
                display:block;
                justify-content:center;
                margin-bottom: 20px;
                padding: 0 80px 0;
            }
            .nav a
            {
                text-decoration: none;
                color: #444;
                font-weight: 300;
                font-size: 15px;
                padding: 20px 20px 0 ;
                transition: 0.3s;
                transform: translateY(0px);
            }
            .nav a:hover,
            .nav-categroy a:hover{
                border-bottom: 1px solid #ddd;
                transform: translateY(-5px);
            }
            .nav-top,
            .nav-categroy{
                display: flex;
                padding:15px 0 15px;
            }
            .nav-search input{
                width:100px;
            }
            .nav-search input,
            .nav-search button{
                border: none;
                background-color: #fff;
                margin:35px 0 0 30px;
                font-size: 15px;
                color:#444;
            }
            .nav-search input:focus,
            .nav-search button:focus{
                outline: none;
            }
            .carousel{
                margin-top:20px;
                margin-bottom:20px;
            }

            #carouselExampleFade{
                padding: 10px;
               border: 5px double #ccc;
            }
            #menu
            {
                line-height: 2em;
            }
            #menu a{
                text-decoration: none;
                color: #444;
                border-bottom: 1px solid #444;
            }

            #menu li{
                transition: 0.6s;
            }

            #menu li:hover{
                transform: scale(1.05);
            }
            .aside{
                font-size: 20px;
            }
            .aside-sub{
                font-size: 15px;
            }
            .aside-sub li::before{
                content: "-";
            }
            #main #main-img img{
                margin-bottom: 50px;
                padding: 10px;
                width: 100%;
                border-top-left-radius: 90%;
                border-top-right-radius: 90%;
                border-bottom-right-radius: 10%;
                border-bottom-left-radius: 10%;
                border: 5px double #ccc;
            }
            #main .card{
                background-color: #fff;
                transition: 0.8s;
                color:#444;
                border: 5px double #ccc;
                height: 100%;

            }
            #main .card:hover{
                transform: scale(1.05);
            }
            #main .card a{
                color: #444;
                text-decoration: none;
            }
            #main .card .ori-price{
                font-size: 12px;
                text-decoration:line-through;
            }
            #main .card .sale-price {
                padding-left: 15px;
            }
            #footer
            {
                background-color: #ccc;
                color: #444;
                text-align: center;
                padding: 10px;
                border: 6px double #eee;
            }
            .cart{
                border: 5px double #ccc;
                padding: 40px;
                margin-bottom: 10px;
            }
            .clear-cart,.buy{
                background-color: #ccc;
            }
            table {
                margin: auto;
                width: 100% !important;
            }
        </style>
    </head>

    <header>
        <div class="nav container">
            <div class="logo">
                <a href="{{asset('/')}}">
                    <img src="/mik.png">
                </a>
            </div>
            <div class="nav-top">
                @if(!session()->has('buyerName'))
                    <a href="{{asset('/Login_Register')}}">登入/註冊</a>
                @else
                    <a href="{{asset('/Logout')}}">{{session()->get('buyerName')}}-登出</a>
                @endif
                @if(!session()->has('cart'))
                    <a href="{{asset('/Cart')}}">購物車</span></a>
                @else
                    <a href="{{asset('/Cart')}}">購物車<span class="badge badge-secondary">{{session()->get('cart')->totalQty}}</span></a>
                @endif
                <a href="{{asset('/QA')}}">Q&A</a>
                <a href="{{asset('/Member')}}">會員中心</a>
            </div>
            <form class="nav-search">
                <input type="search" name="" placeholder="輸入關鍵字">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>


        <div class="nav-categroy container">
            <a href="{{asset('/Women')}}">女裝</a>
            <a href="{{asset('/Men')}}">男裝</a>
            <a href="{{asset('/Kids')}}">兒童</a>
            <a href="{{asset('/New')}}">新品</a>
            <a href="{{asset('/Sale')}}">活動</a>
        </div>

    </header>

    <body>
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
    </body>
    <footer>
        <div id="footer" class="container">
            <p class="">&copy; mik</p>
        </div>
    </footer>
</html>

