<?php

$router->get('/', function (App\PostRepository $posts) {
    return 'HEJ';
    $post = $posts->find(1);
    return json_encode($post);
});
