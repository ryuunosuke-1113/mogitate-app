<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">管理ダッシュボード</h1>

    <div style="display:grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px;">
        <a href="<?php echo e(route('admin.products.create')); ?>"
           style="display:block; padding:16px; border-radius:12px; border:1px solid #e5e7eb; background:#fff;">
            <div style="font-weight:700;">商品を追加</div>
            <div style="font-size:12px; color:#6b7280; margin-top:6px;">新しい商品を登録します</div>
        </a>

        <a href="<?php echo e(route('products.index')); ?>"
           style="display:block; padding:16px; border-radius:12px; border:1px solid #e5e7eb; background:#fff;">
            <div style="font-weight:700;">公開ページ（商品一覧）</div>
            <div style="font-size:12px; color:#6b7280; margin-top:6px;">ユーザー画面を確認します</div>
        </a>

        <a href="<?php echo e(route('admin.products.index')); ?>" ...>
  管理：商品一覧
</a>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>