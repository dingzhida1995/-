<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AliPayController extends Controller
{
    public $app_id;
    public $oid;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath = '';  //路径
    public $aliPubKey = '';  //路径
    public $privateKey = 'MIIEpQIBAAKCAQEA5Q57ytCCig4x72NHekZZuCB9F6jPjdMOZYQIXThicsiC3tXdxVsUYjpdsnuS5yTUy2IbO6Trx0ETCx3hDHZfdP4CFTUQnJpjhquUqswaXvPP9H3lAQUdH7k8R5Ee9JLJl5CQtFwDiUUgVJokzjJtoDraU9hVAXW8XIPPOmNbOjgUc2Ykb0KgIgqiYyM+XxXBopjA7PE7/Zl/895WYuMlOAxkxAmtWb5K00smUReczPxVU5U+yQsRLYmetPFZxXHX6BiOlP2ixLQnRa2K8O9fWmFbAZ65iW8ZEoEM7N2BVP9UDe168OfbxX7WxO1jj+czU8tGYF8l5pQI5+qD0mRqyQIDAQABAoIBAQCOxEhEUVIL2m0lWCvk+pRRP264oG89Zp9ChtjvwYUbJf7sBUEFEY/S6a4c4QjfKQW4/p0av+B1gQntk+IBcoZs1SVXMov4EAKYnbk7+5s0M6MaMJ3b1OQiMcJwmPNCXXtpDKIkyHUryfoswSbPnn7Vr9kFCYFyN3//6efv7J2f2sYrikvyzV1BpeMZwRe59JsGJeIjfN/cYZW/mXGrgZf32VpDJGwRq1/lCmgN8JU2ujkkqCETDj5gW3jg143YueLJIY0x2hNxpFIAxpv0TeLRJl/uPO3R51QN72CCvlJmVRw6k3/FfcoD9mGgKhBYOUA+Hz9uT47JAr/YuQxFGsZBAoGBAP46rN0KXZ/J4oD4YJ7O9RMkYT6F6cUujvpVCIC1mIq9HLDVR9y1aErm5SQvtJaWwIWvV4XdEql+SZzoWLThckixWXSoqw456TL9Dej4X9Im3a9+7uNq9m/1hSlOhLCt2bbr5dKcpoFxbpLxItPXdURbkeDAxtXD4Y+K/TMK49TjAoGBAOam7BIqrVlLM6He2fpXmJQNtBkn9n8sfNI49jccxp7u8f71rytAaovNpmcN4SZA92zHOpPzZRfgBZbuFctk5wU3uNg44vEfQA04Uz6H5CNrAjWPI/qGn7rt1WTCJvJQ3TMlI964vsyHmhtgM77vb3lNQomJcNK9NccalwxnZT1jAoGABfZYUYLJuVKhxkaM9YyDAOTshuvbFK3H2qUd4u7fWfmfb6JA4jM68+7AVv3rbVCxyTDYi6IoquL0VQK5+dwDsyK9p1fBUz8WcgSvS9RvYt1Ye6ItdhXvG6cVbWeTAxXAsmKL7EmSOhzv6/BN0cwOywCexjefMio64wPudkD+IOMCgYEAxdgSkLaowPo/jK6SPSlcCEsE27sqtgVcABq6H6YAPR3q1+631ZrIiajZ/nWqVdzOHzF5bqUNZwBS6xbH/RJNE22rkVSiXX+Xun9A8Fcx+qt0Vqq0itVlN7uAGpBrRdjVFGTcMtQ3XUtHhgnr+PB6pwr9cupAq5N/CI0nWY1rCs8CgYEAxUnQhWO7XDgIxRAlQwj/jYUdalNh3EeJ83weD+ymi4ZO2nc/gf8jqgKRvzVTfnv7UVDhbn8yUrBU0umViqkt/CifTjIKbIQ+S0z8ththEFsWoffg3sHeWfghLJ1u6+2Y+mTgXVvoV6hkclCFrfzFeFqZCg1/29kaVddko0+0Zwo=';
    public $publicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA5Q57ytCCig4x72NHekZZuCB9F6jPjdMOZYQIXThicsiC3tXdxVsUYjpdsnuS5yTUy2IbO6Trx0ETCx3hDHZfdP4CFTUQnJpjhquUqswaXvPP9H3lAQUdH7k8R5Ee9JLJl5CQtFwDiUUgVJokzjJtoDraU9hVAXW8XIPPOmNbOjgUc2Ykb0KgIgqiYyM+XxXBopjA7PE7/Zl/895WYuMlOAxkxAmtWb5K00smUReczPxVU5U+yQsRLYmetPFZxXHX6BiOlP2ixLQnRa2K8O9fWmFbAZ65iW8ZEoEM7N2BVP9UDe168OfbxX7WxO1jj+czU8tGYF8l5pQI5+qD0mRqyQIDAQAB';
    public function __construct()
    {
        $this->app_id = '2016092900624903';
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('APP_URL').'/notify_url';
        $this->return_url = env('APP_URL').'/ttt';
    }
    
    
    /**
     * 订单支付
     * @param $oid
     */
    public function pay(Request $request)
    {
        
        $dada=$request->all();


    	// file_put_contents(storage_path('logs/alipay.log'),"\nqqqq\n",FILE_APPEND);
    	// die();
        //验证订单状态 是否已支付 是否是有效订单
        //$order_info = OrderModel::where(['oid'=>$oid])->first()->toArray();
        //判断订单是否已被支付
        // if($order_info['is_pay']==1){
        //     die("订单已支付，请勿重复支付");
        // }
        //判断订单是否已被删除
        // if($order_info['is_delete']==1){
        //     die("订单已被删除，无法支付");
        // }
        $oid = $dada['oid'];  //订单编号
        $this->oid=$oid;
        //业务参数
        $bizcont = [
            'subject'           => '订单号: ' .$oid,
            'out_trade_no'      => $oid,
            'total_amount'      => $dada['pay_money'],
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
        ];
        //公共参数
        $data = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.page.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,        //异步通知地址
            'return_url'   => $this->return_url,        // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        dd($data);
        //签名
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $param_str = '?';
        foreach($data as $k=>$v){
            $param_str .= $k.'='.urlencode($v) . '&';
        }
        $url = rtrim($param_str,'&');
        $url = $this->gate_way . $url;
        
        header("Location:".$url);
    }
    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }
    protected function sign($data) {
    	if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
    		$priKey=$this->privateKey;
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($priKey, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";
    	}else{
    		$priKey = file_get_contents($this->rsaPrivateKeyFilePath);
            $res = openssl_get_privatekey($priKey);
    	}
        
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }
    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }
    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }
    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
    /**
     * 支付宝同步通知回调
     */
    public function aliReturn()
    {


//        echo '<pre>';print_r($_GET);echo '</pre>';die;
//        //验签 支付宝的公钥
//        if(!$this->verify($_GET)){
//            die('簽名失敗');
//        }
//
//        //验证交易状态
////        if($_GET['']){
////
////        }
////
//
//        //处理订单逻辑
//        $this->dealOrder($_GET);

        header("Refresh:2;url=home/orderlist");
        echo "订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转';
    }
    /**
     * 支付宝异步通知
     */
    public function aliNotify()
    {
         $data = json_encode($_POST);

        $log_str = '>>>> '.date('Y-m-d H:i:s') . $data . "<<<<\n\n";
        //记录日志
        file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        //验签
        $res = $this->verify($_POST);
        $log_str = '>>>> ' . date('Y-m-d H:i:s');
        if($res){
            //记录日志 验签失败
            $log_str .= " Sign Failed!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        }else{
            $log_str .= " Sign OK!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        }
        //验证订单交易状态
        if($_POST['trade_status']=='TRADE_SUCCESS'){
            //更新订单状态
            $oid = $_POST['out_trade_no'];     //商户订单号
            $info = [
                'state'        => 2,       //支付状态  0未支付 1已支付
                'pay_time'      => strtotime($_POST['gmt_payment']), //支付时间
                'plat'          => 1,      //平台编号 1支付宝 2微信 
            ];
            DB::table('order')->where('oid','=',$oid)->update($info);
            //DB::table('cart')->where('uid','=',session('id'))->delete();
        }
        //处理订单逻辑
        $this->dealOrder($_POST);
        echo 'success';
    }
    //验签
    function verify($params) {
        $sign = $params['sign'];
       // $params['sign_type'] = null;
       // $params['sign'] = null;
        if($this->checkEmpty($this->aliPubKey)){
            $pubKey= $this->publicKey;
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";
        }else {
            //读取公钥文件
            $pubKey = file_get_contents($this->aliPubKey);
            //转换为openssl格式密钥
            $res = openssl_get_publickey($pubKey);
        }
        //转换为openssl格式密钥
        ($res) or die('支付宝RSA公钥错误。请检查公钥文件格式是否正确');
        //调用openssl内置方法验签，返回bool值
        $result = (bool)openssl_verify($this->getSignContent($params), base64_decode($sign), $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->aliPubKey)){
            openssl_free_key($res);
        }
        return $result;
    }
    /**
     * 处理订单逻辑 更新订单 支付状态 更新订单支付金额 支付时间
     * @param $data
     */
    public function dealOrder($data)
    {
        //加积分
        //减库存
        // $x=DB::table('order')->where([['uid','=',session('id')],['oid','=',$this->oid]])->update(['state'=>2]);
        // $s=DB::table('cart')->where('uid','=',session('id'))->dalete();
        header('Refresh:2;url=/');
        echo "订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转';
    }
}
