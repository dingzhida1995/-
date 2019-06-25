<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MovieComposer;
//use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use App\Observers\CommentObserver;
use DB;
class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.main',MovieComposer::class);//复杂的预设变量通过自定义类实现，导航栏视图共享
        //闭包方式
//        view()->composer(['layouts.index'],function ($view) {
//            $view->with('cart',(object)DB::table('cart')->where('uid','=',session('id'))->get()->toArray());
//        });//多个页面配置信息视图共享，如果是是全部页面可以使用*代替
        View()->composer('*',function ($view){ //common.header 对应Blade模板
            $view->with(['cart'=>$cart = DB::table('cart')->where('uid','=',session('id'))->get(),'num'=>$this->cart()]);
        });
    }
    public function cart()
    {
        $xx=DB::table('cart')->where('uid','=',session('id'))->get();
        $num=0;
        foreach($xx as $val){
            $num += $val->goods_price;
        }
        return $num;
    }
}
