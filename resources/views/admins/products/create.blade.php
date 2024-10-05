@extends('admins.layouts.admin')

@section('title')
 Trang quản trị
@endsection

@section('css')

@endsection
@section('content')
  <!-- New Product Add Start -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- <div class="col-sm-8 m-auto"> -->
                <!-- carttttttt -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Thông tin sản phẩm</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text">
                                </div>
                            </div>

                            <!-- <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Product
                                        Type</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="state">
                                            <option disabled>Static Menu</option>
                                            <option>Simple</option>
                                            <option>Classified</option>
                                        </select>
                                    </div>
                                </div> -->

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="">
                                        <option disabled>Danh Mục</option>
                                        <option>Áo nam</option>
                                        <!-- <option>TV & Appliances</option>
                                            <option>Home & Furniture</option>
                                            <option>Another</option>
                                            <option>Baby & Kids</option>
                                            <option>Health, Beauty & Perfumes</option>
                                            <option>Uncategorized</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Giá</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Giá Sale</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Số lượng</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="">
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Trạng
                                    thái</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="">
                                        <option>Hoạt động</option>
                                        <option>Không hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox"><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div> -->
                            <!-- <div class="row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" checked=""><span
                                                class="switch-state"></span>
                                        </label>
                                    </div>
                                </div> -->
                        </form>
                    </div>
                </div>
                <!-- cart -->
               

                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Hình ảnh sản phẩm</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Ảnh
                                    chính</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-choose" type="file" id="formFile"
                                        multiple>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Ảnh phụ</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-choose" type="file"
                                        id="formFileMultiple1" multiple>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Videos</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Video
                                        Provider</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="state">
                                            <option>Vimeo</option>
                                            <option>Youtube</option>
                                            <option>Dailymotion</option>
                                            <option>Vimeo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Video
                                        Link</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"
                                            placeholder="Video Link">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->

                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Biến thể sản phẩm</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <table class="table" id="variantTable">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Màu</th>
                                            <th>Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="product_variants[1][size]"
                                                    class="form-select ">
                                                    <option value="1">S</option>
                                                    <option value="2">M</option>
                                                    <option value="3">L</option>
                                                    <option value="4">XL</option>
                                                    <option value="5">2XL</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[1][color]"
                                                    class="form-select ">
                                                    <option value="1">black</option>
                                                    <option value="2">blue</option>
                                                    <option value="3">white</option>
                                                    <option value="4">gray</option>
                                                    <option value="5">yellow</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[1][image]"
                                                    class="form-control ">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    name="product_variants[1][quantity]"
                                                    class="form-control " min="0" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[1][price]"
                                                    class="form-control " step="0.01" min="0" value="">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-danger remove-variant-button">Xóa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="product_variants[2][size]"
                                                    class="form-select ">
                                                    <option value="1">S</option>
                                                    <option value="2">M</option>
                                                    <option value="3">L</option>
                                                    <option value="4">XL</option>
                                                    <option value="5">2XL</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[2][color]"
                                                    class="form-select ">
                                                    <option value="1">black</option>
                                                    <option value="2">blue</option>
                                                    <option value="3">white</option>
                                                    <option value="4">gray</option>
                                                    <option value="5">yellow</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[2][image]"
                                                    class="form-control ">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    name="product_variants[2][quantity]"
                                                    class="form-control " min="0" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[2][price]"
                                                    class="form-control " step="0.01" min="0" value="">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-danger remove-variant-button">Xóa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="product_variants[3][size]"
                                                    class="form-select ">
                                                    <option value="1">S</option>
                                                    <option value="2">M</option>
                                                    <option value="3">L</option>
                                                    <option value="4">XL</option>
                                                    <option value="5">2XL</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[3][color]"
                                                    class="form-select ">
                                                    <option value="1">black</option>
                                                    <option value="2">blue</option>
                                                    <option value="3">white</option>
                                                    <option value="4">gray</option>
                                                    <option value="5">yellow</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[3][image]"
                                                    class="form-control ">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    name="product_variants[3][quantity]"
                                                    class="form-control " min="0" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[3][price]"
                                                    class="form-control " step="0.01" min="0" value="">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-danger remove-variant-button">Xóa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="product_variants[4][size]"
                                                    class="form-select ">
                                                    <option value="1">S</option>
                                                    <option value="2">M</option>
                                                    <option value="3">L</option>
                                                    <option value="4">XL</option>
                                                    <option value="5">2XL</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[4][color]"
                                                    class="form-select ">
                                                    <option value="1">black</option>
                                                    <option value="2">blue</option>
                                                    <option value="3">white</option>
                                                    <option value="4">gray</option>
                                                    <option value="5">yellow</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[4][image]"
                                                    class="form-control ">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    name="product_variants[4][quantity]"
                                                    class="form-control " min="0" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[4][price]"
                                                    class="form-control " step="0.01" min="0" value="">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-danger remove-variant-button">Xóa</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="product_variants[5][size]"
                                                    class="form-select ">
                                                    <option value="1">S</option>
                                                    <option value="2">M</option>
                                                    <option value="3">L</option>
                                                    <option value="4">XL</option>
                                                    <option value="5">2XL</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[5][color]"
                                                    class="form-select ">
                                                    <option value="1">black</option>
                                                    <option value="2">blue</option>
                                                    <option value="3">white</option>
                                                    <option value="4">gray</option>
                                                    <option value="5">yellow</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[5][image]"
                                                    class="form-control ">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    name="product_variants[5][quantity]"
                                                    class="form-control " min="0" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[5][price]"
                                                    class="form-control " step="0.01" min="0" value="">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-danger remove-variant-button">Xóa</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="button" id="addVariantButton"
                                        class="btn btn-info">Thêm biến thể</button>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#" class="add-option"><i class="ri-add-line me-2"></i> Add Another
                                Option</a> -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Mô tả</h5>
                        </div>
                        
                        <form class="theme-form theme-form-2 mega-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="form-label-title col-sm-3 mb-0">Mô tả sản phẩm</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="product_description" id="product_description" rows="5" placeholder="Nhập mô tả sản phẩm..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit"
                        class="btn btn-primary">Tạo mới</button>
                </div>
                
                <!-- <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Shipping</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Weight
                                    (kg)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" placeholder="Weight">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Dimensions
                                    (cm)</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="state">
                                        <option>Length</option>
                                        <option>Width</option>
                                        <option>Height</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Price</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 form-label-title">price</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" placeholder="0">
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 form-label-title">Compare at
                                    price</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" placeholder="0">
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 form-label-title">Cost per item</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="number" placeholder="0">
                                </div>
                                <div class="col-sm-2">
                                    <label>Margin:</label>
                                    <span>25%</span>
                                </div>
                                <div class="col-sm-2">
                                    <label>Profit:</label>
                                    <span>$5</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Inventory</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">SKU</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Stock
                                    Status</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="state">
                                        <option>In Stock</option>
                                        <option>Out Of Stock</option>
                                        <option>On Backorder</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <table class="table variation-table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Variant</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Red</td>
                                    <td>
                                        <input class="form-control" type="number" placeholder="0">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" placeholder="0">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" placeholder="0">
                                    </td>
                                    <td>
                                        <ul class="order-option">
                                            <li><a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#deleteModal"><i
                                                        class="ri-delete-bin-line"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Blue</td>
                                    <td>
                                        <input class="form-control" type="number" placeholder="0">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" placeholder="0">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" placeholder="0">
                                    </td>
                                    <td>
                                        <ul class="order-option">
                                            <li><a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#deleteModal"><i
                                                        class="ri-delete-bin-line"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

                <!-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Link Products</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Upsells</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Cross-Sells</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->

                <!-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Search engine listing</h5>
                            </div>

                            <div class="seo-view">
                                <span class="link">https://fastkart.com</span>
                                <h5>Buy fresh vegetables & Fruits online at best price</h5>
                                <p>Online Vegetable Store - Buy fresh vegetables & Fruits online at best
                                    prices. Order online and get free delivery.</p>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Page title</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search"
                                            placeholder="Fresh Fruits">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label class="form-label-title col-sm-3 mb-0">Meta
                                        description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="form-label-title col-sm-3 mb-0">URL handle</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search"
                                            placeholder="https://fastkart.com/fresh-veggies">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                <!-- </div> -->
               
            </div>
        </div>
    </div>
</div>
<!-- New Product Add End -->

@endsection

@section('js')

@endsection