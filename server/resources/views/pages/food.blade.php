@extends('client')
@section('contanier')

<head>
    <link rel="stylesheet" href="{{asset ('public/frontend/detail/styledetail.css') }}">
</head>
<div class="container-fluid">
    <div class="row"></div>
    <div class="main-page col-12 col-md-12 col-lg-12 mx-auto">
        <div class="tag col-4 col-md-3 col-lg-2">
            <span>Food</span>
        </div>
        <div class="info col-10 col-md-8 col-lg-8 mx-auto">
            <div class="img col-10 col-md-9 col-lg-8 col-xl-7 mx-auto pt-4" style="height:50vh">
                <img src="{{URL::to ('resources/Image/One.jpg') }}" alt="" style="height:100%">
            </div>
            <div class="text col-9 col-md-9 col-lg-9 mx-auto d-flex flex-wrap justify-content-start " >

                @foreach ($all_dictionary as $key => $food)
                <div class="col-sm-4 mb-4   ">

                    <a  class="text-center" href="{{ URL::to('/chi-tiet-tu-dien/'.$food->dictionary_id)}}">
                        <p style="color:black;font-weight: 450;">{{ $food->dictionary_name_eng }}</p>
                    </a>

                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>
@endsection
