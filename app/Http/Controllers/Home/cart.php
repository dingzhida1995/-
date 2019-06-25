<?php
/**
 * Created by PhpStorm.
 * User: DADA
 * Date: 2019/6/21
 * Time: 15:22
 */

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class cart extends Controller
{
    //放入购物车
    public function addcart(Request $request)
    {
        $id=$request->all();
        $dada=DB::table('goods')->find($id['id']);
        $da['goods_id']=$dada->id;
        $da['goods_name']=$dada->name;
        $da['uid']=session('id');
        $da['goods_pic']=$dada->img;
        $da['goods_price']=$dada->price;
        $da['add_time']=time();
        $res=DB::table('cart')->insert($da);
        if($res){
            echo "<script>alert('放入购物车成功');location.href='http://qwe.xxoo.com/';</script>";
        }else{
            echo "<script>alert('放入购物车失败');location.href='http://qwe.xxoo.com/';</script>";
        }
    }
    //订单详情
    public function addorder(Request $request)
    {
        $dd=$request->all();
        return view('home/order',['dd'=>$dd['oid']]);
    }
    //生成订单
    public function doorder()
    {
        $dd=time().rand(1000,9999).session('id');
        $dada['oid']=$dd;
        $dada['add_time']=time();
        $dada['uid']=session('id');
        //查询订单总价
        $xx=DB::table('cart')->where('uid','=',session('id'))->get();
        if($xx){
           foreach($xx as $k=>$v){
               $rr=DB::table('orderlist')->insert(
                   ['oid'=>$dd,'goods_id'=>$v->id,'goods_name'=>$v->goods_name,'goods_pic'=>$v->goods_pic,'add_time'=>time()]
               );
           }
        }
        $num=0;
        foreach($xx as $val){
            $num += $val->goods_price;
        }
        $dada['pay_money']=$num;
        $res=DB::table('order')->insert($dada);
        if($res){
            return redirect('/home/order?oid='.$dd);
        }else{
            echo "<script>alert('生成订单失败');location.href='http://qwe.xxoo.com/';</script>";
        }
    }
    //订单列表展示
    public function orderlist()
    {
        $dada=DB::table('order')->where('uid','=',session('id'))->get()->toArray();
        foreach($dada as $k=>$v){
            unset($dada[$k]);
            $dada[$k]['id']=$v->id;
            $dada[$k]['oid']=$v->oid;
            $dada[$k]['uid']=$v->uid;
            $dada[$k]['pay_money']=$v->pay_money;
            $dada[$k]['state']=$v->state;
            $dada[$k]['pay_time']=$v->pay_time;
            $dada[$k]['add_time']=$v->add_time;
        }
        foreach($dada as $dk=>$dv){
            $list=DB::table('orderlist')->where('oid','=',$dv['oid'])->get()->toArray();
            if($list){
                $dada[$dk]['list'][]=$list;
            }
        }
        return view('home/orderlist',['orderlist'=>$dada]);
    }
}