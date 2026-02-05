<?php
  // DB: products/xxxx.jpg（storage保存）に対応
  $img = (!empty($product?->image_path))
      ? \Illuminate\Support\Facades\Storage::url($product->image_path)
      : asset('images/no-image.png');

  $season = old('season', $product->season ?? 'summer');
?>

<div class="edit-layout">

  <div class="edit-left">
    <div class="edit-image">
      <img src="<?php echo e($img); ?>" alt="<?php echo e(old('name', $product->name ?? '商品')); ?>">
    </div>

    <div class="file-row">
      <label class="file-btn">
        ファイルを選択
        <input type="file" name="image" hidden>
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <p class="field-error"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      </label>

      <div class="file-name">
        <?php echo e(!empty($product?->image_path) ? basename($product->image_path) : '未選択'); ?>

      </div>
    </div>
  </div>

  <div class="edit-right">
    <div class="form-row">
      <label class="form-label">商品名</label>
      <input class="form-input" type="text" name="name" value="<?php echo e(old('name', $product->name ?? '')); ?>">
      <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <p class="field-error"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-row">
      <label class="form-label">値段</label>
      <input class="form-input" type="number" name="price" value="<?php echo e(old('price', $product->price ?? 0)); ?>">
      <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <p class="field-error"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>

<div class="form-row">
  <label class="form-label">季節</label>

  <?php
    $selected = old('seasons', $product?->seasons?->pluck('id')->toArray() ?? []);
  ?>

  <div class="checkbox-row">
    <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <label>
        <input type="checkbox" name="seasons[]" value="<?php echo e($s->id); ?>"
          <?php if(in_array($s->id, $selected)): echo 'checked'; endif; ?>>
        <?php echo e($s->name); ?>

      </label>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <?php $__errorArgs = ['seasons'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="field-error"><?php echo e($message); ?></p>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

    <div class="form-row">
      <label class="form-label">商品説明</label>
      <textarea class="form-textarea" name="description" rows="6"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
      <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <p class="field-error"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>
  </div>

</div>

<?php
  $submitLabel = $submitLabel ?? null;
  $backUrl = $backUrl ?? route('products.index');
?>

<?php if($submitLabel): ?>
  <div class="edit-actions">
    <a class="btn-back-bottom" href="<?php echo e($backUrl); ?>">戻る</a>
    <button class="btn-save-bottom" type="submit"><?php echo e($submitLabel); ?></button>
  </div>
<?php endif; ?>

<?php /**PATH /var/www/resources/views/products/_form.blade.php ENDPATH**/ ?>