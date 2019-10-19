<?php

namespace App\Http\Controllers\XControllers;

use App\XModels\Tag;
use App\XModels\Post;
use Canvas\Topic;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
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
        $posts = Post::where('complete', 1)
            ->orderByDesc('created_at')
            ->get();
        $data = [];
        foreach ($posts as $post) {
            $post['tags'] = $post->tags;
            $data[] = $post;
        }
        return ($data);
    }

    /**
     * show the given post data with slug.
     *
     * @param string $slug
     * @return array
     */
    public function show(Post $post)
    {
        $data = [
            'post'   => $post,
            'tags'   => $post->tags,
            'related'=> Post::all()->except($post->id)->random(3)
        ];
        return  view('frontend.pages.show', compact('data'));
    }

    public function findPostsByTagOrTopic($slug)
    {
        $word = Tag::where('slug', $slug)->first();
        if (is_null($word)) {
            $word = Topic::where('slug', $slug)->first();
        }
        if (isset($word)) {
            foreach ($word->posts as $post) {
                $post['tags'] = $post->tags;
                $data[] = $post;
            }
            return ($data);
        } else {
            return null;
        }
    }
}
