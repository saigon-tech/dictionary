@extends('client')
@section('container')
    <div class="container-fluid" style="height:auto;  background-color: #F2F2F2 !important">
        <div class="row" style="height:auto;">
            <div class="main-page col-12 col-md-12 col-lg-12" style="height:auto;background-color: #F2F2F2 !important">
                <div class="thong-tin col-10 col-md-10 col-lg-8 mx-auto mb-5" style=" height:auto">
                    @foreach($details_dictionary as $key => $dictionary)
                        <h1 style="width: 100%">{{$dictionary->dictionary_name_eng}}</h1>
                        <br>
                        <p style="width: 100%"><b>Vietnamese: </b> {{$dictionary->dictionary_name_vn}}</p>
                        <p><b>Description: </b> {!! $dictionary->dictionary_desc !!} </p>
                        <img src="{{ URL::to('public/uploads/dictionary/'.$dictionary->dictionary_image) }}"
                             class="shadow   bg-white rounded" style="width: 40%;" alt="">
                    @endforeach
                </div>
            </div>
        </div>

@endsection
