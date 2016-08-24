<!DOCTYPE html>
<html>
    <head>
        <title><?php echo e($post->title); ?></title>
    </head>
    <body>
        <h1><?php echo e($post->title); ?></h1>
        <?php echo $post->body; ?>

    </body>
</html>
