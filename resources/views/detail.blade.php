<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts._head');
    <body>
        @include('layouts._header');
        @include('layouts._style');
        <section>
            @if(isset($detail))
                <div id="detail" class="container">
                    <div class="row">
                        <div class="col-xl-6 col-12 text-center">
                            <img id="img" src="https://picsum.photos/600/600?random=1">
                        </div>
                        <div class="col-xl-6 col-12">
                            <h5 class="text-left p-2"> {{ $detail[0]->product}} </h5>
                            @if(is_null($price[0]->saleprice))
                                <h3 class="text-right"> NT${{ $price[0]->price}} </h3>
                            @else
                                <p id="detail-ori-price" class="text-right"> 原價{{ $price[0]->price }} </p>
                                <h3 id="detail-sale-price" class="text-right text-danger">活動價NT$ {{ $price[0]->saleprice }} </h3>
                            @endif
                            <hr>
                            <div class="container m-2">
                                <p>顏色</p>
                                @if(isset($color))
                                    @foreach ($color as $c)
                                        <button  class="btn color" value="{{ $c->color}}">{{ $c->color }}</button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="container m-2">
                                <p class="pt-1">尺寸</p>
                                @if(isset($size))
                                    @foreach ($size as $s)
                                        <button  class="btn size" value="{{ $s->size }}">{{ $s->size }}</button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="container m-2">
                                <p class="pt-1">數量</p>
                                <select id="qty" name="qty">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <!--傳回lotid-->
                                <a  id="add-cart" class="btn add-cart" href="/Add-to-cart/{{$detail[0]->lotid}}">加入購物車</a>
                                <p  class="inventory pt-1 ">庫存:</p>
                            </div>
                            <hr>
                            ※享有7天鑑賞期,退貨須包裝完整.貼身衣物不接受退貨!
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        照片區
                    </div>
                </div>
            @endif
        </section>

        @include('layouts._footer');

        <script type="text/javascript">
            //更換顏色照片
            var random=0;
            var color;
            var size;

            $(document).ready(function(){
                //初始化加入購物車連結
                $('#qty').attr('disabled', 'true');
                $('#add-cart').addClass('disabled');
                $('#add-cart').html("請先選擇尺寸及顏色");
                //放大鏡
                $("#img").blowup({
                    "scale": 1.8,
                });
            });

            $('.color').click(function(){
                $('.inventory').html('庫存:');

                $('.color').css({"background-color": "#ccc"});
                //模擬換顏色
                $('#img').attr('src','https://picsum.photos/600/600?random='+random);
                random+=1;
                //放大鏡
                $("#img").blowup({
                    "scale": 1.5,
                });
                //選擇顏色
                color=$(this).val();
                $(this).css({"background-color": "#0d0"});
                //須選顏色與尺寸
                if(size!=null && color!=null)
                {
                    $.ajax({
                        type:'POST',
                        url:'Inventory',
                        data:{'_token': '{{ csrf_token() }}',
                            'color':color,
                            'size':size,
                            'lotid': {{ $detail[0]->lotid }},
                        },
                        async: 'false',
                        success: function(data){
                            $('.inventory').html('庫存:'+data);
                            if(data!=0){
                                $('#qty').attr('disabled', false);
                                $('#add-cart').removeClass('disabled');
                                $('#add-cart').html("加入購物車");
                            }
                            else{
                                $('#qty').attr('disabled', 'true');
                                $('#add-cart').addClass('disabled');
                                $('#add-cart').html('缺貨中');
                            }
                        }
                    });
                }
            });

            $('.size').click(function(){
                $('.inventory').html('庫存:');

                $('.size').css({"background-color": "#ccc"});
                //選擇尺寸
                size=$(this).val();
                $(this).css({"background-color": "#0d0",});
                //須選顏色與尺寸
                if(size!=null && color!=null)
                {

                    $.ajax({
                        type:'POST',
                        url:'Inventory',
                        data:{  'color':color,
                                'size':size,
                                '_token': '{{ csrf_token() }}',
                                'lotid': {{ $detail[0]->lotid }},
                        },
                        async: 'false',
                        success: function(data){
                            $('.inventory').html('庫存:'+data);

                            if(data!=0){
                                $('#qty').attr('disabled', false);
                                $('#add-cart').removeClass('disabled');
                                $('#add-cart').html("加入購物車");
                            }
                            else{
                                $('#qty').attr('disabled', 'true');
                                $('#add-cart').addClass('disabled');
                                $('#add-cart').html('缺貨中');
                            }
                        }
                    });
                }
            });

            //加到購物車
            $('#add-cart').click(function(){
                if(size!=null && color!=null){
                    alert('商品已經加入購物車');
                }
                else if(size==null){
                    alert('請選擇尺寸');
                }
                else{
                    alert('請選擇顏色');
                }
            });
        </script>

    </body>
</html>


