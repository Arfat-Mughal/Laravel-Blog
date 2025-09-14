<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;

class ArticlesPublishment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Article::whereNotNull('publish_at')->where('publish_at', '>=', now())->update([
            'publish_at' => null,
            'is_visible' => true
        ]);
        return $next($request);
    }
}
