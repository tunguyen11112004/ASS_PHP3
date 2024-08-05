@extends('admin.layouts.index');


@section('title')
    @parent
    Chi tiết sản phẩm
@endsection

@push('styles')
    <Style>
        .img-product{
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </Style>
@endpush

@section('content')
    <div class="container">
        <div class="p-4" style="min-height: 800px;">
            <p>
                Tên sản phẩm :
                <span class="font-weight-bold">{{ $product->name }}</span>
            </p>
            <p>
                Giá sản phẩm :
                <span class="font-weight-bold">{{ $product->price }}</span>
            </p>
            <p>
                Ảnh sản phẩm :
                <img src="{{ asset($product->image) }}" alt="" class="img-product">
            </p>
            <a class="btn btn-info" href="{{ route('admin.product.listProduct') }}">Quay lại</a>
        </div>
    </div>
@endsection


@push('scripts')
@endpush
