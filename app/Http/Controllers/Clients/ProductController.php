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
        $query = Product::query(); // Khởi tạo query cho sản phẩm
    
        // Xử lý lọc theo danh mục
        if ($request->has('category_ids')) {
            $categoryIds = $request->input('category_ids'); // Lấy danh sách category_id từ request
            $query->whereIn('category_id', $categoryIds); // Lọc theo nhiều danh mục
        }
    
        // Xử lý sắp xếp
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'low':
                    $query->orderBy('price', 'asc'); // Giá từ thấp tới cao
                    break;
                case 'high':
                    $query->orderBy('price', 'desc'); // Giá từ cao tới thấp
                    break;
                case 'aToz':
                    $query->orderBy('product_name', 'asc'); // Tên từ A-Z
                    break;
                case 'zToa':
                    $query->orderBy('product_name', 'desc'); // Tên từ Z-A
                    break;
            }
        }
    
        // Lấy danh sách sản phẩm sau khi lọc và sắp xếp
        $listProduct = $query->get();
        $listCategory = Category::withCount('products')->get(); // Lấy danh sách danh mục
    
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
