<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assetss/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}" type="text/css">
</head>

<body>

    <!-- Header Section Begin -->
    @include('users.header')
    <!-- Hero Section Begin -->
    @include('users.hero')
    <!-- Categories Section Begin -->
    @include('users.category')
    <!-- Featured Section Begin -->
    @include('users.featured')
    <!-- Banner Begin -->
    @include('users.banner')
    <!-- Latest Product Section Begin -->
    @include('users.latest-product')
    <!-- Footer Section Begin -->
    @include('users.footer')


    <script src="{{ asset('assetss/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assetss/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetss/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assetss/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assetss/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assetss/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assetss/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetss/js/main.js') }}"></script>



</body>

</html>
