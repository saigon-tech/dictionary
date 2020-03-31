<!DOCTYPE html>
<head>
    <title>Trang Quản lý Admin Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
        window.scrollTo(0, 1);
      } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('public/backend/css/style-responsive.css') }}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css"/>
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
</head>
<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng Nhập</h2>
            @if(Session::has('login_fail'))
                <span class="text-alert" style="color:white">{{ Session('login_fail') }}</span>
            @endif
            <form action="{{ route('post_login') }}" method="post">
                @csrf
                <input type="text" class="ggg" name="admin_email" placeholder="Điền email" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="Điền PASSWORD" required="">
                <span><input type="checkbox"/>Nhớ Đăng Nhập</span>
                <h6><a href="#">Quên mật Khẩu</a></h6>
                <div class="clearfix"></div>
                <input type="submit">
            </form>
        </div>
    </div>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>
</body>
</html>