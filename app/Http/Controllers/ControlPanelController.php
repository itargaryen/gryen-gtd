<?php

namespace App\Http\Controllers;

use App\Article;

class ControlPanelController extends Controller
{
    /**
     * 后台首页 - 基本信息展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('control.index');
    }

    public function me()
    {
        return view('control.me');
    }

    /**
     * 后台文章列表
     * @return mixed
     * @internal param $page
     */
    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')
            -> paginate(15);
        return view('control.articles', compact('articles'));
    }

    public function pushToKindle()
    {
        return view('control.push-to-kindle');
    }

    public function settings()
    {
        return view('control.settings');
    }

    public function ashcan()
    {
        $articles = Article::onlyTrashed()->paginate(15);
        return view('control.ashcan',compact('articles'));
    }
}