<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts._head');
    @include('layouts._style');
    <body>
        @include('layouts._header');
        <section>
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
        </section>

        @include('layouts._footer');
    </body>
</html>
