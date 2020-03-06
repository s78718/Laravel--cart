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
            @if(isset($order))
                <div class="container member">
                    <div class="row member-th">
                        <div class="col-4 col-md-3">
                            訂單日期
                        </div>
                        <div class="col-4 col-md-3">
                            訂單號碼
                        </div>
                        <div class="col-1 col-md-1">
                            狀態
                        </div>
                        <div class="col-1 col-md-1">
                            金額
                        </div>
                        <div class="col-1 col-md-2">
                            付款方式
                        </div>
                        <div class="col-1 col-md-2">
                            訂單操作
                        </div>
                        <hr>
                    </div>
                    <div class="row member-td">
                    @foreach($order as $o)
                        <div class="col-4 col-md-3">
                            {{$o->created_at}}
                        </div>
                        <div class="col-4 col-md-3">
                            {{$o->uuid}}
                        </div>
                        <div class="col-1 col-md-1">
                            {{$o->state}}
                        </div>
                        <div class="col-1 col-md-1">
                            {{  $o->bill }}
                        </div>
                        <div class="col-1 col-md-2">
                            {{$o->payment}}
                        </div>
                        <div class="col-1 col-md-2">
                            @if($o->paid)
                                <a href="#">查詢匯款</a>
                            @else
                                <a href="#">付款</a>
                            @endif
                            <span> | </span>
                            <a href="#">取消</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
        <footer>
            @include('layouts._footer')
        </footer>
    </body>
</html>

