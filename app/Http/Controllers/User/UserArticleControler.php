<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreUserArticleRequest;
use App\Http\Controllers\Controller;
use App\Models\AppConstant;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class UserArticleControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = auth()->user()->articles()->paginate(AppConstant::DEFAULT_PER_PAGE);
        return view('user.article.list')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('user.article.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserArticleRequest $request)
    {
        $article = new Article;
        $article->fill($request->all());

        auth()->user()->articles()->save($article);
        $article->categories()->attach($request->category_ids);
        return redirect('/user/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('user.article.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->fill($request->all());
        $article->save();
        $article->categories()->sync($request->category_ids);
        return redirect('/user/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/user/article');
    }
}
