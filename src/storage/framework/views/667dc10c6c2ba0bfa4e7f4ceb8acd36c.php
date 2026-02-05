<?php $__env->startSection('content'); ?>
<a class="back-link" href="<?php echo e(route('products.index')); ?>">← 一覧に戻る</a>

<?php if($errors->any()): ?>
  <div class="form-errors">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>


<form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data" class="admin-edit-page">
  <?php echo csrf_field(); ?>
  <?php echo $__env->make('products._form', ['product' => null, 'submitLabel' => '商品を追加'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/products/create.blade.php ENDPATH**/ ?>