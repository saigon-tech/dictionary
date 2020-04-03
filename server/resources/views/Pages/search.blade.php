@extends('client')
@section('container')
<div class="container-fluid" style="height:auto;">
    <div class="row" style="height:auto;">
        <div class="main-page col-12 col-md-12 col-lg-12" style="height:auto;  background-color: #F2F2F2 !important">
            <div class="thong-tin col-10 col-md-10 col-lg-8 mx-auto mb-5" style=" height:auto">
                <div class="col-12  d-flex flex-wrap align-content-center  justify-content-between">
                    @foreach($search_dictionary as $key => $dictionary)
                    <div class="col-sm-3 m-2 shadow  m-1 bg-white rounded">
                        <a href="{{URL::to('/chi-tiet-tu-dien/'.$dictionary->dictionary_id)}}">
                            <h2 style="width: 100% ;color:#BE2031"><b>English:</b>{{$dictionary->dictionary_name_eng}}
                            </h2>
                            <p style="width: 100%"><b>Vietnamese: </b> {{$dictionary->dictionary_name_vn}}</p>
                            <img src="{{ URL::to('public/uploads/dictionary/'.$dictionary->dictionary_image) }}"
                                style="width: 40%;" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
