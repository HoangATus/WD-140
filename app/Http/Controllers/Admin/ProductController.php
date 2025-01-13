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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    const PATH_VIEW = 'admins.products.';
    const PATH_UPLOAD = 'products';

    public function index()
    {

        $products = Product::query()->with('category', 'variants')->latest()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = AttributeSize::query()->pluck('attribute_size_name', 'id')->all();
        $colors = Color::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'colors', 'sizes'));
    }

    public function store(StoreProductRequest $request)
    {

        $data = $request->except(['variants', 'product_image_url', 'product_galleries']);
        $data['product_code'] = $request->product_code;
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
    public function edit(Product $product)
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $sizes = AttributeSize::query()->pluck('attribute_size_name', 'id')->all();
        $colors = Color::query()->pluck('name', 'id')->all();
        $variants = $product->variants->map(function ($variant) {
            $isLocked = DB::table('order_items')
                ->where('variant_id', $variant->id)
                ->exists() || DB::table('carts')
                ->where('variant_id', $variant->id)
                ->exists();

            $variant->is_locked = $isLocked;
            return $variant;
        });
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories', 'colors', 'sizes', 'variants'));
    }



    public function update(UpdateProductRequest $request, Product $product)
    {

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
            if ($request->has('deletedVariantIds')) {
                $deletedVariantIds = json_decode($request->deletedVariantIds, true);
                if (is_array($deletedVariantIds) && !empty($deletedVariantIds)) {
                    $variantsToDelete = Variant::whereIn('id', $deletedVariantIds)->get();
            
                    foreach ($variantsToDelete as $variant) {
                        if ($variant->image && Storage::exists($variant->image)) {
                            Storage::delete($variant->image);
                        }
                        $variant->delete();
                    }
                    Log::info('Deleted Variants:', $deletedVariantIds);
                }
            }
            // dd($request->deletedVariantIds);
            

            if (!is_null($request->variants) && is_array($request->variants)) {
                $existingVariants = $product->variants->keyBy('id');
                $processedVariantIds = [];

                foreach ($request->variants as $item) {

                    $variantId = $item['id'] ?? null;

                    $variantData = [
                        'attribute_size_id' => $item['attribute_size_name'] ?? null,
                        'attribute_color_id' => $item['name'] ?? null,
                        'variant_listed_price' => $item['variant_listed_price'] ?? 0,
                        'variant_sale_price' => $item['variant_sale_price'] ?? 0,
                        'variant_import_price' => $item['variant_import_price'] ?? 0,
                        'quantity' => $item['quantity'] ?? 0,
                    ];

                    if (!empty($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                        if (!empty($item['old_image']) && Storage::exists($item['old_image'])) {
                            Storage::delete($item['old_image']);
                        }


                        $variantData['image'] = Storage::put('variants', $item['image']);
                    } else if (!empty($item['old_image'])) {
                        $variantData['image'] = $item['old_image'];
                    }

                    if ($variantId && $existingVariants->has($variantId)) {
                        $variant = $existingVariants->get($variantId);
                        $variant->update($variantData);
                        $processedVariantIds[] = $variant->id;
                    } else {
                        $variantData['product_id'] = $product->id;
                        $newVariant = Variant::create($variantData);
                        $processedVariantIds[] = $newVariant->id;
                    }

                }

                Log::info('Processed Variants:', $processedVariantIds);
            }

            if ($request->has('product_galleries')) {
                foreach ($request->product_galleries as $item) {
                    ProductGallery::create([
                        'image' => Storage::put('product_galleries', $item),
                        'product_id' => $product->id,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admins.products.index')->with('message', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return back()->with('error', 'Cập nhật không thành công.');
        }
    }
    public function destroy(Product $product)
    {
        $variantIds = $product->variants->pluck('id')->toArray();

        $existsInOrder = DB::table('order_items')->whereIn('variant_id', $variantIds)->exists();
        $existsInCart = DB::table('carts')->whereIn('variant_id', $variantIds)->exists();

        $errors = [];
        if ($existsInOrder) {
            $errors[] = 'Lỗi: Sản phẩm đã được mua.';
        }
        if ($existsInCart) {
            $errors[] = 'Lỗi: Sản phẩm đang trong giỏ hàng.';
        }
        if (!empty($errors)) {
            return back()->withErrors($errors);
        }

        DB::beginTransaction();
        foreach ($product->galleries as $gallery) {
            Storage::delete($gallery->image);
            $gallery->delete();
        }
        $product->variants()->delete();

        $product->delete();

        DB::commit();
        return redirect()->route('admins.products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
