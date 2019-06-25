<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class index extends Controller
{
    //后台首页
    public function index()
    {

        return view('admin/index');
    }
    public function adduser(Request $request)
    {
        $soso=$request->all();
        if(isset($soso['soso']))
        {
            $dada=DB::table('user')->where('name','like',"%".$soso['soso']."%")->paginate(4);
        }else{
            $soso['soso']="";
            $dada=DB::table('user')->paginate(4);
        }
        return view('admin/user',['user'=>$dada,'soso'=>$soso['soso']]);
    }
    public function deluser(Request $request)
    {
        $id=$request->all();
        $res=DB::table('user')->where('id','=',$id['id'])->delete();
        if($res){
            echo "<script>alert('删除成功');location.href='".asset('admin/adduser')."';</script>";
        }else{
            echo "<script>alert('删除失败');location.href='".asset('admin/adduser')."';</script>";
        }
    }
    public function dduser(Request $request)
    {
        return view('admin/adduser');
    }
    public function dodduser(Request $request)
    {
       $dada=$request->all();
       unset($dada['_token']);
       $dada['created_at']=time();
       $res=DB::table('user')->insert($dada);
        if($res){
            echo "<script>alert('添加成功');location.href='".asset('admin/adduser')."';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='".asset('admin/adduser')."';</script>";
        }
    }
    public function updateuser(Request $request)
    {
        $id=$request->all();
        $res=DB::table('user')->find($id['id']);

        return view('admin/updateuser',['uu'=>$res]);
    }
    public function doupdateuser(Request $request)
    {
        $dada=$request->all();
        $res=DB::table('user')->where('id','=',$dada['id'])->update([
            'name'=>$dada['name'],
            'status'=>$dada['status'],
            'updated_at'=>time()
        ]);
        if($res){
            echo "<script>alert('修改成功');location.href='".asset('admin/adduser')."';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='".asset('admin/adduser')."';</script>";
        }
    }
}
