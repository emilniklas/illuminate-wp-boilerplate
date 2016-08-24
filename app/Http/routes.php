<?php

$router->get('/', function (App\PostRepository $posts, Illuminate\Contracts\View\Factory $view) {
    $post = $posts->find(1);
    return $view->make('home', compact('post'));
});
