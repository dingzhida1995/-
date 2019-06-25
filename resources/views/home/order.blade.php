@extends('layout.index')
@section('title','微商城登入')
@section('content')
<!-- checkout -->
<form class="col s12" action="{{url('home/zhifu')}}" method="post">
    @csrf
<div class="checkout pages section">
    <div class="container">
        <div class="pages-head">
            <h3>订单信息</h3>
        </div>
        <div class="checkout-content">

                <input type="hidden" name="oid" value="{{$dd}}">
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header active"><h5>订单编号:{{$dd}}</h5></div>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>填写收货地址</h5></div>
                            <div class="collapsible-body">
                                <div class="billing-information">

                                        <div class="input-field">
                                            <h5>收货人姓名*</h5>
                                            <input type="text" class="validate" >
                                        </div>
                                        <div class="input-field">
                                            <h5>收货人地址*</h5>
                                            <input type="text" class="validate" >
                                        </div>
                                        <div class="input-field">
                                            <h5>收货人电话*</h5>
                                            <input type="number" class="validate" >
                                        </div>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>付款方式</h5></div>
                            <div class="collapsible-body">
                                <div class="payment-mode">

                                        <div class="input-field">
                                            <input type="radio" class="with-gap" id="bank-transfer" name="group1">
                                            <label for="bank-transfer"><span>支付宝支付</span></label>
                                        </div>
                                        <div class="input-field">
                                            <input type="radio" class="with-gap" id="cash-on-delivery" name="group1">
                                            <label for="cash-on-delivery"><span>微信支付</span></label>
                                        </div>
                                        <div class="input-field">
                                            <input type="radio" class="with-gap" id="online-payments" name="group1">
                                            <label for="online-payments"><span>货到付款</span></label>
                                        </div>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>订单审核</h5></div>
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
                                                        @foreach($cart as $iii)
                                                        <img src="{{$iii->goods_pic}}" alt="" style="width: 10%">
                                                        @endforeach
                                                    </div>9
                                                </div>
                                            </div>
                                            <!--<div class="divider"></div>
                                            <div class="cart-details">
                                                <div class="col s5">
                                                    <div class="cart-product">
                                                        <h5>Quantity</h5>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="cart-product">
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="divider"></div>
                                            @foreach($cart as $sp)
                                            <div class="cart-details">
                                                <div class="col s5">
                                                    <div class="cart-product">
                                                        <h5>{{$sp->goods_name}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="cart-product">
                                                        <span>${{$sp->goods_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
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
                                                        <h1>${{$num}}</h1>
                                                        <input type="hidden" name="pay_money" value="{{$num}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"   class="btn button-default">确认支付</button>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</div>

</form>
<!-- end checkout -->
@endsection