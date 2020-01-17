<!doctype html>
<html lang="en">

<head>
    <title>Từ điển </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('public/frontend/word/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/Home/css/Style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <!-- Icon Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body id="body">
    <header>
        <nav class="navbar navbar-dark bg-white navbar-expand-lg d-flex justify-content-around">
            <div class=" col-xs-2 col-lg-3 ">
                <a class="navbar-brand d-none d-sm-none d-md-none d-lg-block float-right" href="{{URL::to('/')}}">
                    <img src="{{URL::to ('resources/Image/Asset3.png') }}" id="LogoMENU" alt="logo" width="120vw"
                        height="auto">
                </a>
                <a class="navbar-brand d-xs-block d-md-block d-lg-none" href="{{URL::to('/')}}">
                    <img src="{{URL::to ('resources/Image/Asset3.png') }}" alt="logo" width="90vw" height="auto">
                </a>

                <div class="float-right Icon_search">
                    <button class="navbar-toggler btn-md pr-2" type="button" data-toggle="collapse"
                        data-target="#navbar-search" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <button class="navbar-toggler btn-md" type="button" data-toggle="collapse"
                        data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="Menu-Onclick col-lg-6">
                <div id="navbar-search" class="collapse">
                    <div class=" navbar-collapse d-flex">
                        <form action="{{ URL::to('/tim-kiem') }}" method="POST"
                            class="input-group col-8 col-sm-8 col-md-8 col-lg-10 mx-auto pr-0">
                            @csrf
                            <input type="text" class="form-control shadow-none" id="Borderblue_input"
                                name="keywords_submit" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn text-danger" type="submit" style="font-size: 20px;" type="button">
                                    <i class="fa fa-search" style="color: #BE2031"></i>
                                </button>
                            </div>
                        </form>
                        <div class="button-add d-lg-none float-right">
                            <a href="{{URL::to('/add-all-dictionary')}}"><button type="button"
                                    href="{{URL::to('/add-all-dictionary')}}"
                                    class="btn-sm d-md-block d-lg-none d-sm-block d-block">Add</button></a>
                        </div>
                    </div>

                </div>
                <div class="collapse navbar-collapse" id="navbar-list-2">
                    <ul class="navbar-nav list-inline d-flex mx-auto justify-content-center">
                        <li class="nav-item active list-inline-item text-danger">
                            <div class="dropdown show">
                                <a class="btn dropdown-toggle text-danger pr-0 pl-0" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Kana
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
                                    Chủ Đề
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-graduation-cap"></i>
                                            College</a>
                                        <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                class="fas fa-briefcase"></i> Work</a>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <a href="{{URL::to('wordtype-food')}}" class="dropdown-item-1 ml-3"><i
                                                class="fas fa-utensils"></i> Food</a>
                                        <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                class="fas fa-restroom"></i> Sex</a>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <a href="{{URL::to('wordtype-game')}}" class="dropdown-item-1 ml-3"><i
                                                class="fas fa-gamepad"></i> Game</a>
                                        <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                class="fab fa-internet-explorer"></i> Internet</a>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-home"></i> Family</a>
                                        <a href="" class="dropdown-item-1 mr-3 float-right"><i
                                                class="fas fa-church"></i> Religion</a>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <a href="" class="dropdown-item-1 ml-3"><i class="fas fa-swimmer"></i> Sport</a>
                                        <a href="{{URL::to('wordtype-music')}}"
                                            class="dropdown-item-1 mr-3 float-right"><i
                                                class="fas fa-headphones-alt"></i> Music</a>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item-1 list-inline-item text-danger">
                            <a class="nav-link text-danger" href="#">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="add col-lg-3 col-xl-3">
                <a href="{{URL::to('/add-all-dictionary')}}" data-toggle="tooltip" title="Please add your words!">
                    <button type="button"
                        class="btn btn-outline-danger d-md-none d-lg-block d-sm-none d-none ">ADD</button>
                </a>
            </div>
        </nav>
    </header>
    <!-- =====================================================================================================================main-page -->

    @yield('container')
    <!-- ==========================================================================================================================================footer -->

    <footer class="col-xs-12 col-12 col-md-12 col-lg-12">
        <div class="logo col-10 col-md-10 col-lg-8 mx-auto pt-3 pl-0"><a href="index.html"><img
                        src="{{URL::to ('resources/Image/Asset4.png') }}" alt=""></a></div>
        <div class="info col-10 col-md-10 col-lg-6 mx-auto d-lg-flex d-md-flex d-sm-flex justify-content-between pt-3">
            <p>Contact Us</p>
            <p>Help</p>
            <p>About</p>
            <p>Contact Us</p>
            <p>Contact Us</p>
            <p>Contact Us</p>
        </div>
        <div class="icon col-lg-6 mx-auto d-lg-flex justify-content-end">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>

</html>
