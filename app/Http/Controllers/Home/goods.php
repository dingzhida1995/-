<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class goods extends Controller
{
    //商品详情
    public function goodsxx(Request $request)
    {
        $id=$request->all();
        $dada=DB::table('goods')->find($id['id']);
        return view('home/goodsxx',['dada'=>$dada]);
    }

}
