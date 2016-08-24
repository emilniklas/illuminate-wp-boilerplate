<?php

require_once(__DIR__.'/../vendor/autoload.php');

$container = new Illuminate\Container\Container;

$router = new Illuminate\Routing\Router(
    new Illuminate\Events\Dispatcher($container),
    $container
);

$container->resolving(App\WordPress\UsesWordPress::class, function () {
    require_once(__DIR__.'/../wordpress/wp-load.php');
});

$container->bind(
    App\PostRepository::class,
    App\WordPress\WordPressPostRepository::class
);

$blade = new Philo\Blade\Blade(
    __DIR__.'/views',
    __DIR__.'/../.blade-cache'
);
$container->instance(
    Illuminate\Contracts\View\Factory::class,
    $blade->view()
);

require(__DIR__.'/Http/routes.php');

$request = Illuminate\Http\Request::capture();
$response = $router->dispatch($request);
$response->send();
