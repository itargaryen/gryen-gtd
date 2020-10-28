<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\ConfigMany;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * 计算平均发博天数及平均间隔天数.
     * @return array
     */
    public function analytics()
    {
        $analytics = Article::analytics();

        return $analytics;
    }

    public function configManies()
    {
        return ConfigMany::all();
    }
}