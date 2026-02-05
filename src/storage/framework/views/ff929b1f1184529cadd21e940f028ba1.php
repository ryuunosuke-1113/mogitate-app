<?php $__env->startSection('content'); ?>
<div class="admin-edit-page">

  <a class="back-link" href="<?php echo e(route('admin.products.index')); ?>">← 一覧に戻る</a>

  <form class="edit-form" method="POST" action="<?php echo e(route('admin.products.update', $product)); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="edit-layout">

      
      <div class="edit-left">
        <div class="edit-image">
          <img
            src="<?php echo e($product->image_path ? asset('storage/'.$product->image_path) : asset('images/no-image.png')); ?>"
            alt="<?php echo e($product->name); ?>"
          >
        </div>

        <div class="file-row">
          <label class="file-btn">
            ファイルを選択
            <input type="file" name="image" hidden>
          </label>

          <div class="file-name">
            <?php echo e($product->image_path ? basename($product->image_path) : '未選択'); ?>

          </div>
        </div>
      </div>

      
      <div class="edit-right">
        <div class="form-row">
          <label class="form-label">商品名</label>
          <input class="form-input" type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>">
        </div>

        <div class="form-row">
          <label class="form-label">値段</label>
          <input class="form-input" type="number" name="price" value="<?php echo e(old('price', $product->price)); ?>">
        </div>

        <div class="form-row">
          <label class="form-label">季節</label>
          <div class="radio-row">
            <?php $season = old('season', $product->season); ?>
            <label><input type="radio" name="season" value="spring" <?php if($season==='spring'): echo 'checked'; endif; ?>> 春</label>
            <label><input type="radio" name="season" value="summer" <?php if($season==='summer'): echo 'checked'; endif; ?>> 夏</label>
            <label><input type="radio" name="season" value="autumn" <?php if($season==='autumn'): echo 'checked'; endif; ?>> 秋</label>
            <label><input type="radio" name="season" value="winter" <?php if($season==='winter'): echo 'checked'; endif; ?>> 冬</label>
          </div>
        </div>

        <div class="form-row">
          <label class="form-label">商品説明</label>
          <textarea class="form-textarea" name="description" rows="5"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>

        <div class="edit-actions">
          <a class="btn btn-secondary" href="<?php echo e(route('admin.products.index')); ?>">戻る</a>
          <button class="btn btn-primary" type="submit">変更を保存</button>

          <form class="delete-form" method="POST" action="<?php echo e(route('admin.products.destroy', $product)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="icon-danger" type="submit" aria-label="削除">🗑</button>
          </form>
        </div>
      </div>

    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>