<!doctype html>
<html lang="en">

<head>
    <title>Từ điển </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <!-- Icon Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend/word/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/Home/css/Style.css') }}">
</head>
<body id="body top">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="col-lg-2 col-sm-3 col-3 col-md-3 logo-pc">
            <div class="header-logo-hidden">
                <a class="navbar-brand brand-logo" id="LogoMENU" href="{{URL::to('/')}}">
                    {{--                    <picture>--}}
                    {{--                        <source media="(max-width: 991px)" srcset="img_pink_flowers.jpg">--}}
                    {{--                        <source media="(min-width: 465px)" srcset="img_white_flower.jpg">--}}
                    {{--                        <img src="{{URL::to ('resources/Image/Asset3.png') }}" alt="Flowers" style="width:auto;">--}}
                    {{--                    </picture>--}}
                    <img src="{{URL::to ('resources/Image/Asset3.png') }}" class="d-lg-block d-sm-none d-md-none d-none"
                         id="LogoMENU" alt="logo" width="120vw"
                         height="auto">
                    <img src="{{URL::to ('resources/Image/Asset6.png') }}"
                         class="d-lg-none d-sm-block d-md-block d-block header-img-logo" id="LogoMENU" alt="logo"
                         width="100vw"
                         height="auto">
                </a>
            </div>

        </div>
        <div class="col-lg-8" id="form-mobile">
            <div id="navbar-search" class="">
                <div class="d-flex">
                    <form action="{{ URL::to('/tim-kiem') }}" method="POST"
                          class="input-group col-8 col-sm-8 col-md-8 col-lg-10 mx-auto pr-0">
                        @csrf
                        <input type="text" class="form-control shadow-none" id="Borderblue_input"
                               name="keywords_submit" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn text-danger" type="submit" style="font-size: 20px;" type="button"
                                    id="btn-padding">
                                <i class="fa fa-search" style="color: #BE2031"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="collapse navbar-collapse d-lg-block dropdown-hambuger-menu" id="navbarSupportedContent">
                <div class="Menu-Onclick ">
                    <div class="" id="navbar-list-2">
                        <ul class="navbar-nav list-inline d-flex mx-auto justify-content-center">
                            <li class="nav-item active list-inline-item text-danger">
                                <div class="dropdown show">
                                    <a class="btn dropdown-toggle text-danger pr-0 pl-0" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        Alphabet
                                    </a>
                                    <div class="dropdown-menu pl-4" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">
                                            @foreach ($alphabet as $key => $alphabet_nav)
                                                <a href="{{ route('detail.alphabet',$alphabet_nav->alphabet_id) }}"
                                                   class="dropdown-item-1">
                                                    {{ $alphabet_nav->alphabet_name }}</a>
                                            @endforeach
                                        </a>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item list-inline-item text-danger">
                                <div class="dropdown show">
                                    <a class="btn dropdown-toggle text-danger pr-0 pl-0" href="#" role="button"
                                       id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i
                                                    class="fas fa-graduation-cap"></i>
                                                College</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                    class="fas fa-briefcase"></i> Work</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="{{URL::to('category-food')}}" class="dropdown-item-1 ml-3"><i
                                                    class="fas fa-utensils"></i> Food</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                    class="fas fa-restroom"></i> Sex</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="{{URL::to('category-game')}}" class="dropdown-item-1 ml-3"><i
                                                    class="fas fa-gamepad"></i> Game</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                    class="fab fa-internet-explorer"></i> Internet</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-home"></i>
                                                Family</a>
                                            <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                    class="fas fa-church"></i> Religion</a>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-swimmer"></i> Sport</a>
                                            <a href="{{URL::to('category-music')}}"
                                               class="dropdown-item-1 mr-3 float-right"><i
                                                    class="fas fa-headphones-alt"></i> Music</a>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item-1 list-inline-item text-danger">
                                <a class="nav-link text-danger" href="#">About us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <button class="navbar-toggler" id="hambubger-menu" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="add">
            <a href="{{URL::to('/add-all-dictionary')}}" data-toggle="tooltip" title="Please add your words!">
                <button type="button"
                        class="btn btn-outline-danger  d-lg-block  "><i
                        class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
        </div>
    </nav>
</header>
<!-- =====================================================================================================================main-page -->

@yield('container')
<!-- ==========================================================================================================================================footer -->
<div class=" btn back-home btn-outline-danger" id="btn-back-to-top"><a><i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a></div>
<footer class="col-xs-12 col-12 col-md-12 col-lg-12">
    <div class="logo col-10 col-md-10 col-lg-8 mx-auto pt-3 pl-0"><a href="index.html"><img
                src="{{URL::to ('resources/Image/Asset4.png') }}" alt=""></a></div>
    <div class="info col-10 col-md-10 col-lg-6 mx-auto d-lg-flex d-md-flex d-sm-flex justify-content-between pt-3">
        <p>Contact Us</p>
        <p>Help</p>
        <p>About</p>
    </div>
    <div class="icon col-lg-6 mx-auto d-lg-flex justify-content-end">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
</footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>
<script type="text/javascript">
    // btn back to top
    $(function () {
        var btn = $('#btn-back-to-top');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 20) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, '20');
        });
    });

</script>
</html>
