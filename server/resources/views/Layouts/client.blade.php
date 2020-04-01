<!doctype html>
<html lang="vi">
    <head>
        <title> Từ điển </title>
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{--    CSS Style    --}}
        <link rel="stylesheet" href="{{ asset ('public/frontend/word/style.css') }}">
        <link rel="stylesheet" href="{{ asset ('public/frontend/Home/css/Style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body id="body">

        @include('Layouts.header')

        @yield('container')

        @include('Layouts.footer')
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
</html>
