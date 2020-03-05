<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts._head');

    <body>
        @include('layouts._header');
        <section>
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
                                        <a href="/Detail/{{ $new->lotid }}"  target="_blank">
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
        </section>

        @include('layouts._footer');
    </body>
</html>
