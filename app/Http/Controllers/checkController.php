<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkController extends Controller
{

    public function check()
    {
    	return view('home/check');
    }

    public function checkgit()
    {
    	echo "检测成功";
    }

}
