@extends('layout.index')
@section('title','微商城登入')
@section('content')
    <!-- checkout -->
        <div class="checkout pages section">
            <div class="container">
                <div class="pages-head">
                    <h3>订单列表</h3>
                </div>
                <div class="checkout-content">
                    <div class="row">
                        <div class="col s12">
                            <ul class="collapsible" data-collapsible="accordion">
                                <!--订单列表展示位置-->
                                @foreach($orderlist as $ork=>$orv)
                                <li>
                                    <div class="collapsible-header">
                                        <h5>订单:{{$orv['oid']}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单添加时间:{{date('Y-m-d H:i:s',$orv['add_time'])}}</h5>
                                        <h5 class="status">@if($orv['state']==1)未支付@else已支付@endif</h5>
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="order-review">
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="cart-details">
                                                        <div class="col s5">
                                                            <div class="cart-product">
                                                                <h5>商品图片</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col s7">
                                                            <div class="cart-product">
                                                                @foreach($orv['list'][0] as $ok=>$ov)
                                                                    <img src="{{$ov->goods_pic}}" alt="" style="width: 10%">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="cart-details">
                                                        <div class="col s5">
                                                            <div class="cart-product">
                                                                <h5>支付剩余时间</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col s7">
                                                            <div class="cart-product">
                                                                <span class="shijian" order-state="{{$orv['state']}}" end-time="{{date('Y/m/d H:i:s',$orv['add_time']+1200)}}"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-review final-price">
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="cart-details">
                                                        <div class="col s8">
                                                            <div class="cart-product">
                                                                <h5>总价格</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col s4">
                                                            <div class="cart-product">
                                                                <h1>${{$orv['pay_money']}}</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{url('home/zhifu')}}" method="post">
                                                <input type="hidden" name="oid" value="{{$orv['oid']}}">
                                                <input type="hidden" name="pay_money" value="{{$orv['pay_money']}}">
                                                <button type="submit" class="btn button-default">马上去支付</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{asset('/index/js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            getTime();
            function getTime(){
                $(".shijian").each(function(){
                    var _this = $(this);
                    var end_time = _this.attr('end-time'); //结束时间
                    var state = _this.attr('order-state'); //订单状态

                    var endDate = new Date(end_time);
                    endDate = endDate.getTime();//1970-截止时间  从1970年到截止时间有多少毫秒

                    //获取一个现在的时间
                    var nowdate = new Date;
                    nowdate = nowdate.getTime(); //现在时间-截止时间  从现在到截止时间有多少毫秒

                    //获取时间差 把毫秒转换为秒
                    var diff = parseInt((endDate - nowdate) / 1000);

                    if(diff <= 0 && state == 1){
                        //window.location.reload();
                        _this.parent().parent().parent().parent().parent().parent().parent().prev('.collapsible-header').children('.status').text('已过期');
                        _this.parent().parent().parent().parent().parent().parent().next().children('.row').children('form').css('display','none');
                        _this.after("<b>已超过支付时间</b>");
                        _this.remove();

                    }

                    h = parseInt(diff / 3600);//获取还有小时
                    m = parseInt(diff / 60 % 60);//获取还有分钟
                    s = diff % 60;//获取多少秒数

                    //将时分秒转化为双位数
                    h = setNum(h);
                    m = setNum(m);
                    s = setNum(s);
                    //输出时分秒
                    _this.html(m + "分" + s + "秒");
                });
                window.setTimeout(function() {
                    getTime();
                }, 1000);
            }
            //window.setTimeout(getTime, 1000);
            //设置函数 把小于10的数字转换为两位数
            function setNum(num) {
                if (num < 10) {
                    num = "0" + num;
                }
                return num;
            }
        })
    </script>
    <!-- end checkout -->
@endsection