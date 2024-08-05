@extends('admin.layouts.index')

@push('styles')
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Thêm người dùng</h4>
        <a href="{{ route('admin.users.listUsers') }}" class="btn btn-info mb-3">Quay lại</a>
        <form action="{{ route('admin.users.addPostUsers') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nameUser">Tên người dùng</label>
                <input type="text" name="nameUser" id="nameUser" class="form-control">
                @error('nameUser')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="emailUser">Email</label>
                <input type="email" name="emailUser" id="emailUser" class="form-control">
                @error('emailUser')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="passwordUser">Password</label>
                <input type="password" name="passwordUser" id="passwordUser" class="form-control">
                @error('passwordUser')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-9">
                <label for="password_confirmation" class="form-label">Comfirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="roleUser">Quyền</label>
                <select name="roleUser" id="roleUser" class="form-control">
                    <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Thêm mới</button>
        </form>
    </div>
@endsection

@push('scripts')
@endpush