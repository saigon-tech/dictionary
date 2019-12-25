@extends('client')
@section('contanier')
<div class="container-fluid" style="height:auto;  background-color: #F2F2F2 !important">
    <div class="row" style="height:auto;">
        <div class="main-page col-12 col-md-12 col-lg-12" style="height:auto;background-color: #F2F2F2 !important">
            <div class="thong-tin col-10 col-md-10 col-lg-8 mx-auto mb-5" style=" height:auto">
                @foreach($details_dictionary as $key => $dictionary)
                <h1 style="width: 100%"><b>English:</b>{{$dictionary->dictionary_name_eng}}</h1>
                <br>
                <p style="width: 100%"><b>Vietnamese: </b> {{$dictionary->dictionary_name_vn}}</p>
                <p> <b>Description: </b> {!! $dictionary->dictionary_desc !!} </p>
                <img src="{{ URL::to('public/uploads/dictionary/'.$dictionary->dictionary_image) }}"
                    class="shadow   bg-white rounded" style="width: 40%;" alt="">
                <p style="width: 100%"><b>Alphabet: </b>{{$dictionary->alphabet_name}} </p>
                <p style="width: 100%"><b>Word Type: </b>{{$dictionary->wordtype_name}}</p>

                @endforeach
                <h2>Từ Liên quan.</h2>

                <div
                    class=" col-12 col-md-12 col-lg-12 mx-auto d-flex flex-wrap align-content-center  justify-content-between">
                    @foreach($relate as $key => $lienquan)
                    <a href="{{URL::to('/chi-tiet-tu-dien/'.$lienquan->dictionary_id)}}">
                        <div class="col-sm-3 shadow  p-3 bg-white rounded">
                            <p>{{ $lienquan->dictionary_name_eng }}</p>

                            <img src="{{ URL::to('/public/uploads/dictionary/'.$lienquan->dictionary_image) }}" alt=""
                                style="width:80%" />
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
</div>
@endsection