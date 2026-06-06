<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Condition;
use App\Http\Requests\ExhibitionRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function mypage(Request $request)
    {
        $user = auth()->user();
        $page = $request->page ?? 'sell';

        // 出品した商品
        $sellProducts = Product::where('user_id', $user->id)
            ->latest()
            ->get();

        // 購入商品
        $buyProducts = collect();
        return view('mypage.index', compact(
            'user',
            'page',
            'sellProducts',
            'buyProducts'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('products.create', compact('categories', 'conditions'));
    }

    public function store(ExhibitionRequest $request)
    {
        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'user_id' => auth()->id(),
            'condition_id' => $request->condition_id,
            'image_path' => $imagePath,
            'name' => $request->name,
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'price' => $request->price,
            'is_sold' => false,
        ]);

        $product->categories()->attach($request->categories);

        return redirect('/');
    }

    public function show($item_id)
    {
        $product = Product::with([
            'user',
            'condition',
            'categories',
        ])->findOrFail($item_id);

        return view('products.show', compact('product'));
    }
}