@extends('admin.layouts.index')

@push('styles')
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Xem chi tiết danh mục</h4>
        <a href="{{ route('admin.category.listCategory') }}" class="btn btn-info mb-3">Quay lại</a>
        <form action="{{ route('admin.category.editPatchCategory', $category->id_cate) }}" method="POST">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="nameCategory">Tên danh mục</label>
                <input id="nameCategory" name="nameCategory" class="form-control" value="{{ $category->name_category }}">
                @error('nameCategory')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <button class="btn btn-success">Chỉnh sửa</button>
        </form>
    </div>
@endsection

@push('scripts')
@endpush