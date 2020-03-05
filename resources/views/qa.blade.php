<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts._head');

    <body>
        @include('layouts._header');
        <section>
            <div class="container text-center qa">
                <a class="btn p-4 bg-info mb-3" data-toggle="collapse" href="#collapseBuy" role="button" aria-expanded="false" aria-controls="collapseExample">
                    購買流程
                </a>
                <a class="btn p-4 bg-info mb-3" data-toggle="collapse" href="#collapsePay" role="button" aria-expanded="false" aria-controls="collapseExample">
                    付款種類
                </a>
                    <a class="btn p-4 bg-info mb-3" data-toggle="collapse" href="#collapseMember" role="button" aria-expanded="false" aria-controls="collapseExample">
                    會員登入
                </a>
                <a class="btn p-4 bg-info mb-3" data-toggle="collapse" href="#collapseOther" role="button" aria-expanded="false" aria-controls="collapseExample">
                    其他問題
                </a>
                <div class="collapse" id="collapseBuy">
                    <div class="card card-body text-left">
                        <p>Q1. 購物流程說明</p>
                        <p>第一次購物：註冊帳號＞選擇商品＞加入購物車＞填寫資訊＞前往結帳(付款)＞完成購物</p>
                    </div>
                </div>
                <div class="collapse" id="collapsePay">
                    <div class="card card-body text-left">
                        <p> Q1. 目前提供哪些付款方式？</p>
                        <p> 1. 『超商條碼』</p>
                        <p> 2. 『信用卡』</p>
                        <p> 3. 『WebATM』</p>
                    </div>
                </div>
                <div class="collapse" id="collapseMember">
                    <div class="card card-body text-left">
                        <p> Q1. 該如何加入會員呢？</p>
                        <p> 請您點選上方「登入/註冊」後，選擇使用第三方登入或是本站註冊。</p>
                        <p> Q2. 忘記密碼怎麼辦？</p>
                        <p> 若您忘記密碼，請您先「會員登入」後，點選「忘記密碼」，再輸入註冊的電子郵件，密碼會寄到您的信箱。</p>

                    </div>
                </div>
                <div class="collapse" id="collapseOther">
                    <div class="card card-body text-left">
                        <p>其他</p>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div id="footer" class="container">
                <p class="">&copy; mik</p>
            </div>
        </footer>
    </body>

</html>

