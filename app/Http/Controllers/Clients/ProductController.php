<?php


namespace App\Http\Controllers\Clients;



use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



class ProductController extends Controller
{
    // ... các phương thức ở đây ...
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search'); // Lấy từ khóa tìm kiếm
        $query = Product::query(); // Khởi tạo query cho sản phẩm

        // Xử lý lọc theo danh mục
        if ($request->has('category_ids')) {
            $categoryIds = $request->input('category_ids'); // Lấy danh sách category_id từ request
            $query->whereIn('category_id', $categoryIds); // Lọc theo nhiều danh mục
        }

        // Xử lý lọc theo giá
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



        // Xử lý sắp xếp
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
                    $query->orderBy('product_name', 'asc'); // Sắp xếp theo tên từ A-Z
                    break;
                case 'zToa':
                    $query->orderBy('product_name', 'desc'); // Sắp xếp theo tên từ Z-A
                    break;
            }
        }

        // Xử lý tìm kiếm
        if ($search) {
            $query->where('product_name', 'like', "%{$search}%");
        }

        // Lấy danh sách sản phẩm sau khi lọc và sắp xếp
        $listProduct = $query->with('variants')->paginate(8); // Phân trang với 6 sản phẩm mỗi trang

        // Lấy danh sách danh mục
        $listCategory = Category::withCount('products')->get();

        // dd($listProduct);


        return view('clients.product', compact('listProduct', 'listCategory'));
    }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($slug)
    {
        $products = Product::with('variants')->where('slug', $slug)->firstOrFail();
        $datas = Product::with('variants')->take(7)->get();
        return view('clients.productDetail', compact('products', 'datas'));
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
