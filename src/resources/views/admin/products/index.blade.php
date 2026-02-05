@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex items-center justify-between mb-5">
        <h1 class="text-2xl font-bold">管理：商品一覧</h1>

        <a class="btn btn-primary" href="{{ route('admin.products.create') }}">
            ＋ 商品を追加
        </a>
    </div>

    <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4" style="display:flex; gap:8px; flex-wrap:wrap;">
        <input
            type="text"
            name="q"
            value="{{ $q }}"
            placeholder="商品名で検索"
            class="border rounded px-3 py-2"
            style="min-width:220px;"
        >

        <select name="sort" class="border rounded px-3 py-2">
            <option value="">並び替え（新しい順）</option>
            <option value="price_asc"  @selected($sort === 'price_asc')>価格：安い順</option>
            <option value="price_desc" @selected($sort === 'price_desc')>価格：高い順</option>
        </select>

        <button class="btn btn-secondary" type="submit">適用</button>

        <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">クリア</a>
    </form>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full" style="border-collapse:collapse;">
            <thead>
                <tr style="background:#f3f4f6;">
                    <th style="text-align:left; padding:10px;">ID</th>
                    <th style="text-align:left; padding:10px;">商品名</th>
                    <th style="text-align:right; padding:10px;">価格</th>
                    <th style="text-align:left; padding:10px;">季節</th>
                    <th style="text-align:left; padding:10px;">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr style="border-top:1px solid #e5e7eb;">
                        <td style="padding:10px;">{{ $product->id }}</td>
                        <td style="padding:10px;">
                            <a href="{{ route('products.show', $product) }}" style="text-decoration:underline;">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td style="padding:10px; text-align:right;">
                            ¥{{ number_format($product->price) }}
                        </td>
                        <td style="padding:10px;">
                            {{ ucfirst($product->season) }}
                        </td>
                        <td style="padding:10px;">
                            <div style="display:flex; gap:8px; align-items:center;">
                                <a class="btn btn-secondary" href="{{ route('admin.products.edit', $product) }}">
                                    編集
                                </a>

                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                      onsubmit="return confirm('本当に削除しますか？')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-secondary" type="submit">
                                        削除
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding:14px; color:#6b7280;">
                            該当する商品がありません。
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
