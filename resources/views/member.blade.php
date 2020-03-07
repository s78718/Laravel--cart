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
            <div class="container member-list">
                <div class="row text-center w-auto">
                    <div class="col">
                        <button class="btn" id="searchorders">訂單查詢</button>
                    </div>
                    <div class="col">
                        <button class="btn"  id="persondata">個人資料修改</button>
                    </div>
                </div>
            </div>
            @if(isset($order))
            <div class="container member">
                <div class="row member-th">
                    <div class="col-4 col-md-3">
                        訂單日期
                    </div>
                    <div class="col-4 col-md-2">
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
                    <div class="col-4 col-md-2">
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
                            已經付款成功
                        @else
                            <a href="/Payorder/{{ $o->uuid }}">付款</a>
                            <span>|</span>
                            <a href="/Cancelorder/{{ $o->uuid }}">取消</a>
                        @endif
                    </div>
                @endforeach
            </div>
            @endif
        </section>
        <section>
            <div class="container person">
                <div class="col-md-12 col-12">
                    <form  method="POST" action="/Person/Modify">
                        @csrf
                        <h4 class="pb-2">修改</h4>
                        <hr>
                        <div class="form-group">
                            <label for="InputEmail1">名字</label>
                            <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
                                @if ($errors->first('email'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                        <label for="InputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
                            @if ($errors->first('email'))
                                <span class="error" role="alert">
                                    <strong class="text-danger bg-warning">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">地址</label>
                            <input type="password" name="password" class="form-control" id="InputPassword1" required>
                                @if ($errors->first('password'))
                                    <span class="error" role="alert">
                                        <strong class="text-danger bg-warning">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <button class=" btn modifybtn" type="submit" class="btn">修改</button>

                        @if ($errors->first('error'))
                        <span class="error" role="alert">
                            <strong class="text-danger bg-warning">{{$errors->first('error')}}</strong>
                        </span>
                        @endif

                    </form>
                </div>
            </div>
        </section>
        <footer>
            @include('layouts._footer')
        </footer>

        <script>
            $(document).ready(function(){
                $('#searchorders').css('background-color','#ccc');
            });
            $('#searchorders').click(function(){
                $(this).css('background-color','#ccc');
                $('#persondata').css('background-color','#fff');
                $('.person').css('display','none');
                $('.member').css('display','block');
            })
            $('#persondata').click(function(){
                $(this).css('background-color','#ccc');
                $('#searchorders').css('background-color','#fff');
                $('.member').css('display','none');
                $('.person').css('display','block');

            })
        </script>
    </body>
</html>

