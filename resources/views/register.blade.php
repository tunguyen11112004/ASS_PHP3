<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row col">
            <h2>Đăng ký</h2>
            @if (session('message'))
                <p class="text-danger">{{ session('message') }}</p>
            @endif
            <form action="{{ route('postRegister') }}" method="post">
                @csrf
                <div class="mb-9">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-9">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-9">
                    <label for="password_confirmation" class="form-label">Comfirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                </div>
                <div class="mb-9">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning">Đăng ký</button>
                <a href="{{ route('login') }}" class="btn btn-success">Đăng Nhập</a>
            </form>
        </div>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
