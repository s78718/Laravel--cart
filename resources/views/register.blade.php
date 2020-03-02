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
            #article{
                display: none;
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
            }

            #main .card:hover{
                transform: scale(1.05);
            }
            #footer
            {
                background-color: #ccc;
                color: #444;
                text-align: center;
                padding: 10px;
                border: 6px double #eee;
            }
            #login-form{
                margin-bottom: 10px;
                padding: 30px;
                border: 8px double #ccc;
            }
            #login-form button{
                background-color: #ccc;
            }
            #login-form a{
                text-decoration: none;
                color: #444;
                padding-right: 10px;
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
                <a href="{{asset('/Cart')}}">購物車<span class="badge badge-secondary">{{session()->get('cart')->totalQty}}</span></a>
                <a href="{{asset('/QA')}}">Q&A</a>
                <a href="{{asset('/Member')}}">會員中心</a>
            </div>
            <form class="nav-search">
                <input type="search" name="" placeholder="輸入關鍵字">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>

    </header>

    <body>
        <div class="container">
            <div class="row">
                <div id="login-form" class="col-md-12">
                    <form  method="POST" action="/Register/Validate">
                        @csrf
                        <h4 class="pb-2">註冊會員</h4>
                        <hr>
                        <div class="form-group">
                            <label for="InputName">Name*</label>
                            <input type="text" name="name" class="form-control" id="InputName" aria-describedby="emailHelp" required>
                                @if ($errors->first('name'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="InputPhone">Phone*</label>
                            <input type="text" name="phone" class="form-control" id="InputPhone" aria-describedby="emailHelp" required>
                                @if ($errors->first('phone'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="InputAddess">Address*</label>
                            <input type="text" name="address" class="form-control" id="InputAddress" aria-describedby="emailHelp" required>
                                @if ($errors->first('address'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                        <label for="InputEmail">Email*</label>
                        <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" required>
                                @if ($errors->first('email'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                        <label for="InputPassword1">Password*</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1" required>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword2">ComfirmPassword*</label>
                            <input type="password" name="password_confirmation" class="form-control" id="InputPassword2" required>
                                @if ($errors->first('password'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <button type="submit" class="btn">註冊</button>
                        @if ($errors->first('error'))
                        <span class="error" role="alert">
                            <strong class="text-danger bg-warning">{{$errors->first('error')}}</strong>
                        </span>
                        @endif
                    </form>
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
