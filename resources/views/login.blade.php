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
        <div class="row justify-content-md-center">
            <h2 class="text-center">Đăng nhập</h2>
            @if (session('message'))
                <p class="text-danger text-center">{{ session('message') }}</p>
            @endif
            <form class="col-5" action="{{ route('postLogin') }}" method="post">
                @csrf
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập Password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <input type="checkbox" id="Remember" name="Remember">
                    <label for="Remember" class="form-label">Remember Me</label>
                </div>
                <div class="col">
                    <label class="form-label">Bạn chưa có tài khoản?</label>
                    <a href="{{ route('register') }}" >Đăng ký</a>
                </div>
                <button type="submit" class="btn btn-success">Đăng nhập</button>
                
            </form>
            
        </div>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
