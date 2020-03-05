
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
                <a href="{{asset('/Logout')}}">{{session()->get('buyerName')}}-登出</a>
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



