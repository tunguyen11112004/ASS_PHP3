@extends('admin.layouts.index')

@push('styles')
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách người dùng</h4>
        <a href="{{ route('admin.users.addUsers') }}" class="btn btn-info">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $value)
                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->password }}</td>
                        <td class="text-danger">
                            @if ($value->role == 1)
                                Admin
                            @else
                                User
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.detailUsers', $value->id) }}"
                                class="btn btn-success">Chi tiết</a>
                            <a href="{{ route('admin.users.editUsers', $value->id) }}" class="btn btn-warning">Sửa</a>
                            <a class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModel"
                                data-bs-id="{{ $value->id }}">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" for="deleteModelLabel">
                    <h5 class="modal-title" id="deleteModelLabel">Cảnh báo!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDetele">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        Bạn có muốn xoá người dùng này không???
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var deleteModal = document.getElementById('deleteModel')
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')
            let formDetele = document.getElementById('formDetele')
            formDetele.setAttribute('action', '{{ route('admin.users.deleteUsers') }}?id=' + id)
        })
    </script>
@endpush