<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts._head')
    @include('layouts._style')
    <body>
        @include('layouts._header')
        <section>
            <div id="article" class="container">
                <div class="row">
                    <!--選單區-->
                    <div id="menu" class="col-md-2 col-3">
                        <ul class="aside">
                            <li><a href="{{asset('/Men/Cloth')}}">上衣類</a>
                                <ul class="aside-sub">
                                    <li><a href="#">短T</a></li>
                                    <li><a href="#">長T</a></li>
                                    <li><a href="#">襯衫</a></li>
                                    <li><a href="#">商務</a></li>
                                    <li><a href="#">運動</a></li>
                                </ul>
                            </li>
                            <li><a href="{{asset('/Men/Pant')}}">褲子類</a>
                                <ul class="aside-sub">
                                    <li><a href="#">短褲</a></li>
                                    <li><a href="#">長褲</a></li>
                                    <li><a href="#">牛仔褲</a></li>
                                    <li><a href="#">七/九分褲</a></li>
                                    <li><a href="#">運動褲</a></li>
                                </ul>
                            </li>
                            <li><a href="{{asset('/Men/Coat')}}">外套類</a>
                                <ul class="aside-sub">
                                    <li><a href="#">羽絨</a></li>
                                    <li><a href="#">休閒</a></li>
                                    <li><a href="#">防水</a></li>
                                </ul>
                            </li>
                            <li><a href="{{asset('/Men/Underwear')}}">家居類</a>
                                <ul class="aside-sub">
                                    <li><a href="#">睡衣</a></li>
                                    <li><a href="#">內衣/內褲</a></li>
                                </ul>
                            </li>
                            <li><a href="{{asset('/Men/Other')}}">配件類</a>
                                <ul class="aside-sub">
                                    <li><a href="#">皮帶</a></li>
                                    <li><a href="#">襪子</a></li>
                                    <li><a href="#">鞋子</a></li>
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
                            @if(isset($men))
                                @foreach ($men as $man)
                                <div id={{ $man->id }}  class="col-md-4 col-12 mb-4">
                                    <div class="card p-1 text-center">
                                        <a href="/Detail/{{ $man->lotid }}"  target="_blank">
                                            <img src="https://picsum.photos/200/200?random=8" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">{{$man->product}}</p>
                                                @if(is_null($man->saleprice))
                                                    <p class="nosale-price card-text">NT${{$man->price}}</p>
                                                @else
                                                    <p class="card-text">
                                                        <span class="ori-price">原價{{$man->price}}</span>
                                                        <span class="sale-price text-danger">活動價NT${{$man->saleprice}}</span>
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

        @include('layouts._footer')
    </body>
</html>
