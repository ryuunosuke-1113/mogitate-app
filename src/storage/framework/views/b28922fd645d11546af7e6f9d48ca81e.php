<?php $__env->startSection('content'); ?>
  <h1 style="margin-bottom:16px;">商品登録</h1>

  <form method="POST"
        action="<?php echo e(route('admin.products.store')); ?>"
        enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    
    <div style="margin-bottom:12px;">
      <label>商品名 <span style="color:red;">必須</span></label><br>
      <input type="text" name="name" value="<?php echo e(old('name')); ?>" style="width:100%; padding:8px;">
      <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p style="color:red;"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div style="margin-bottom:12px;">
      <label>価格 <span style="color:red;">必須</span></label><br>
      <input type="number" name="price" value="<?php echo e(old('price')); ?>" style="width:100%; padding:8px;">
      <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p style="color:red;"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div style="margin-bottom:12px;">
      <label>商品画像 <span style="color:red;">必須</span></label><br>
      <input type="file" name="image">
      <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p style="color:red;"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div style="margin-bottom:12px;">
      <label>季節 <span style="color:red;">必須</span></label><br>
      <?php $__currentLoopData = ['spring'=>'春','summer'=>'夏','autumn'=>'秋','winter'=>'冬']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label>
          <input type="radio" name="season" value="<?php echo e($key); ?>"
            <?php echo e(old('season') === $key ? 'checked' : ''); ?>>
          <?php echo e($label); ?>

        </label>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php $__errorArgs = ['season'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p style="color:red;"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div style="margin-bottom:16px;">
      <label>商品説明 <span style="color:red;">必須</span></label><br>
      <textarea name="description" style="width:100%; height:120px;"><?php echo e(old('description')); ?></textarea>
      <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p style="color:red;"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit" style="padding:8px 16px;">
      登録
    </button>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/products/create.blade.php ENDPATH**/ ?>