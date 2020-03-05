<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts._head');
    <body>
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
                        <a href="{{asset('/Logout')}}">{{ session()->get('buyerName')}}-登出</a>
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
                <a href="{{asset('/Women')}}">女裝</a>
                <a href="{{asset('/Men')}}">男裝</a>
                <a href="{{asset('/Kids')}}">兒童</a>
                <a href="{{asset('/New')}}">新品</a>
                <a href="{{asset('/Sale')}}">活動</a>
            </div>
        </header>

        @include('layouts._footer');
    </body>
</html>
