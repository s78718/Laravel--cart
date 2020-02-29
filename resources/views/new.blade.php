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
                border-top-left-radius: 50%;
                border-top-right-radius: 50%;
                border-bottom-right-radius: 20%;
                border-bottom-left-radius: 20%;
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
            <a href="{{asset('/Sale')}}">特價</a>
        </div>

    </header>

    <body>
        <div id="article" class="container">
            <div class="row">
                <!--選單區-->
                <div id="menu" class="col-md-2 col-3">
                    <ul class="aside">
                        <li><a href="{{asset('/New')}}">新品</a>
                            <ul class="aside-sub">
                                <li><a href="#">男生</a></li>
                                <li><a href="#">女生</a></li>
                                <li><a href="#">兒童</a></li>
                                <li><a href="#">家居</a></li>
                                <li><a href="#">配件</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--商品區-->
                <div id="main" class="col-md-10 col-9">
                    <div class="row">
                        <div id="main-img" class=" col-12">
                            <img src="https://picsum.photos/800/250?random=3">
                        </div>
                        @if(isset($news))
                            @foreach ($news as $new)
                            <div id={{ $new->id }}  class="col-md-4 col-12 mb-4">
                                <div class="card p-1 text-center">
                                    <a href="#">
                                        <img src="https://picsum.photos/200/200?random=8" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p >{{$new->product}}</p>
                                            @if(is_null($new->saleprice))
                                                <p class="nosale-price card-text">NT${{$new->price}}</p>
                                            @else
                                                <p class="card-text">
                                                    <span class="ori-price">原價{{$new->price}}</span>
                                                    <span class="sale-price text-danger">活動價NT${{$new->saleprice}}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <div id="footer" class="container">
            <p class="">&copy; miimo工作室</p>
        </div>
    </footer>
</html>
