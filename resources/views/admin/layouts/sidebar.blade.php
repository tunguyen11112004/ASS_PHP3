

<div class="col-3 bg-info position-fixed top-0 start-0 sidebar">
    <h3 class="mt-3 text-light">Admin</h3>
    <div class="list-group mt-4">
        <a href="{{ route('admin.users.listUsers') }}" class="list-group-item ">
            Quản lý người dùng
        </a>
        <a href="{{ route('admin.product.listProduct') }}" class="list-group-item">
            Quản lý sản phẩm
        </a>
        <a href="{{ route('admin.category.listCategory') }}" class="list-group-item ">
            Quản lý loại sản phẩm
        </a>
    </div>
</div>