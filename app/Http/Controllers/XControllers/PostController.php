<?php

namespace App\Http\Controllers\XControllers;

use Canvas\Tag;
use Canvas\Post;
use Canvas\Topic;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * api get all posts data with json list.
     *
     * @return array
     *
     */
    public function list()
    {
        $posts = Post::select('id', 'title', 'summary', 'slug', 'body', 'published_at', 'featured_image', 'created_at')
            ->orderByDesc('created_at')
            ->get();
        $data = [];
        foreach ($posts as $post) {
            $post['slug'] = '/show/'. $post->slug;
            $post['tags'] = $post->tags;
            $data[] = $post;
        }
        return ($data);
    }

    /**
     * Show the posts index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'body', 'published_at', 'featured_image', 'created_at')
            ->orderByDesc('created_at')
            ->get();

        return view('frontend.pages.blog');
    }

    /**
     * show the given post data with slug.
     *
     * @param string $slug
     * @return array
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post = [
            'post'   => $post,
            'meta'   => $post->meta,
            'tags'   => $post->tags,
            'topics' => $post->topics,
        ];
        return  view('frontend.pages.show', compact('post'));
    }
}
