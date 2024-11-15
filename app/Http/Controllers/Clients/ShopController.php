<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function listByCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $query = Product::where('category_id', $id);


        $listProduct = $query->with('variants')->paginate(8);


        $listCategory = Category::withCount('products')->get();

        return view('clients.product', compact('listProduct', 'listCategory', 'category'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('variants')->latest()->take(10)->get();
        $banners = Banner::where('is_active', true)->get();

        $categories = Category::query()->get();
        return view('clients.index', compact('products', 'banners', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function blog()
    {
        $hotNews = News::where('status', 1)->orderBy('view_count', 'desc')->first();
        $relatedNews = News::where('status', 1)
            ->where('id', '!=', $hotNews->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $promotions = News::where('category_id', 1) 
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $popularNews = News::where('status', 1)
            ->orderBy('view_count', 'desc')
            // ->take(10)
            ->get()
            ->chunk(2); 

        $album = News::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $categories = NewsCategory::all()->map(function ($category) {
            $category->latestNews = $category->news()
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(2)
                ->get();
            return $category;
        });


        return view('clients.blog', compact('hotNews', 'relatedNews', 'album', 'categories', 'promotions', 'popularNews'));
    }

    public function blogDetail($slug)
    {
        
        $new = News::where('slug', $slug)->firstOrFail();
        $new->increment('view_count');

        $relatedNews = News::where('category_id', $new->category_id)
            ->where('id', '!=', $new->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $promotions = News::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('clients.blogDetail', compact('new', 'relatedNews', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
