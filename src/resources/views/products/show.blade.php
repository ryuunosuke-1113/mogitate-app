@extends('layouts.app')

@section('content')
@php
  $img = $product->image_path
      ? asset('storage/'.$product->image_path)
      : asset('images/no-image.png');
@endphp

<a class="back-link" href="{{ route('products.index') }}">← 一覧に戻る</a>

<div class="product-show">
@php
  $img = $product->image_path
    ? \Illuminate\Support\Facades\Storage::url($product->image_path)
    : asset('images/noimage.png');
@endphp

<a href="{{ route('products.edit', $product) }}">
  <img src="{{ $img }}" alt="{{ $product->name }}">
</a>
  <div class="product-show-info">
    <h1 class="product-title">{{ $product->name }}</h1>
    <div class="product-price">¥{{ number_format($product->price) }}</div>

    <div class="product-season">
      {{ ['spring'=>'春','summer'=>'夏','autumn'=>'秋','winter'=>'冬'][$product->season] ?? $product->season }}
    </div>

    <p class="product-description">{{ $product->description }}</p>

    <div class="product-actions">
      <a class="btn btn-secondary" href="{{ route('products.edit', $product) }}">編集</a>

      <form method="POST" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-secondary" type="submit">削除</button>
      </form>
    </div>
  </div>
</div>
@endsection
