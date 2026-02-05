@extends('layouts.app')

@section('content')
  <h1 style="margin-bottom:16px;">商品登録</h1>

  <form method="POST"
        action="{{ route('admin.products.store') }}"
        enctype="multipart/form-data">
    @csrf

    {{-- 商品名 --}}
    <div style="margin-bottom:12px;">
      <label>商品名 <span style="color:red;">必須</span></label><br>
      <input type="text" name="name" value="{{ old('name') }}" style="width:100%; padding:8px;">
      @error('name')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 価格 --}}
    <div style="margin-bottom:12px;">
      <label>価格 <span style="color:red;">必須</span></label><br>
      <input type="number" name="price" value="{{ old('price') }}" style="width:100%; padding:8px;">
      @error('price')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 商品画像 --}}
    <div style="margin-bottom:12px;">
      <label>商品画像 <span style="color:red;">必須</span></label><br>
      <input type="file" name="image">
      @error('image')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 季節 --}}
    <div style="margin-bottom:12px;">
      <label>季節 <span style="color:red;">必須</span></label><br>
      @foreach (['spring'=>'春','summer'=>'夏','autumn'=>'秋','winter'=>'冬'] as $key => $label)
        <label>
          <input type="radio" name="season" value="{{ $key }}"
            {{ old('season') === $key ? 'checked' : '' }}>
          {{ $label }}
        </label>
      @endforeach
      @error('season')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 商品説明 --}}
    <div style="margin-bottom:16px;">
      <label>商品説明 <span style="color:red;">必須</span></label><br>
      <textarea name="description" style="width:100%; height:120px;">{{ old('description') }}</textarea>
      @error('description')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit" style="padding:8px 16px;">
      登録
    </button>
  </form>
@endsection
