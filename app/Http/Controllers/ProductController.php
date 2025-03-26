<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LowStockNotification;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $query = Product::with('category');
        
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('products.index', compact('products', 'categories', 'categoryId'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        $product = Product::create($data);
        
        if ($product->stock < 5) {
            Mail::to('admin@example.com')->send(new LowStockNotification($product));
        }
        
        return redirect()->route('products.index')
            ->with('success', __('Product created successfully'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        $oldStock = $product->stock;
        $product->update($data);
        
        if ($oldStock >= 5 && $product->stock < 5) {
            Mail::to('admin@example.com')->send(new LowStockNotification($product));
        }
        
        return redirect()->route('products.index')
            ->with('success', __('Product updated successfully'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route('products.index')
            ->with('success', __('Product deleted successfully'));
    }
}
