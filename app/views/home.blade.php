<!DOCTYPE html>
<html>
    <head>
        <title>{{ $post->title }}</title>
    </head>
    <body>
        <h1>{{ $post->title }}</h1>
        {!! $post->body !!}
    </body>
</html>
