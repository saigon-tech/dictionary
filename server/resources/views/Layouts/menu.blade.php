<div class="collapse navbar-collapse" id="navbar-list-2">
    <ul class="navbar-nav list-inline d-flex mx-auto justify-content-center">
        <li class="nav-item active list-inline-item text-danger">
            <div class="dropdown show">
                <a class="btn dropdown-toggle text-danger pr-0 pl-0" data-toggle="dropdown"
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
