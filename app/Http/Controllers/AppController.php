<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
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
        $postsCount = Post::has('content')->visible()->count();
        $posts = Post::with(['author', 'content'])->has('content')->visible()->get()->random($postsCount > $max ? $max : $postsCount);

        $categoriesCount = Category::has('content')->count();
        $categories = Category::with('content')->has('content')->get()->random($categoriesCount > $max ? $max : $categoriesCount);

        return view('app.index')->with([
            'posts' => $posts,
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
     * Handle the FAQ page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function faq(Request $request, string $lang): View
    {
        return view('app.faq');
    }

    /**
     * Handle the terms page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function terms(Request $request, string $lang): View
    {
        return view('app.terms');
    }

    /**
     * Handle the help page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function help(Request $request, string $lang): View
    {
        return view('app.help');
    }

    /**
     * Display the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\View\View
     */
    public function contact(Request $request, string $lang): View
    {
        return view('app.contact');
    }

    /**
     * Store a new contact submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, string $lang)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ip = $request->ip();

        $cacheKey = 'contact_submission_' . $ip;

        if (Cache::has($cacheKey)) {
            return back()->withErrors(['message' => __('contact.contact_submission_rate_limit')])->withInput();
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'ip_address' => $ip,
        ]);

        Cache::put($cacheKey, true, 300); // 5 minutes

        return back()->with('success', __('contact.contact_success'));
    }
}
