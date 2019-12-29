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
        $posts = Post::all();
        $tags = [];
        foreach ($posts as $post) {
            foreach ($post->tags as $postTag) {
                $tags[] = $postTag->name;
            }
        }

        $topics = [];
        foreach ($posts as $post) {
            foreach ($post->topic as $postTopic) {
                $topics[] = $postTopic->name;
            }
        }

        $topicName = [];
        $topicNumber = [];
        foreach (array_count_values($topics) as $index => $topic) {
            $topicNumber[] = $topic;
            $topicName[] = $index;
        }

        $tagName = [];
        $tagNumber = [];
        foreach (array_count_values($tags) as $index => $tag) {
            $tagNumber[] = $tag;
            $tagName[] = $index;
        }

        return ['topicName' => $topicName,
                'topicNumber' => $topicNumber,
                'tagName' => $tagName,
                'tagNumber' => $tagNumber];
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
}
