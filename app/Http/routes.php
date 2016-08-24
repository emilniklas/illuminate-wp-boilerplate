<?php

$router->get('/', function (App\PostRepository $posts) {
    $post = $posts->find(1);
    return json_encode($post);
});
