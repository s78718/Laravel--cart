
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>mik</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
                @if(!session()->has('name'))
                    <a href="{{asset('/Login_Register')}}">登入/註冊</a>
                @else
                    <a href="{{asset('/Logout')}}">{{ session()->get('name') }}-登出</a>
                @endif
                <a data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapseExample">購物車</a>
                <a href="{{asset('/QA')}}">Q&A</a>
                <a href="{{asset('/Member')}}">會員中心</a>
            </div>
            <form class="nav-search">
                <input type="search" name="" placeholder="輸入關鍵字">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class=" container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="collapse" id="collapse">
                    <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>
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
        <div class="container mx-auto py-20 px-10 bg-gray-100 max-w-4xl">
            <div class="flex flex-col flex-wrap -mx-2 ">
                <h1 class="text-3xl font-medium">購物車 </h1>
                @if(session()->has('cart'))
                <table class="border-collaspe border-collapse table-auto ">
                    <thead>
                        <th class="px-4 py-2">品名</th></th>
                        <th class="px-4 py-2">單價</th>
                        <th class="px-4 py-2">數量</th>
                        <th class="px-4 py-2">增減</th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($books as $book)
                        <tr>
                            <td class="border px-4 py-2">{{$book['item']['title']}}</td>
                            <td class="border px-4 py-2">{{$book['item']['price']}}</td>
                            <!-- Remove Items / Increase +1 / Decrease By 1 -->
                            <td class="border px-4 py-2">{{$book['qty']}}</td>
                            <td class="border px-4 py-2">
                                <a class="py-1 px-2 bg-teal-400 text-white"
                                    href="/increase-one-item/{{$book['item']['id']}}">+</a>|
                                    <a class="py-1 px-2 bg-teal-400 text-white"
                                    href="/increase-two-item/{{$book['item']['id']}}">++</a>|
                                <a class="py-1 px-2 bg-red-300 text-white"
                                    href="/decrease-one-item/{{$book['item']['id']}}">-</a>|
                                <a class="py-1 px-2 bg-red-700 text-white uppercase"
                                    href="/remove-item/{{$book['item']['id']}}">Remove</a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Cart is Empty</p>
                @endif
                <p class="mt-4 text-xl font-medium text-right">Total Qty: {{ $totalQty}}</p>
                <p class="mt-4 text-xl font-medium text-right">Total: NT${{ $totalPrice}}</p>
                <div class="flex justify-end mt-4">
                    <a href="/clear-cart" class="mr-4 px-6 py-3 border border bg-white text-orange-600 border-orange-600">Clear
                        Cart</a>
                    <a href="/order/new" class="text-white px-6 py-3 bg-orange-600">Buy Now</a>
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

