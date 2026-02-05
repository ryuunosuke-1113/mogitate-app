<?php $__env->startSection('content'); ?>
<?php
  $img = $product->image_path
      ? asset('storage/'.$product->image_path)
      : asset('images/no-image.png');
?>

<a class="back-link" href="<?php echo e(route('products.index')); ?>">← 一覧に戻る</a>

<div class="product-show">
<?php
  $img = $product->image_path
    ? \Illuminate\Support\Facades\Storage::url($product->image_path)
    : asset('images/noimage.png');
?>

<a href="<?php echo e(route('products.edit', $product)); ?>">
  <img src="<?php echo e($img); ?>" alt="<?php echo e($product->name); ?>">
</a>
  <div class="product-show-info">
    <h1 class="product-title"><?php echo e($product->name); ?></h1>
    <div class="product-price">¥<?php echo e(number_format($product->price)); ?></div>

    <div class="product-season">
      <?php echo e(['spring'=>'春','summer'=>'夏','autumn'=>'秋','winter'=>'冬'][$product->season] ?? $product->season); ?>

    </div>

    <p class="product-description"><?php echo e($product->description); ?></p>

    <div class="product-actions">
      <a class="btn btn-secondary" href="<?php echo e(route('products.edit', $product)); ?>">編集</a>

      <form method="POST" action="<?php echo e(route('products.destroy', $product)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button class="btn btn-secondary" type="submit">削除</button>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/products/show.blade.php ENDPATH**/ ?>