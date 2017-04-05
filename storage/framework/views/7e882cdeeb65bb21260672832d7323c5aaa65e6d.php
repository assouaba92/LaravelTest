<html>
    <head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    </head>

    <body>
        <?php $__env->startSection('sidebar'); ?>
        <?php echo $__env->yieldSection(); ?>

        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>