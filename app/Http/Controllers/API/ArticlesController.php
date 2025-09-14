<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $articles = Article::with(['author', 'categories', 'contents'])->has('contents')->visible()->search($request->q)->orderBy('id', 'desc')->paginate(config('blog.pagination'));
        return ArticleResource::collection($articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \App\Http\Resources\ArticleResource
     */
    public function show(Article $article): ArticleResource
    {
        if ($article->isVisible() && !empty($article->contents))
            return new ArticleResource($article);
        else abort(404);
    }
}
