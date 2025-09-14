<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subscribers = NewsletterSubscriber::orderBy('subscribed_at', 'desc')->paginate(15);

        return view('admin.newsletters.index', compact('subscribers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterSubscriber  $subscriber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.newsletters.index')
            ->with('success', 'Subscriber removed successfully.');
    }
}