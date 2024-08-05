@extends('admin.layouts.index');

@section('title')
    @parent
    Update sản phẩm
@endsection

@push('styles')
    <Style>
        .img-product {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </Style>
@endpush

@section('content')
    <div class="container">
        <h3>Upfate Product</h3>
        <form action="{{ route('admin.product.updatePatchProduct', $product->id) }}" method="post"
            enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="nameProducts" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="nameProducts" value="{{ $product->name }}">
                @error('nameProducts')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Loại</label>
                <select name="category" class="form-control">
                    @foreach ($category as $value)
                        <option @if ($product->id_category === $value->id_cate) selected @endif value="{{ $value->id_cate }}">
                            {{ $value->name_category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <input type="text" class="form-control" name="description" value="{{ $product->description }}">
            </div>
            <div class="mb-3">
                <label for="priceProducts" class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" name="priceProducts" value="{{ $product->price }}">
                @error('priceProducts')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="imageProduct" class="form-label">Image</label><br>
                <img src="{{ asset($product->image) }}" alt="" class="img-product">
                <input type="file" name="imageProduct" class="form-control" accept="/image">
            </div>
            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
        </form>
        <a class="btn btn-info" href="{{ route('admin.product.listProduct') }}">Quay lại</a>

    </div>
@endsection

@push('scripts')
@endpush
