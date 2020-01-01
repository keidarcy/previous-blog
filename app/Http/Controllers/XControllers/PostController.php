<?php

namespace App\Http\Controllers\XControllers;

use App\XModels\Tag;
use App\XModels\Post;
use Canvas\Topic;
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
        $posts = Post::where('complete', 1)
            ->orderByDesc('updated_at')
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
        $related_posts = Post::all()->where('complete', 1)->except($post->id)->random(6);
        $relates = [];
        foreach ($related_posts as $index => $related_post) {
            $relates[$index]['post'] = $related_post;
            $relates[$index]['post']['tags'] = $related_post->tags;
        }
        $data = [
            'post'   => $post,
            'tags'   => $post->tags,
            'relates'=> $relates,

        ];
        return  $data;
    }

    public function findPostsByTagOrTopic($slug)
    {
        $word = Tag::where('slug', $slug)->first();
        if (is_null($word)) {
            $word = Topic::where('slug', $slug)->first();
        }
        if (isset($word)) {
            foreach ($word->posts as $post) {
                if ($post->complete) {
                    $post['tags'] = $post->tags;
                    $data[] = $post;
                }
            }
            return ($data);
        } else {
            return null;
        }
    }

    public function getTopicsAndTagsNumber()
    {
        $tags = Post::with('tags')->get()->pluck('tags')->flatten()->pluck('name');
        $topics = Post::with('topic')->get()->pluck('topic')->flatten()->pluck('name');

        return ['topicName' => $topics->countBy()->keys(),
                'topicNumber' => $topics->countBy()->values(),
                'tagName' => $tags->countBy()->keys(),
                'tagNumber' => $tags->countBy()->values()];
    }

    public function getPostsForSearchApi()
    {
        $posts = Post::where('complete', 1)
        ->orderByDesc('created_at')
        ->select('title', 'slug', 'id')
        ->get();
        $tags = Tag::select('name', 'slug')->get();

        return ['posts'=>$posts,'tags'=>$tags];
    }

    public function tryGroup()
    {
        $posts = Post::latest()->get()->groupBy(function ($post) {
            if ($post->created_at->isToday()) {
                return 'today';
            } elseif ($post->created_at->isCurrentWeek()) {
                return 'this week';
            } elseif ($post->created_at->isCurrentMonth()) {
                return 'last week';
            } else {
                return 'old';
            }
        });
        return $posts;
    }
}
