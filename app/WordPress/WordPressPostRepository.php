<?php

namespace App\WordPress;

use App\PostRepository;
use App\Post;

class WordPressPostRepository implements PostRepository, UsesWordPress
{
    public function find($id)
    {
        $wpPost = \get_post($id);

        $post = new Post;
        $post->id = $wpPost->ID;
        $post->title = $wpPost->post_title;
        $post->body = \apply_filters('the_content', $wpPost->post_content);

        return $post;
    }
}
