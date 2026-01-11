<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        $products = Product::query()
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('home', compact('products', 'categories'));
    }
}
