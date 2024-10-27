<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\AttributeSize;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Variant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    const PATH_VIEW = 'admins.products.';
    const PATH_UPLOAD = 'products';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products and pass them to the view
        $products = Product::query()->with('category', 'variants')->latest()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = AttributeSize::query()->pluck('attribute_size_name', 'id')->all();
        $colors = Color::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'colors', 'sizes'));
    }

    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        // dd($request->variants);
        $data = $request->except(['variants', 'product_image_url', 'product_galleries']);
        $data['product_code'] = $request->product_code;
        // $data['product_code'] = $request->input('product_code');
        $data['slug'] = Str::slug($data['product_name'] . '-' . $data['product_code']);
        if (!empty($request->hasFile('product_image_url'))) {
            $data['product_image_url'] = Storage::put('products', $request->file('product_image_url'));
        }
        try {
            DB::beginTransaction();
            $product = Product::query()->create($data);

            if (!is_null($request->variants) && is_array($request->variants)) {
                foreach ($request->variants as $item) {
                    Variant::query()->create([
                        'attribute_size_id' => $item['attribute_size_name'],
                        'attribute_color_id' => $item['name'],
                        'variant_listed_price' => $item['variant_listed_price'] ?? 0,
                        'variant_sale_price' => $item['variant_sale_price'] ?? 0,
                        'variant_import_price' => $item['variant_import_price'] ?? 0,
                        'image' => $item['image'] ? Storage::put('variants', $item['image']) : '',
                        'quantity' => $item['quantity'] ?? 0,
                        'product_id' => $product->id,
                    ]);
                }
            }

            // Kiểm tra nếu product_galleries không phải là null và là mảng
            if (!is_null($request->product_galleries) && is_array($request->product_galleries)) {
                foreach ($request->product_galleries as $item) {
                    ProductGallery::query()->create([
                        'image' => Storage::put('product_galleries', $item),
                        'product_id' => $product->id,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admins.products.index')->with('message', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            // thực hiện xóa ảnh trong storage
            return back();
        }
    }
    public function show(Product $product)
    {
        //
        $product->load(['variants.size', 'variants.color', 'galleries']);
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = AttributeSize::query()->pluck('attribute_size_name', 'id')->all();
        $colors = Color::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories', 'sizes', 'colors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = AttributeSize::query()->pluck('attribute_size_name', 'id')->all();
        $colors = Color::query()->pluck('name', 'id')->all();
        $variants = $product->variants;
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories', 'colors', 'sizes', 'variants'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateProductRequest $request, Product $product)
    // {
    //     // dd($request->all());
    //     $data = $request->except(['variants', 'product_image_url', 'product_galleries']);
    //     $data['product_code'] = $request->product_code;
    //     $data['slug'] = Str::slug($data['product_name'] . '-' . $data['product_code']);

    //     if ($request->hasFile('product_image_url')) {
    //         if ($product->product_image_url) {
    //             Storage::delete($product->product_image_url);
    //         }
    //         $data['product_image_url'] = Storage::put('products', $request->file('product_image_url'));
    //     }

    //     try {
    //         DB::beginTransaction();
    //         $product->update($data);

    //         if (!is_null($request->variants) && is_array($request->variants)) {
    //             foreach ($request->variants as $item) {
    //                 if (isset($item['id'])) {
    //                     $variant = Variant::find($item['id']);
    //                     if ($variant) {
    //                         $variantData = [
    //                             'attribute_size_id' => $item['attribute_size_name'],
    //                             'attribute_color_id' => $item['name'],
    //                             'variant_listed_price' => $item['variant_listed_price'] ?? 0,
    //                             'variant_sale_price' => $item['variant_sale_price'] ?? 0,
    //                             'variant_import_price' => $item['variant_import_price'] ?? 0,
    //                             'quantity' => $item['quantity'] ?? 0,
    //                         ];

    //                         // Kiểm tra và cập nhật ảnh cho variant nếu có
    //                         if (!empty($item['image'])) {
    //                             if ($variant->image) {
    //                                 Storage::delete($variant->image);
    //                             }
    //                             $variantData['image'] = Storage::put('variants', $item['image']);
    //                         }

    //                         $variant->update($variantData);
    //                     }
    //                 }
    //             }
    //         }

    //         //abum ảnh
    //         if ($request->has('product_galleries')) {
    //             $Galleries = ProductGallery::where('product_id', $product->id)->get();
    //             foreach ($Galleries as $gallery) {
    //                 if (Storage::exists($gallery->image)) {
    //                     Storage::delete($gallery->image);
    //                 }
    //                 $gallery->delete();
    //             }
    //             foreach ($request->product_galleries as $item) {
    //                 $imagePath = Storage::put('product_galleries', $item);  // Store the new image
    //                 ProductGallery::create([
    //                     'image' => $imagePath,
    //                     'product_id' => $product->id,
    //                 ]);
    //             }
    //         }

    //         DB::commit();
    //         return redirect()->route('admins.products.index')->with('message', 'Cập nhật thành công');
    //     } catch (\Exception $exception) {
    //         DB::rollBack();
    //         dd($exception->getMessage());
    //         return back()->with('error', 'Cập nhật không thành công.');
    //     }
    // }


    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->all());
        // dd($product->variants);
        $data = $request->except(['variants', 'product_image_url', 'product_galleries']);
        $data['product_code'] = $request->product_code;
        $data['slug'] = Str::slug($data['product_name'] . '-' . $data['product_code']);

        if ($request->hasFile('product_image_url')) {
            if ($product->product_image_url) {
                Storage::delete($product->product_image_url);
            }
            $data['product_image_url'] = Storage::put('products', $request->file('product_image_url'));
        }

        try {
            DB::beginTransaction();
            $product->update($data);

            if (!is_null($request->variants) && is_array($request->variants)) {
                $variantIds = [];
                foreach ($request->variants as $item) {
                    if (isset($item['id'])) {
                        $variant = Variant::find($item['id']);
                        if ($variant) {
                            $variantData = [
                                'attribute_size_id' => $item['attribute_size_name'],
                                'attribute_color_id' => $item['name'],
                                'variant_listed_price' => $item['variant_listed_price'] ?? 0,
                                'variant_sale_price' => $item['variant_sale_price'] ?? 0,
                                'variant_import_price' => $item['variant_import_price'] ?? 0,
                                'quantity' => $item['quantity'] ?? 0,
                            ];

                            if (isset($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                                if ($variant->image) {
                                    Storage::delete($variant->image);
                                }
                                $variantData['image'] = Storage::put('variants', $item['image']);
                            } else {
                                $variantData['image'] = $variant->image;
                            }

                            $variant->update($variantData);
                            $variantIds[] = $variant->id;
                        }
                    } else {
                        $newVariantData = [
                            'product_id' => $product->id,
                            'attribute_size_id' => $item['attribute_size_name'],
                            'attribute_color_id' => $item['name'],
                            'variant_listed_price' => $item['variant_listed_price'] ?? 0,
                            'variant_sale_price' => $item['variant_sale_price'] ?? 0,
                            'variant_import_price' => $item['variant_import_price'] ?? 0,
                            'quantity' => $item['quantity'] ?? 0,
                        ];

                        if (!empty($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                            $newVariantData['image'] = Storage::put('variants', $item['image']);
                        }

                        $newVariant = Variant::create($newVariantData);
                        $variantIds[] = $newVariant->id;
                    }
                }

                $product->variants()->whereNotIn('id', $variantIds)->delete();
            }

            // abum ảnh
            if ($request->has('product_galleries')) {
                foreach ($request->product_galleries as $item) {
                    ProductGallery::create([
                        'image' => Storage::put('product_galleries', $item),
                        'product_id' => $product->id,
                    ]);
                }
            }
            // if ($request->has('product_galleries')) {
            //     $Galleries = ProductGallery::where('product_id', $product->id)->get();
            //     foreach ($Galleries as $gallery) {
            //         if (Storage::exists($gallery->image)) {
            //             Storage::delete($gallery->image);
            //         }
            //         $gallery->delete();
            //     }
            //     foreach ($request->product_galleries as $item) {
            //         $imagePath = Storage::put('product_galleries', $item);
            //         ProductGallery::create([
            //             'image' => $imagePath,
            //             'product_id' => $product->id,
            //         ]);
            //     }
            // }

            DB::commit();
            return redirect()->route('admins.products.index')->with('message', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return back()->with('error', 'Cập nhật không thành công.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        try {
            DB::beginTransaction();
            foreach ($product->galleries as $gallery) {
                Storage::delete($gallery->image);
                $gallery->delete();
            }
            $product->variants()->delete();

            $product->delete();

            DB::commit();
            return redirect()->route('admins.products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Đã xảy ra lỗi khi xóa sản phẩm.']);
        }
    }
}
