<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'season' => 'required|in:spring,summer,autumn,winter',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index');
    }

    // ✅ 追加：編集画面
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // ✅ 追加：更新
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'season' => 'required|in:spring,summer,autumn,winter',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.show', $product);
    }
    public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index');
}
public function index(Request $request)
{
    $query = Product::query();

    // 検索（商品名）
    if ($request->filled('q')) {
        $q = trim($request->input('q'));
        $query->where('name', 'like', "%{$q}%");
    }

    // 並び替え（価格）
    if ($request->sort === 'price_asc') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort === 'price_desc') {
        $query->orderBy('price', 'desc');
    } else {
        $query->latest();
    }

    $products = $query->paginate(10)->withQueryString();

    return view('admin.products.index', [
        'products' => $products,
        'q' => $request->input('q'),
        'sort' => $request->input('sort'),
    ]);
}


}
