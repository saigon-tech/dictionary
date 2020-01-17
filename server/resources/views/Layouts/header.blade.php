<nav class="navbar navbar-dark bg-white navbar-expand-lg d-flex justify-content-around">
    <div class=" col-xs-2 col-lg-3 ">
        <a class="navbar-brand d-none d-sm-none d-md-none d-lg-block float-right" href="{{URL::to('/')}}">
            <img src="{{ asset('public/image/Logo.png') }}" id="LogoMENU" alt="logo" width="120vw"
                 height="auto">
        </a>
        <a class="navbar-brand d-xs-block d-md-block d-lg-none" href="{{URL::to('/')}}">
            <img src="{{ asset('public/image/Logo.png') }}" alt="logo" width="90vw" height="auto">
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
                    <a href="{{URL::to('/add-all-dictionary')}}">
                        <button type="button"
                                href="{{URL::to('/add-all-dictionary')}}"
                                class="btn-sm d-md-block d-lg-none d-sm-block d-block">Add
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('Layouts.menu')

    <div class="add col-lg-3 col-xl-3">
        <a href="{{URL::to('/add-all-dictionary')}}" data-toggle="tooltip" title="Please add your words!">
            <button type="button"
                    class="btn btn-outline-danger d-md-none d-lg-block d-sm-none d-none ">ADD
            </button>
        </a>
    </div>
</nav>