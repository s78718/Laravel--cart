<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>net</title>

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

        </style>
    </head>

    <header>
        <div class="nav container">
            <div class="logo">
                <a href="#">
                    <img src="/mik.png">
                </a>
            </div>
            <div class="nav-top">
                <a href="#">登入/註冊</a>
                <a href="#">購物車</a>
                <a href="#">Q&A</a>
                <a href="#">會員中心</a>
            </div>
            <form class="nav-search">
                <input type="search" name="" placeholder="輸入關鍵字">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div id="carouselExampleFade" class="carousel slide carousel-fade container" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/900/320?random=1" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/900/320?random=2" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/900/320?random=3" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="nav-categroy container">
            <a href="#">女裝</a>
            <a href="#">男裝</a>
            <a href="#">兒童</a>
            <a href="#">新品</a>
            <a href="#">特價</a>
        </div>
    </header>

    <body>
        <div id="article" class="container">
            <div class="row">
                <div id="menu" class="col-md-2 col-3">
                    <ul class="aside">
                        <li><a href="#">上衣類</a>
                            <ul class="aside-sub">
                                <li><a href="#">短T</a></li>
                                <li><a href="#">長T</a></li>
                                <li><a href="#">襯衫</a></li>
                                <li><a href="#">商務</a></li>
                                <li><a href="#">運動</a></li>
                            </ul>
                        </li>
                        <li><a href="#">褲子類</a>
                            <ul class="aside-sub">
                                <li><a href="#">短褲</a></li>
                                <li><a href="#">長褲</a></li>
                                <li><a href="#">牛仔褲</a></li>
                                <li><a href="#">七/九分褲</a></li>
                                <li><a href="#">運動褲</a></li>
                            </ul>
                        </li>
                        <li><a href="#">外套類</a>
                            <ul class="aside-sub">
                                <li><a href="#">羽絨</a></li>
                                <li><a href="#">休閒</a></li>
                                <li><a href="#">防水</a></li>
                            </ul>
                        </li>
                        <li><a href="#">家居類</a>
                            <ul class="aside-sub">
                                <li><a href="#">睡衣</a></li>
                                <li><a href="#">內衣/內褲</a></li>
                            </ul>
                        </li>
                        <li><a href="#">配件類</a>
                            <ul class="aside-sub">
                                <li><a href="#">皮帶</a></li>
                                <li><a href="#">襪子</a></li>
                                <li><a href="#">鞋子</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="main" class="col-md-10 col-9">
                    <div class="row">
                        <div id="main-img" class=" col-12">
                            <img src="https://picsum.photos/800/250?random=3">
                        </div>
                        @for($i=0;$i<11;$i++)
                        <div class="col-md-4 col-12">
                            <a href="#">
                                <div class="card mr-1 mb-3 p-2 text-center">
                                    <img src="https://picsum.photos/200/200?random=8" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">棉質V領針織衫-男</p>
                                        <p class="card-text">NT$249</p>
                                    </div>
                              </div>
                            </a>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>


        <script>
             $('.nav-categroy').click(function() {
                $("#carouselExampleFade").hide();
                $("#article").show();

            });
            $('.logo').click(function() {
                $("#carouselExampleFade").show();
                $("#article").hide();
            });
        </script>
    </body>

    <footer>
        <div id="footer" class="container">
            <p class="">&copy; miimo工作室</p>
        </div>
    </footer>
</html>
