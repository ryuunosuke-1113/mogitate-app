<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mogitate</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/mogitate.css')); ?>?v=<?php echo e(time()); ?>">
</head>
<body>
  <div class="container">
    <div class="header">
      <a class="logo" href="<?php echo e(route('products.index')); ?>">mogitate</a>
    </div>

    <?php if(session('success')): ?>
      <p style="color:#065f46; background:#ecfdf5; border:1px solid #a7f3d0; padding:10px 12px; border-radius:12px;">
        <?php echo e(session('success')); ?>

      </p>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
  </div>
</body>
</html>
<?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>