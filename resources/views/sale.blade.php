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
            <div id="article" class="container">
                <div class="row">
                    <!--選單區-->
                    <div id="menu" class="col-md-2 col-3">
                        <ul class="aside">
                            <li><a href="{{asset('/Sale')}}">優惠活動</a>
                                <ul class="aside-sub">
                                    <li><a href="#">3件798</a></li>
                                    <li><a href="#">2件1199</a></a></li>
                                    <li><a href="#">任選168</a></li>
                                    <li><a href="#">買1送1</a></li>
                                    <li><a href="#">零碼出清</a></li>
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
                            @if(isset($sales))
                                @foreach ($sales as $sale)
                                <div class="col-md-4 col-12 mb-4">
                                    <div class="card p-1 text-center">
                                        <a href="/Detail/{{ $sale->lotid }}"  target="_blank">
                                            <img src="https://picsum.photos/200/200?random=8" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">{{$sale->product}}</p>
                                                @if(is_null($sale->saleprice))
                                                    <p class="nosale-price card-text">NT${{$sale->price}}</p>
                                                @else
                                                    <p class="card-text">
                                                        <span class="ori-price">原價{{$sale->price}}</span>
                                                        <span class="sale-price text-danger">活動價NT${{$sale->saleprice}}</span>
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
        </section>
        <footer>
            @include('layouts._footer')
        </footer>
    </body>
</html>
