@extends('layouts.app')

@section('content')
<div class="admin-edit-page">

  {{-- ✅ 削除だけ残す（右下固定にする） --}}
  <form
    action="{{ route('products.destroy', $product) }}"
    method="POST"
    onsubmit="return confirm('本当に削除しますか？');"
    class="delete-fab"
  >
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-trash" aria-label="削除">🗑</button>
  </form>

  <form
    id="product-update"
    action="{{ route('products.update', $product) }}"
    method="POST"
    enctype="multipart/form-data"
    class="admin-edit-page__form"
  >
    @csrf
    @method('PUT')

    @if ($errors->any())
      <div class="form-errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- ✅ submitLabel を渡す（下部ボタン表示用） --}}
    @include('products._form', [
      'product' => $product,
      'submitLabel' => '変更を保存',
      'backUrl' => route('products.index'),
    ])
  </form>
</div>
@endsection
