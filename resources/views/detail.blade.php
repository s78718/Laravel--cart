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
        <!--放大鏡-->
        <script type="text/javascript" src="/blowup/blowup.js"></script>
        <!-- Styles -->
        <style>
            @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css");
            *{
                padding: 0;
                margin: 0;
                font-family: 'Noto Sans TC' ;
                list-style:none;
            }
            <!--關閉超連結-->
            a.disabled {
                pointer-events: none;
                background-color: #eee;
                color: white;
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

            #footer
            {
                background-color: #ccc;
                color: #444;
                text-align: center;
                padding: 10px;
                border: 6px double #eee;
            }

            #detail{
                padding: 20px;
            }

            #detail img{
                padding: 15px;
                width:100%;
                hight:100%;
                border: 8px double #ccc;
            }
            #detail-ori-price{
                text-decoration:line-through;
                font-size: 15px;
            }
            #qty{
                margin: 5px;
                width:5em;
                height:2em;
            }
            .add-cart{
                background-color: #ccc;
                margin-left: 50px;
            }
            .color ,.size{
                border-radius: 50%;
                background-color: #ccc;
                width:50px;
                hight:50px;
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
                    <a href="{{asset('/Logout')}}">{{ session()->get('buyerName') }}-登出</a>
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

    <body >
        @if(isset($detail))
            <div id="detail" class="container">
                <div class="row">
                    <div class="col-xl-6 col-12 text-center">
                        <img id="img" src="https://picsum.photos/600/600?random=1">
                    </div>
                    <div class="col-xl-6 col-12">
                        <h5 class="text-left p-2"> {{ $detail[0]->product}} </h5>

                        @if(is_null($price[0]->saleprice))
                            <h3 class="text-right"> NT${{ $price[0]->price}} </h3>
                        @else
                            <p id="detail-ori-price" class="text-right"> 原價{{ $price[0]->price }} </p>
                            <h3 id="detail-sale-price" class="text-right text-danger">活動價NT$ {{ $price[0]->saleprice }} </h3>
                        @endif

                        <hr>
                        <div class="container m-2">
                            <p>顏色</p>

                            @if(isset($color))
                                @foreach ($color as $c)
                                    <button  class="btn color" value="{{ $c->color}}">{{ $c->color }}</button>
                                @endforeach
                            @endif

                        </div>
                        <div class="container m-2">
                            <p class="pt-1">尺寸</p>

                            @if(isset($size))
                                @foreach ($size as $s)
                                    <button  class="btn size" value="{{ $s->size }}">{{ $s->size }}</button>
                                @endforeach
                            @endif

                        </div>
                        <div class="container m-2">
                            <p class="pt-1">數量</p>
                            <select id="qty" name="qty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <!--傳回lotid-->
                            <a  id="add-cart" class="btn add-cart" href="/Add-to-cart/{{$detail[0]->lotid}}">加入購物車</a>
                            <p  class="inventory pt-1 ">庫存:</p>
                        </div>
                        <hr>
                        ※享有7天鑑賞期,退貨須包裝完整.貼身衣物不接受退貨!
                    </div>
                </div>
                <hr>

                <div class="container">
                    照片區
                </div>
            </div>
        @endif

        <script type="text/javascript">
            //更換顏色照片
            var random=0;
            var color;
            var size;

            $(document).ready(function(){
                //初始化加入購物車連結
                $('#qty').attr('disabled', 'true');
                $('#add-cart').addClass('disabled');
                $('#add-cart').html("請先選擇尺寸及顏色");
                //放大鏡
                $("#img").blowup({
                    "scale": 1.8,
                    "width": 350,
                    "height":350,
                });
            });

            $('.color').click(function(){
                $('.inventory').html('庫存:');

                $('.color').css({"background-color": "#ccc"});
                //模擬換顏色
                $('#img').attr('src','https://picsum.photos/600/600?random='+random);
                random+=1;
                //放大鏡
                $("#img").blowup({
                    "scale": 1.5,
                });
                //選擇顏色
                color=$(this).val();
                $(this).css({"background-color": "#0d0"});
                //須選顏色與尺寸
                if(size!=null && color!=null)
                {
                    $.ajax({
                        type:'POST',
                        url:'Inventory',
                        data:{'_token': '{{ csrf_token() }}',
                            'color':color,
                            'size':size,
                            'lotid': {{ $detail[0]->lotid }},
                        },
                        async: 'false',
                        success: function(data){
                            $('.inventory').html('庫存:'+data);
                            if(data!=0){
                                $('#qty').attr('disabled', false);
                                $('#add-cart').removeClass('disabled');
                                $('#add-cart').html("加入購物車");
                            }
                            else{
                                $('#qty').attr('disabled', 'true');
                                $('#add-cart').addClass('disabled');
                                $('#add-cart').html('缺貨中');
                            }
                        }
                    });
                }
            });

            $('.size').click(function(){
                $('.inventory').html('庫存:');

                $('.size').css({"background-color": "#ccc"});
                //選擇尺寸
                size=$(this).val();
                $(this).css({"background-color": "#0d0",});
                //須選顏色與尺寸
                if(size!=null && color!=null)
                {

                    $.ajax({
                        type:'POST',
                        url:'Inventory',
                        data:{  'color':color,
                                'size':size,
                                '_token': '{{ csrf_token() }}',
                                'lotid': {{ $detail[0]->lotid }},
                        },
                        async: 'false',
                        success: function(data){
                            $('.inventory').html('庫存:'+data);

                            if(data!=0){
                                $('#qty').attr('disabled', false);
                                $('#add-cart').removeClass('disabled');
                                $('#add-cart').html("加入購物車");
                            }
                            else{
                                $('#qty').attr('disabled', 'true');
                                $('#add-cart').addClass('disabled');
                                $('#add-cart').html('缺貨中');
                            }
                        }
                    });
                }
            });

            //加到購物車
            $('#add-cart').click(function(){
                if(size!=null && color!=null){
                    alert('商品已經加入購物車');
                }
                else if(size==null){
                    alert('請選擇尺寸');
                }
                else{
                    alert('請選擇顏色');
                }
            });
        </script>


    </body>

    <footer>
        <div id="footer" class="container">
            <p class="">&copy; mik</p>
        </div>
    </footer>


</html>


