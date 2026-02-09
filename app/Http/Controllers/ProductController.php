<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'exists:categories,id',
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'condition' => ['required', Rule::in(['used','like_new','new'])],
            'size' => ['required'],
            'brand' => ['string'],
            'stock' => ['numeric'],
            'status' => ['string', Rule::in(['draft', 'active', 'sold'])],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // if ($request->hasFile('productImage'))
        // {
        //     $validated['productImage'] = $request->file('productImage')->store('products', 'public');
        // }
        
        $product =  Product::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'condition' => $validated['condition'],
            'brand' => $validated['brand'],
            'stock' => $validated['stock'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('products.index')->with('success', 'Berhasil menambahkan produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view ('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
