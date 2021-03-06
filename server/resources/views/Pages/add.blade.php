@extends('client')
@section('container')
<div class="hidden2"></div>
<div class="col-12 col-xl-12 col-lg-12 " style="margin-top: 8rem!important;">
    <div class="bg-white col-xl9 my-5 mx-auto col-md-12 shadow rounded p-5" style="height:auto; Border-radius: 3% !important">
        <div class="col-lg-12 ">
            <section class="panel ">
                <p style="font-size:3.8vw;text-align: center;"> NEW WORD</p>
                <div class="panel-body">
                    <?php
                            $message = Session::get('message');
                            if($message)
                            {
                                    echo '<span. class="text-alert">'. $message.'</span>';
                                    Session::put('message',null);
                            }
                            ?>
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-add-dictionary') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name from English</label>
                                <input type="text" name="dictionary_name_eng" class="form-control"
                                    id="exampleInputEmail1" placeholder="Name from English">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name from Vietnamese</label>
                                <input type="text" name="dictionary_name_vn" class="form-control"
                                    id="exampleInputEmail1" placeholder="Name from Vietnamese">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Picture </label>
                                <input type="file" name="dictionary_image" class="form-control" id="exampleInputEmail1"
                                    placeholder="Picture">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea style="resize: none" rows="8" class="form-control ckeditor"
                                    name="dictionary_desc" id="exampleInputPassword1"
                                    placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Category </label>
                                <select name="dictionary_category" class="form-control input-sm m-bot15">
                                    @foreach($category_dictionary as $key =>$category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alphabet</label>
                                <select name="dictionary_alphabet" class="form-control input-sm m-bot15">
                                    @foreach($alphabet as $key =>$alphabet_search)
                                    <option value="{{ $alphabet_search->alphabet_id }}">
                                        {{ $alphabet_search->alphabet_name }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit" name="add_dictionary" class="btn btn-danger btn-lg ">Add New Word</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
@endsection
