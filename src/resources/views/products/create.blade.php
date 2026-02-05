@extends('layouts.app')

@section('content')
<a class="back-link" href="{{ route('products.index') }}">← 一覧に戻る</a>

@if ($errors->any())
  <div class="form-errors">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="admin-edit-page">
  @csrf
  @include('products._form', ['product' => null, 'submitLabel' => '商品を追加'])
</form>
@endsection
