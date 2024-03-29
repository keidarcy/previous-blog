<?php

namespace App\XModels;

use Canvas\Post as Canvas_Post;

class Post extends Canvas_Post
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
