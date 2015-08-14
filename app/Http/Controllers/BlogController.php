<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display all blog blog
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }

    /**
     * Show a blog post entry
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.showPost', compact('post'));
    }


}
