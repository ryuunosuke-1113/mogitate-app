<?php $__env->startSection('content'); ?>
<div class="admin-edit-page">

  
  <form
    action="<?php echo e(route('products.destroy', $product)); ?>"
    method="POST"
    onsubmit="return confirm('本当に削除しますか？');"
    class="delete-fab"
  >
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn-trash" aria-label="削除">🗑</button>
  </form>

  <form
    id="product-update"
    action="<?php echo e(route('products.update', $product)); ?>"
    method="POST"
    enctype="multipart/form-data"
    class="admin-edit-page__form"
  >
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <?php if($errors->any()): ?>
      <div class="form-errors">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    
    <?php echo $__env->make('products._form', [
      'product' => $product,
      'submitLabel' => '変更を保存',
      'backUrl' => route('products.index'),
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/products/edit.blade.php ENDPATH**/ ?>