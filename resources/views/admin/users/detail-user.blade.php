@extends('admin.layouts.index')

@push('styles')
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Xem chi tiết người dùng</h4>
        <a href="{{ route('admin.users.listUsers') }}" class="btn btn-info mb-3">Quay lại</a>
        <form action="{{ route('admin.users.addPostUsers') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nameUser">Tên người dùng</label>
                <input class="form-control" value="{{ $users->name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="emailUser">Email</label>
                <input class="form-control" value="{{ $users->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="passwordUser">Password</label>
                <input class="form-control" value="{{ $users->password }}" disabled>
            </div>
            <div class="mb-3">
                <label for="roleUser">Quyền</label>
                <select class="form-control" disabled>
                    <option value="1" {{ $users->role == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $users->role == 2 ? 'selected' : '' }}>User</option>
                </select>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush