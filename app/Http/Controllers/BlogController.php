<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
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
    public function index(Request $request)
    {
        $tag    = $request->get('tag');
        $data   = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.index';
        return view($layout, $data);
    }

    /**
     * Show a blog post entry
     *
     * @param $slug
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag'));
    }


}
