<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\CreateArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function index()
    {
        $articles = Article::where('status', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateArticleRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function store(CreateArticleRequest $request)
    {
        /* 处理文章描述 */
        $description = mb_substr(strip_tags($request->get('content')), 0, 200, 'utf-8') . '...';
        $request->merge(['description' => $description]);

        $result = Article::create($request->all());
        return redirect('articles/show/' . $result->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::withTrashed()->find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CreateArticleRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, CreateArticleRequest $request)
    {
        $article = Article::withTrashed()
            ->find($id);
        if ($article->trashed()) {
            $article->restore();
        }
        $article->update($request->all());
        return redirect('articles');
    }

    /**
     * 软删除文章
     *
     * @param $ids
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function delete($ids)
    {
        Article::destroy($ids);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * 彻底删除一篇文章
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $article = Article::onlyTrashed()
            ->find($id);
        $article->forceDelete();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * 恢复被删除的文章
     *
     * @param $ids
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($ids)
    {
        Article::onlyTrashed()
            ->where('id', $ids)
            ->restore();
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
