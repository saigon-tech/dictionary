@extends('client')
@section('container')
    <!-- =====================================================================================================================main-page -->
    <div class="hidden"></div>

    <div class="main-page">
        <div class="into-main-page col-10 col-md-10 col-lg-8 mx-auto d-lg-flex justify-content-between pt-5 ">
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12 pl-0 pr-0">
                <div class="banner-layout-text">
                    <h3>
                        Discover Interesting
                    </h3>
                    projects and people <br> to populate your personal <br>news feed.
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12 pl-0 pr-0">
                <img src="{{ ('resources/Image/lsls.jpg') }}" alt="" width="100%;"></div>
        </div>
    </div>

    <div class="section col-lg-12 col-sm-12 col-xs-12 col-md-12 pt-5 layout-main" style="height:auto">
        <div class="text">
            <p>New Words</p>
        </div>
        <div class="line mx-auto"></div>
        {{--    card group--}}
        <div class="container" style="max-width: 70%" id="max-width">
            <div class="row">

                @foreach($all_dictionary as $key => $lienquan)
                    <div class="card-group col-12 col-md-6 col-lg-4 style-card">
                        <div class="card shadow rounded">
                            <div class="card-img">
                                <img src="{{ URL::to('/uploads/dictionary/'.$lienquan->dictionary_image) }}"
                                     class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <a href="{{URL::to('/chi-tiet-tu-dien/'.$lienquan->dictionary_id)}}"/>
                                <p class="card-title">{{ $lienquan->dictionary_name_eng }}</p>
                            </div>

                        </div>

                    </div>
                @endforeach
                <div class="card-group col-12 col-md-6 col-sm-12 style-card">
                    <ul class="pagination">
                        <li><a>{{$all_dictionary->links()}}</a></li>
                    </ul>
                </div>
            </div>


            {{--        <div class="card">--}}
            {{--            <img src="..." class="card-img-top" alt="...">--}}
            {{--            <div class="card-body">--}}
            {{--                <h5 class="card-title">Card title</h5>--}}
            {{--                <p class="card-text"></p>--}}

            {{--                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="card">--}}
            {{--            <img src="..." class="card-img-top" alt="...">--}}
            {{--            <div class="card-body">--}}
            {{--                <h5 class="card-title">Card title</h5>--}}
            {{--                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>--}}
            {{--                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
        {{--    old code--}}
        {{--    <div class="col-xs-6 col-6 col-sm-10 col-10 col-md-10 col-lg-10 mx-auto mb-5 layout-content">--}}
        {{--        <div--}}
        {{--            class=" col-10 col-md-10 col-lg-10 mx-auto mb-5 d-flex flex-wrap align-content-center  justify-content-between layout-content">--}}
        {{--            @foreach($all_dictionary as $key => $lienquan)--}}
        {{--            <div class="col-sm-3 m-1 shadow   bg-white rounded " style="">--}}
        {{--                <a href="{{URL::to('/chi-tiet-tu-dien/'.$lienquan->dictionary_id)}}">--}}

        {{--                    <p>{{ $lienquan->dictionary_name_eng }}</p>--}}

        {{--                    <img src="{{ URL::to('/uploads/dictionary/'.$lienquan->dictionary_image) }}" alt=""--}}
        {{--                        style="width:50%" />--}}
        {{--                </a>--}}
        {{--            </div>--}}
        {{--            @endforeach--}}
        {{--            <span>{{$all_dictionary ->links()}}</span>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>


@endsection
