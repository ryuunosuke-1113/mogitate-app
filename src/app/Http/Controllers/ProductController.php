<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Season;

class ProductController extends Controller
{
public function index(Request $request)
{
    $q = $request->query('q');
    $sort = $request->query('sort');

    $query = Product::query()->with('seasons'); // ← ここで with を付ける

    if ($q) {
        $query->where('name', 'like', "%{$q}%");
    }

    // 並び替え
    if ($sort === 'price_asc') {
        $query->orderBy('price', 'asc');
    } elseif ($sort === 'price_desc') {
        $query->orderBy('price', 'desc');
    } else {
        $query->latest(); // created_at desc
    }

    $products = $query->paginate(6)->withQueryString(); // ← ここが本体

    return view('products.index', compact('products'));
}

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

public function create()
{
  return view('products.create', [
    'seasons' => Season::all(),
  ]);
}

public function store(Request $request)
{
  $validated = $request->validate([
    'name' => ['required'],
    'price' => ['required','numeric','max:10000'],
    'description' => ['required','max:120'],
    'image' => ['required','image'],
    'seasons'   => ['required','array'],
    'seasons.*' => ['integer','exists:seasons,id'],
  ]);

  $path = $request->file('image')->store('products', 'public');

  $product = Product::create([
    'name' => $validated['name'],
    'price' => $validated['price'],
    'description' => $validated['description'],
    'image_path' => $path,
  ]);

  $product->seasons()->sync($validated['seasons']);

  return redirect()->route('products.index');
}

public function edit(Product $product)
{
  $product->load('seasons');

  return view('products.edit', [
    'product' => $product,
    'seasons' => Season::all(),
  ]);
}

public function update(Request $request, Product $product)
{
  $validated = $request->validate([
    'name' => ['required'],
    'price' => ['required','numeric','max:10000'],
    'description' => ['required','max:120'],
    'image' => ['nullable','image'],
    'seasons'   => ['required','array'],
    'seasons.*' => ['integer','exists:seasons,id'],
  ]);

  if ($request->hasFile('image')) {
    $path = $request->file('image')->store('products', 'public');
    $product->image_path = $path;
  }

  $product->name = $validated['name'];
  $product->price = $validated['price'];
  $product->description = $validated['description'];
  $product->save();

  $product->seasons()->sync($validated['seasons']);

  return redirect()->route('products.index');
}

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', '商品を削除しました。');
    }
}
