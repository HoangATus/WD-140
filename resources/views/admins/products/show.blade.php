@extends('admins.layouts.admin')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Thông tin sản phẩm</h5>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                                        name="product_name" value="{{ $product->product_name }}" disabled>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="category_id"
                                        value="{{ $product->category->name ?? 'Không xác định' }}" disabled>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Ảnh
                                    chính</label>
                                <div class="col-sm-9">
                                    @if ($product->product_image_url)
                                        <div style="width: 80px;height: 80px;">
                                            <img src="{{ Storage::url($product->product_image_url) }}" alt="Ảnh sản phẩm"
                                                class="img-fluid mb-3" style="max-width: 100%; max-height: 100%">
                                        </div>
                                    @else
                                        <p>Không có ảnh</p>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Thư viện ảnh</label>
                                <div class="col-sm-9">
                                    @if ($product->galleries && $product->galleries->isNotEmpty())
                                        @foreach ($product->galleries as $gallery)
                                            <img src="{{ Storage::url($gallery->image) }}" width="70px" height="70px"
                                                alt="Gallery Image">
                                        @endforeach
                                    @else
                                        <p>Không có ảnh</p>
                                    @endif

                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Mã sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="product_code"
                                        value="{{ $product->product_code }}" disabled>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Trạng
                                    thái</label>
                                <div class="col-sm-9">
                                    {!! $product->is_active
                                        ? '<span class="badge bg-success text-white">Hoạt động</span>'
                                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="form-label-title col-sm-3 mb-0">Mô tả sản phẩm</label>
                                        <div class="col-sm-9">
                                            <textarea id="ckeditor-classic" class="form-control" name="description" disabled>{{ old('description', $product->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <th>Màu</th>
                                                <th>Size</th>
                                                <th>Số lượng</th>
                                                <th>Ảnh</th>
                                                <th>Giá nhập</th>
                                                <th>Giá sale</th>
                                                <th>Giá bán</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->variants as $variant)
                                                <tr>
                                                    <td>{{ $variant->color->name ?? 'Không xác định' }}</td>
                                                    <td>{{ $variant->size->attribute_size_name ?? 'Không xác định' }}</td>
                                                    <td>{{ $variant->quantity }}</td>
                                                    <td>
                                                        @if ($variant->image)
                                                            <img src="{{ Storage::url($variant->image) }}"
                                                                alt="{{ $product->name }}" class="" width="70px"
                                                                height="70px">
                                                        @endif
                                                    </td>
                                                    <td>{{ number_format($variant->variant_import_price) }} VND</td>
                                                    <td>{{ number_format($variant->variant_sale_price) }} VND</td>
                                                    <td>{{ number_format($variant->variant_listed_price) }} VND</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admins.products.index') }}" class="btn btn-secondary me-2">Quay lại</a>
    </div>

    </form>
@endsection
