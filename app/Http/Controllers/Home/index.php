<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class index extends Controller
{
    //首页
    public function index()
    {
        $data = DB::table('goods')->paginate(4);
        $dada = DB::table('goods')->where('remen','=','1')->get();

    	return view('home/index',['data'=>$data,'dada'=>$dada]);
    }

}
