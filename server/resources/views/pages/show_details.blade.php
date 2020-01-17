@extends('Layouts.client')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="main-page col-12 col-md-12 col-lg-12" style="height:auto;">
                <div class="thong-tin col-10 col-md-10 col-lg-8 mx-auto mb-5">
                    @foreach($details_dictionary as $key => $dictionary)
                        <h1 style="width: 100%">{{$dictionary->dictionary_name_eng}}</h1>
                        <br>
                        <p>{{$dictionary->dictionary_name_vn}}</p>
                        <p>{!! $dictionary->dictionary_desc !!} </p>
                        <img src="{{ asset('public/uploads/dictionary/'.$dictionary->dictionary_image) }}"
                             class="shadow bg-white rounded" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
