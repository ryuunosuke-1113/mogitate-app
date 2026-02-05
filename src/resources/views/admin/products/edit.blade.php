@extends('layouts.app')

@section('content')
<div class="admin-edit-page">

  <a class="back-link" href="{{ route('admin.products.index') }}">← 一覧に戻る</a>

  <form class="edit-form" method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="edit-layout">

      {{-- 左：画像 --}}
      <div class="edit-left">
        <div class="edit-image">
          <img
            src="{{ $product->image_path ? asset('storage/'.$product->image_path) : asset('images/no-image.png') }}"
            alt="{{ $product->name }}"
          >
        </div>

        <div class="file-row">
          <label class="file-btn">
            ファイルを選択
            <input type="file" name="image" hidden>
          </label>

          <div class="file-name">
            {{ $product->image_path ? basename($product->image_path) : '未選択' }}
          </div>
        </div>
      </div>

      {{-- 右：入力 --}}
      <div class="edit-right">
        <div class="form-row">
          <label class="form-label">商品名</label>
          <input class="form-input" type="text" name="name" value="{{ old('name', $product->name) }}">
        </div>

        <div class="form-row">
          <label class="form-label">値段</label>
          <input class="form-input" type="number" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <div class="form-row">
          <label class="form-label">季節</label>
          <div class="radio-row">
            @php $season = old('season', $product->season); @endphp
            <label><input type="radio" name="season" value="spring" @checked($season==='spring')> 春</label>
            <label><input type="radio" name="season" value="summer" @checked($season==='summer')> 夏</label>
            <label><input type="radio" name="season" value="autumn" @checked($season==='autumn')> 秋</label>
            <label><input type="radio" name="season" value="winter" @checked($season==='winter')> 冬</label>
          </div>
        </div>

        <div class="form-row">
          <label class="form-label">商品説明</label>
          <textarea class="form-textarea" name="description" rows="5">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="edit-actions">
          <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">戻る</a>
          <button class="btn btn-primary" type="submit">変更を保存</button>

          <form class="delete-form" method="POST" action="{{ route('admin.products.destroy', $product) }}">
            @csrf
            @method('DELETE')
            <button class="icon-danger" type="submit" aria-label="削除">🗑</button>
          </form>
        </div>
      </div>

    </div>
  </form>
</div>
@endsection
