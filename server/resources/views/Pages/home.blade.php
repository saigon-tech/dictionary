@extends('client')
@section('container')
    <div class="container-fluid">
        <div class="main-page">
            <div class="into-main-page col-10 col-md-10 col-lg-8 mx-auto d-lg-flex justify-content-between pt-5 ">
                <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12 pl-0 pr-0">
                    Câu slogan
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12 pl-0 pr-0">
                    <img src="{{ asset('public/image/lsls.jpg') }}" alt=""></div>
            </div>
        </div>

        <div class="section col-lg-12 col-sm-12 col-xs-12 col-md-12 pt-5">
            <div class="text">
                <p>Các Từ Vựng Mới</p>
            </div>
            <div class="line mx-auto"></div>
            <div class="col-xs-6 col-6 col-sm-10 col-10 col-md-10 col-lg-10 mx-auto mb-5">

                <div
                        class=" col-10 col-md-10 col-lg-10 mx-auto mb-5 d-flex flex-wrap align-content-center  justify-content-between">
                    @foreach($all_dictionary as $key => $lienquan)
                        <div class="col-sm-3 m-1 shadow   bg-white rounded " style="">
                            <a href="{{URL::to('/chi-tiet-tu-dien/'.$lienquan->dictionary_id)}}">

                                <p>{{ $lienquan->dictionary_name_eng }}</p>

                                <img src="{{ URL::to('/public/uploads/dictionary/'.$lienquan->dictionary_image) }}"
                                     alt=""
                                     style="width:50%"/>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection


