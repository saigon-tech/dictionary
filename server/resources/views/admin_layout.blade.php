<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript">
      addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
        window.scrollTo(0, 1);
      }
    </script>

    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('public/backend/css/style-responsive.css') }}" rel="stylesheet"/>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css"/>
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/backend/css/morris.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('public/backend/css/monthly.css') }}">
    <script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('public/backend/js/morris.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

</head>
<style>
    a.active.styling-edit {
        font-size: 20px;
    }
</style>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="http://localhost/admin/dashboard" class="logo">
                    Dictionary
                </a>

            </div>

            <div class="top-nav clearfix">
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search" value="">
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ ('public/backend/images/2.png') }}">
                            <span class="username">
                                {{ Auth::User()->admin_name }}
                           </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="{{ URL::to('logout') }}"><i class="fa fa-key"></i>Đăng Xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>

        <aside>
            <div id="sidebar" class="nav-collapse">
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Bảng Chữ cái (Alphabet)</span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('add.alphabet') }}">
                                        Thêm danh mục Bảng Chữ Cái
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('list.alphabet') }}">
                                        Liệt kê danh mục Bảng Chữ Cái
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Thể loại (Category)</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('add.category') }}">Thêm danh mục Thể loại </a></li>
                                <li><a href="{{ route('list.category') }}">Liệt kê danh mục Thể loại </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Từ Vựng (Dictionary)</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('add.dictionary') }}">Thêm Từ Vựng</a></li>
                                <li><a href="{{ route('list.dictionary') }}">Liệt kê Từ Vựng</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
                </div>
            </div>
        </section>
    </section>

    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>

</body>

</html>
