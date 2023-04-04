<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title>blogyolnews</title>
    </head>

    <body>
        <h1> Voici une liste d'article </h1>
        <ul>
            <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e($articles['id']); ?>" > <?php echo e($articles['title']); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </body>
</html><?php /**PATH C:\Users\Elias\Documents\GitHub\Yol-ide\yolide laravel\resources\views/article.blade.php ENDPATH**/ ?>