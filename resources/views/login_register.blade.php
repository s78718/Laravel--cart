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
            <div class="container">
                <div class="row">
                    <div id="third-login" class="col-md-12 col-12">
                        <h4 class="pb-2">快速登入/註冊</h4>
                        <hr>
                        <a href="User/Auth/Facebook-sign-in">
                            <img  src="/png/fb_icon.png">
                        </a>
                        <a href="User/Auth/Google-sign-in">
                            <img  src="/png/google_icon.png">
                        </a>
                        <a href="User/Auth/Line-sign-in">
                            <img  src="/png/line_icon.png">
                        </a>
                    </div>
                    <div id="login-form" class="col-md-12 col-12">
                        <form  method="POST" action="/Login_Register/Validate">
                            @csrf
                            <h4 class="pb-2">登入會員</h4>
                            <hr>
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
                            <label for="InputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="InputPassword1" required>
                                    @if ($errors->first('password'))
                                        <span class="error" role="alert">
                                            <strong class="text-danger bg-warning">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <button type="submit" class="btn">登入</button>
                            @if ($errors->first('error'))
                            <span class="error" role="alert">
                                <strong class="text-danger bg-warning">{{$errors->first('error')}}</strong>
                            </span>
                            @endif
                        </form>

                        <div class="container text-right">
                            <a  href="/Register">本站註冊
                            <a  data-toggle="collapse" href="#forgetpass" role="button" aria-controls="forgetpass">忘記密碼</a>

                            <div class="collapse text-left" id="forgetpass">
                                <div class="card card-body">

                                    <form method="POST" action="/Sendpassword">
                                        @csrf
                                        <label for="forgetpassinput">信箱(忘記密碼)</label>
                                        <input name="forgetemail" id="forgetpassinput" type="email" placeholder="填入你的Email" required>
                                        <button class="btn ml-2" type="submit">寄出</button>
                                    </form>
                                </div>
                            </div>
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
