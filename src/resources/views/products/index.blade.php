@extends('layouts.app')

@section('content')
@php
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
@endphp

<div class="product-page">
  <div class="page">

    {{-- 左：検索・並び替え --}}
    <aside class="sidebar">
      <h2 class="sidebar__title">商品一覧</h2>

      <form method="GET" action="{{ route('products.index') }}" class="sidebar__form">
        {{-- キーワード --}}
        <input
          type="text"
          name="keyword"
          value="{{ $keyword }}"
          placeholder="商品名で検索"
          class="sidebar__input"
        >

        <button type="submit" class="sidebar__btn">検索</button>

        {{-- 並び替え（例） --}}
        <div class="sidebar__block">
          <p class="sidebar__label">価格順で表示</p>
          <select name="sort" class="sidebar__select" onchange="this.form.submit()">
            <option value="">選択してください</option>
            <option value="price_asc"  @selected($sort === 'price_asc')>安い順</option>
            <option value="price_desc" @selected($sort === 'price_desc')>高い順</option>
          </select>
        </div>
      </form>
    </aside>

    {{-- 右：一覧 --}}
    <main class="main">
      <div class="main__head">
        <a href="{{ route('products.create') }}" class="add-btn">＋ 商品を追加</a>
      </div>

      <div class="product-grid">
        @forelse ($products as $product)
          @php
            // storage保存（products/xxxx.jpg）想定
            $img = $product->image_path
              ? \Illuminate\Support\Facades\Storage::url($product->image_path)
              : asset('images/noimage.png');
          @endphp

          {{-- B：カード全体クリック → 編集画面へ --}}
          <a href="{{ route('products.edit', $product) }}" class="product-card-link">
            <article class="product-card">
              <div class="product-card__img">
                <img src="{{ $img }}" alt="{{ $product->name }}">
              </div>

              <div class="product-card__meta">
                <p class="product-card__name">{{ $product->name }}</p>
                <p class="product-card__price">¥{{ number_format($product->price) }}</p>
              </div>
            </article>
          </a>
        @empty
          <p class="empty">商品がありません</p>
        @endforelse
      </div>

      <div class="pager">
        {{ $products->withQueryString()->links('pagination::simple-default') }}
      </div>
    </main>

  </div>
</div>
@endsection
