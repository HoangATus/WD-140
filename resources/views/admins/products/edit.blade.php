@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')
@endsection
@section('content')
    {{-- {{ $product }} --}}
    {{-- {{$variants}} --}}
    <form method="POST" action="{{ route('admins.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- New Product Add Start -->
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
                                        <input class="form-control @error('product_name') is-invalid @enderror"
                                            type="text" name="product_name"
                                            value="{{ old('product_name', $product->product_name) }}">
                                        @error('product_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            aria-label="Default select example" id="choices-category-input"
                                            name="category_id">
                                            <option selected>--Chọn danh mục--</option>
                                            @foreach ($categories as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ old('category_id', $product->category_id) == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Ảnh
                                        chính</label>
                                    <div class="col-sm-9">
                                        @if ($product->product_image_url)
                                            <img src="{{ Storage::url($product->product_image_url) }}" alt=""
                                                width="160px" height="160px">
                                        @else
                                            <p>Không có ảnh</p>
                                        @endif
                                        <input type="file" name="product_image_url" id="product_image_url"
                                            class="form-control @error('product_image_url') is-invalid @enderror">
                                        @error('product_image_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Thư viện ảnh</label>
                                    <div class="col-sm-9">
                                        @if ($product->galleries && $product->galleries->isNotEmpty())
                                            @foreach ($product->galleries as $gallery)
                                                <img src="{{ Storage::url($gallery->image) }}" width="70px"
                                                    height="70px">
                                            @endforeach
                                        @else
                                            <p>Không có ảnh</p>
                                        @endif
                                        <input type="file" name="product_galleries[]" multiple
                                            class="form-control @error('product_galleries') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Mã sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_code"
                                            value="{{ old('product_code', $product->product_code ?? strtoupper(\Str::random(9))) }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Trạng thái</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('is_active') is-invalid @enderror"
                                            name="is_active">
                                            <option selected>--Chọn trạng thái--</option>
                                            <option value="1"
                                                {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>Hoạt
                                                động</option>
                                            <option value="0"
                                                {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>Không
                                                hoạt động</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="form-label-title col-sm-3 mb-0">Mô tả sản phẩm</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                                    rows="5" placeholder="Nhập mô tả sản phẩm...">{{ old('description', $product->description) }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cart -->
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
                                                    <th>Số lượng</th>
                                                    <th>Ảnh</th>
                                                    <th>Giá nhập</th>
                                                    <th>Giá bán</th>
                                                    <th>Giá niêm yết</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $rows = count($product->variants);
                                                @endphp
                                                @for ($index = 0; $index < $rows; $index++)
                                                    <tr>
                                                        <td>
                                                            <select
                                                                class="form-select @error("variants.$index.attribute_size_name") is-invalid @enderror"
                                                                name="variants[{{ $index }}][attribute_size_name]">
                                                                {{-- <option value="">Màu</option> --}}
                                                                @foreach ($sizes as $size_id => $attribute_size_name)
                                                                    <option value="{{ $size_id }}"
                                                                        {{ old("variants.$index.attribute_size_name", $product->variants[$index]->attribute_size_id ?? '') == $size_id ? 'selected' : '' }}>
                                                                        {{ $attribute_size_name }}
                                                                    </option>
                                                                    {{-- {{ $variant->sizes->attribute_size_name ?? 'Không xác định' }} --}}
                                                                @endforeach
                                                            </select>
                                                            @error("variants.$index.attribute_size_name")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select name="variants[{{ $index }}][name]"
                                                                class="form-select @error('variants.*.name') is-invalid @enderror">
                                                                @foreach ($colors as $id => $name)
                                                                    <option value="{{ $id }}"
                                                                        {{ old("variants.$index.name", $product->variants[$index]->attribute_color_id ?? '') == $id ? 'selected' : '' }}>
                                                                        {{ $name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error("variants.$index.name")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="variants[{{ $index }}][quantity]"
                                                                class="form-control @error('variants.*.quantity') is-invalid @enderror"
                                                                min="0"
                                                                value="{{ old("variants.$index.quantity", $product->variants[$index]->quantity) }}">
                                                            @error("variants.$index.quantity")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="file"
                                                                name="variants[{{ $index }}][image]"
                                                                class="form-control @error('variants.*.image') is-invalid @enderror">
                                                            @if ($product->variants[$index]->image)
                                                                <img src="{{ Storage::url($product->variants[$index]->image) }}"
                                                                    alt="{{ $product->variants[$index]->name }}"
                                                                    width="70px" height="70px">
                                                            @endif
                                                            @error("variants.$index.image")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="variants[{{ $index }}][variant_import_price]"
                                                                class="form-control @error('variants.*.variant_import_price') is-invalid @enderror"
                                                                step="0.01" min="0"
                                                                value="{{ old("variants.$index.variant_import_price", $product->variants[$index]->variant_import_price) }}">
                                                            @error("variants.$index.variant_import_price")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="variants[{{ $index }}][variant_sale_price]"
                                                                class="form-control @error('variants.*.variant_sale_price') is-invalid @enderror"
                                                                step="0.01" min="0"
                                                                value="{{ old("variants.$index.variant_sale_price", $product->variants[$index]->variant_sale_price) }}">
                                                            @error("variants.$index.variant_sale_price")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="variants[{{ $index }}][variant_listed_price]"
                                                                class="form-control @error('variants.*.variant_listed_price') is-invalid @enderror"
                                                                step="0.01" min="0"
                                                                value="{{ old("variants.$index.variant_listed_price", $product->variants[$index]->variant_listed_price) }}">
                                                            @error("variants.$index.variant_listed_price")
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-danger remove-variant-button">Xóa</button>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="button" id="addVariantButton"
                                                class="btn btn-info text-white">Thêm biến
                                                thể</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.getElementById('addVariantButton').addEventListener('click', function() {
                                // Get the variant table body
                                var variantTable = document.getElementById('variantTable').getElementsByTagName('tbody')[0];
                                var rowCount = variantTable.rows.length; // Get current row count
                                var newRow = variantTable.insertRow(rowCount); // Insert a new row at the end

                                // Create the new cells
                                var cellSize = newRow.insertCell(0);
                                var cellColor = newRow.insertCell(1);
                                var cellQuantity = newRow.insertCell(2);
                                var cellImage = newRow.insertCell(3);
                                var cellImportPrice = newRow.insertCell(4);
                                var cellSalePrice = newRow.insertCell(5);
                                var cellListedPrice = newRow.insertCell(6);
                                var cellAction = newRow.insertCell(7);

                                // Populate the cells with input fields and select options
                                cellSize.innerHTML = `
                                    <select name="attribute_sizes[${rowCount + 1}][size]" class="form-select">
                                         <option selected>Size</option>
                                        @foreach ($sizes as $size_id => $size_name)
                                            <option value="{{ $size_id }}">{{ $size_name }}</option>
                                        @endforeach
                                    </select>
                                `;

                                cellColor.innerHTML = `
                                    <select name="variants[${rowCount + 1}][color]" class="form-select">
                                        <option selected>Màu</option>
                                        @foreach ($colors as $color_id => $color_name)
                                            <option value="{{ $color_id }}">{{ $color_name }}</option>
                                        @endforeach
                                    </select>
                                `;

                                cellQuantity.innerHTML = `
                                    <input type="number" name="variants[${rowCount + 1}][quantity]" class="form-control" min="0">
                                `;

                                cellImage.innerHTML = `
                                    <input type="file" name="variants[${rowCount + 1}][image]" class="form-control">
                                `;

                                cellImportPrice.innerHTML = `
                                    <input type="number" name="variants[${rowCount + 1}][variant_import_price]" class="form-control" step="0.01" min="0">
                                `;

                                cellSalePrice.innerHTML = `
                                    <input type="number" name="variants[${rowCount + 1}][variant_sale_price]" class="form-control" step="0.01" min="0">
                                `;

                                cellListedPrice.innerHTML = `
                                    <input type="number" name="variants[${rowCount + 1}][variant_listed_price]" class="form-control" step="0.01" min="0">
                                `;

                                // Add remove button
                                cellAction.innerHTML = `
                                    <button type="button" class="btn btn-danger remove-variant-button">Xóa</button>
                                `;

                                // Attach event listener to remove the row when the "Xóa" button is clicked
                                newRow.querySelector('.remove-variant-button').addEventListener('click', function() {
                                    this.closest('tr').remove();
                                });
                            });

                            // Add event listener to all existing remove buttons on page load
                            document.querySelectorAll('.remove-variant-button').forEach(function(button) {
                                button.addEventListener('click', function() {
                                    this.closest('tr').remove();
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admins.products.index') }}" class="btn btn-secondary me-2">Quay lại</a>
            <button type="submit" class="btn btn-success">Sửa</button>
        </div>
        <!-- New Product Add End -->
    </form>
@endsection

@section('js')
@endsection
