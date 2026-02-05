<?php $__env->startSection('content'); ?>
<?php
  // 入力値を保持（Controllerで渡してなくても request() で拾える）
  $keyword = request('keyword', '');
  $sort    = request('sort', '');

  // 季節の表示（必要なら使う）
  $seasonLabel = function($season) {
    return match((string)$season) {
      '1' => '春',
      '2' => '夏',
      '3' => '秋',
      '4' => '冬',
      default => '',
    };
  };
?>

<div class="product-page">
  <div class="page">

    
    <aside class="sidebar">
      <h2 class="sidebar__title">商品一覧</h2>

      <form method="GET" action="<?php echo e(route('products.index')); ?>" class="sidebar__form">
        
        <input
          type="text"
          name="keyword"
          value="<?php echo e($keyword); ?>"
          placeholder="商品名で検索"
          class="sidebar__input"
        >

        <button type="submit" class="sidebar__btn">検索</button>

        
        <div class="sidebar__block">
          <p class="sidebar__label">価格順で表示</p>
          <select name="sort" class="sidebar__select" onchange="this.form.submit()">
            <option value="">選択してください</option>
            <option value="price_asc"  <?php if($sort === 'price_asc'): echo 'selected'; endif; ?>>安い順</option>
            <option value="price_desc" <?php if($sort === 'price_desc'): echo 'selected'; endif; ?>>高い順</option>
          </select>
        </div>
      </form>
    </aside>

    
    <main class="main">
      <div class="main__head">
        <a href="<?php echo e(route('products.create')); ?>" class="add-btn">＋ 商品を追加</a>
      </div>

      <div class="product-grid">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <?php
            // storage保存（products/xxxx.jpg）想定
            $img = $product->image_path
              ? \Illuminate\Support\Facades\Storage::url($product->image_path)
              : asset('images/noimage.png');
          ?>

          
          <a href="<?php echo e(route('products.edit', $product)); ?>" class="product-card-link">
            <article class="product-card">
              <div class="product-card__img">
                <img src="<?php echo e($img); ?>" alt="<?php echo e($product->name); ?>">
              </div>

              <div class="product-card__meta">
                <p class="product-card__name"><?php echo e($product->name); ?></p>
                <p class="product-card__price">¥<?php echo e(number_format($product->price)); ?></p>
              </div>
            </article>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="empty">商品がありません</p>
        <?php endif; ?>
      </div>

      <div class="pager">
        <?php echo e($products->withQueryString()->links('pagination::simple-default')); ?>

      </div>
    </main>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/products/index.blade.php ENDPATH**/ ?>