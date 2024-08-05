@extends('admin.layouts.index');

@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.product.addProduct') }}" class="btn btn-info">Thêm mới</a>
        {{-- <form action="{{ route('admin.product.timKiemProduct') }}" method="GET">
            <div class="mb-6">
                <label for="nameProduct" class="form-label">Tìm Kiếm</label>
                <input type="search" class="form-control" name="nameProduct">
            </div>

        </form> --}}
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Image</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->name_category }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->price }}</td>
                        <td>
                            <img class="img-product" src="{{ asset($value->image) }}" alt="" width="80">
                        </td>
                        <td>
                            <a href="{{ route('admin.product.detailProduct', $value->id) }}" class="btn btn-info">Chi tiết</a>
                            <a href="{{ route('admin.product.updateProduct', $value->id) }}" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger" data-bs-id="{{ $value->id }}" data-bs-toggle="modal"
                                data-bs-target="#deleteModel">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
    {{-- Modal --}}
    <div class="modal" tabindex="-1" id="deleteModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" for="deleteModelLabel">
                    <h5 class="modal-title" id="deleteModelLabel">Cảnh báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDelete">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        Bạn có muốn xóa không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var exampleModal = document.getElementById('deleteModel')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admin.product.deleteProduct') }}??id= ' + id)
        })
    </script>
@endpush
