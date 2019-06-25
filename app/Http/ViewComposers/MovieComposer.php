<?php
/**
 * Created by PhpStorm.
 * User: DADA
 * Date: 2019/6/21
 * Time: 18:51
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
class MovieComposer
{
    private $category;

    public function __construct(Category $category) {

        $this->category = $category;
    }

    public function compose(View $view) {
        $view->with('navs', $this->category->getNavs());
    }
}