<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $lang
     * @return \Illuminate\View\View
     */
    public function index(Request $request, string $lang): View
    {
        $q = $request->input('q');
        if (is_array($q)) {
            $q = implode(' ', $q);
        }
        $q = (string) ($q ?? '');

        $posts = Post::with(['author', 'content'])->has('content')->visible()->search($q)->orderBy('id', 'desc')->paginate(config('blog.pagination'))->withQueryString();
        return view('app.'.config('blog.theme').'.posts.index')->with([
            'posts' => $posts,
            'q' => $q
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $lang
     * @param  string  $url
     * @return \Illuminate\View\View
     */
    public function show(string $lang, string $post): View
    {
        $post = Post::findOrFailByUrl($post);
        if ($post->isVisible() || (auth()->check() && (auth()->user()->id == $post->user_id || auth()->user()->hasRole('admin')))){
            return view('app.'.config('blog.theme').'.posts.show')->with([
                'post' => $post,
                'content' => $post->content()->firstOrFail()
            ]);
        }
        else abort(404);
    }
}
