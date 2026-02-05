@php
  // DB: products/xxxx.jpg（storage保存）に対応
  $img = (!empty($product?->image_path))
      ? \Illuminate\Support\Facades\Storage::url($product->image_path)
      : asset('images/no-image.png');

  $season = old('season', $product->season ?? 'summer');
@endphp

<div class="edit-layout">

  <div class="edit-left">
    <div class="edit-image">
      <img src="{{ $img }}" alt="{{ old('name', $product->name ?? '商品') }}">
    </div>

    <div class="file-row">
      <label class="file-btn">
        ファイルを選択
        <input type="file" name="image" hidden>
        @error('image')
  <p class="field-error">{{ $message }}</p>
@enderror

      </label>

      <div class="file-name">
        {{ !empty($product?->image_path) ? basename($product->image_path) : '未選択' }}
      </div>
    </div>
  </div>

  <div class="edit-right">
    <div class="form-row">
      <label class="form-label">商品名</label>
      <input class="form-input" type="text" name="name" value="{{ old('name', $product->name ?? '') }}">
      @error('name')
  <p class="field-error">{{ $message }}</p>
@enderror
    </div>

    <div class="form-row">
      <label class="form-label">値段</label>
      <input class="form-input" type="number" name="price" value="{{ old('price', $product->price ?? 0) }}">
      @error('price')
  <p class="field-error">{{ $message }}</p>
@enderror

    </div>

<div class="form-row">
  <label class="form-label">季節</label>

  @php
    $selected = old('seasons', $product?->seasons?->pluck('id')->toArray() ?? []);
  @endphp

  <div class="checkbox-row">
    @foreach ($seasons as $s)
      <label>
        <input type="checkbox" name="seasons[]" value="{{ $s->id }}"
          @checked(in_array($s->id, $selected))>
        {{ $s->name }}
      </label>
    @endforeach
  </div>

  @error('seasons')
    <p class="field-error">{{ $message }}</p>
  @enderror
</div>

    <div class="form-row">
      <label class="form-label">商品説明</label>
      <textarea class="form-textarea" name="description" rows="6">{{ old('description', $product->description ?? '') }}</textarea>
      @error('description')
  <p class="field-error">{{ $message }}</p>
@enderror

    </div>
  </div>

</div>

@php
  $submitLabel = $submitLabel ?? null;
  $backUrl = $backUrl ?? route('products.index');
@endphp

@if ($submitLabel)
  <div class="edit-actions">
    <a class="btn-back-bottom" href="{{ $backUrl }}">戻る</a>
    <button class="btn-save-bottom" type="submit">{{ $submitLabel }}</button>
  </div>
@endif

