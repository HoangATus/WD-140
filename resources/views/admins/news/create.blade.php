@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')

@endsection


@section('content')
<h2>Thêm Tin Tức</h2>

<form action="{{ route('admins.news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" >
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select name="category_id" id="category_id" class="form-control" >
            <option value="">Chọn danh mục</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-3">
        <label for="content" class="form-label">Nội dung:</label>
        <textarea class="form-control" name="content" id="description"></textarea>
        @error('content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
   

    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" id="image" class="form-control">
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check form-switch form-switch-primary mt-3">
            <label class="form-check-label" for="status">Is Active</label>
           
            <input class="form-check-input" type="checkbox" role="switch"
                   name="status" id="status" checked value="1">
        </div>
    </div>

    <a href="{{ route('admins.news.index') }}" class="btn btn-primary mt-4">Quay lại</a>

    <button type="submit" class="btn btn-success mt-4">Cập nhật</button>
</form>
<script src="https://cdn.tiny.cloud/1/5295v44r4zfl5gwqkcm0psdangh32j05wix7wt26sozmkz9r/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


<script>
  tinymce.init({
    selector: 'textarea#description',
    plugins: [
  
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
    exportword_converter_options: { 'document': { 'size': 'Letter' } },
    importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline',	'defaults': 'inline', } },
  });
</script>


@endsection
