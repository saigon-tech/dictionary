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
        <div class="container" style="max-width: 70%" id="max-width">
            <div class="row">
                @foreach($all_dictionary as $key => $lienquan)
                    <div class="card-group col-12 col-md-6 col-lg-4 style-card">
                        <div class="card shadow rounded">
                            <div class="card-img">
                                <img src="{{ url('/public/uploads/dictionary/'.$lienquan->dictionary_image) }}"
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
        </div>
    </div>


@endsection
