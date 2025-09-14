<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    /**
     * Handle the start page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function start(Request $request): View
    {
        $max = config('blog.main_page_max_random_count');
        $articlesCount = Article::has('content')->visible()->count();
        $articles = Article::with(['author', 'content'])->has('content')->visible()->get()->random($articlesCount > $max ? $max : $articlesCount);

        $categoriesCount = Category::has('content')->count();
        $categories = Category::with('content')->has('content')->get()->random($categoriesCount > $max ? $max : $categoriesCount);

        return view('app.index')->with([
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * Handle the index page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function index(Request $request, string $lang): View
    {
        return $this->start($request);
    }

    /**
     * Handle the about page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function about(Request $request, string $lang): View
    {
        return view('app.about');
    }

    /**
     * Handle the privacy policy page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function privacyPolicy(Request $request, string $lang): View
    {
        return view('app.privacy-policy');
    }

    /**
     * Handle the contact page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function contact(Request $request, string $lang): View
    {
        return view('app.contact');
    }
}
