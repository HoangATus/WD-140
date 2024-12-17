<?php


namespace App\Http\Controllers\Clients;



use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::query();

        if ($request->has('category_ids')) {
            $categoryIds = $request->input('category_ids');
            $query->whereIn('category_id', $categoryIds);
        }

        if ($request->has('price_range')) {
            $priceRanges = $request->input('price_range');
            $query->whereHas('variants', function ($q) use ($priceRanges) {
                $q->where(function ($query) use ($priceRanges) {
                    foreach ($priceRanges as $range) {
                        [$min, $max] = explode('-', $range);
                        $query->orWhereBetween('variant_sale_price', [(int)$min, (int)$max]);
                    }
                });
            });
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'low':
                    $query->select('products.*')
                        ->join('variants', 'products.id', '=', 'variants.product_id')
                        ->orderByRaw('MIN(variants.variant_sale_price) asc')
                        ->groupBy('products.id');
                    break;
                case 'high':
                    $query->select('products.*')
                        ->join('variants', 'products.id', '=', 'variants.product_id')
                        ->orderByRaw('MAX(variants.variant_sale_price) desc')
                        ->groupBy('products.id');
                    break;
                case 'aToz':
                    $query->orderBy('product_name', 'asc');
                    break;
                case 'zToa':
                    $query->orderBy('product_name', 'desc');
                    break;
            }
        }

        if ($search) {
            $query->where('product_name', 'like', "%{$search}%");
        }
        $listProduct = $query->with('variants')->paginate(8);

        $listCategory = Category::withCount('products')->get();


        return view('clients.product', compact('listProduct', 'listCategory'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $product = Product::with(['galleries', 'variants.color', 'variants.size', 'ratings'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(10)
            ->get();

        $variants = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'color' => $variant->color->name,
                'size' => $variant->size->attribute_size_name,
                'listed_price' => $variant->variant_listed_price,
                'sale_price' => $variant->variant_sale_price,
                'import_price' => $variant->variant_import_price,
                'quantity' => $variant->quantity ?? 0,
                'image' => Storage::url($variant->image),
            ];
        });

        return view('clients.productDetail', compact('product', 'relatedProducts', 'variants'));
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
