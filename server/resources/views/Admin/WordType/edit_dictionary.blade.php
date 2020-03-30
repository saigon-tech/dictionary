@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Dictionary
            </header>
            <div class="panel-body">
                <?php
                            $message = Session::get('message');
                            if($message)
                            {
                                    echo '<span. class="text-alert">'. $message.'</span>';
                                    // $message = Session::get('message');
                                    Session::put('message',null);
                            }
                            ?>
                <div class="position-center">
                    @foreach($edit_dictionary as $key=>$dicti)
                    <form role="form" action="{{  route('update.wordtype', [$dicti->dictionary_id]) }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name From English</label>
                            <input type="text" name="dictionary_name_eng" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên danh mục" value="{{$dicti->dictionary_name_eng  }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name From Vietnam</label>
                            <input type="text" name="dictionary_name_vn" class="form-control" id="exampleInputEmail1"
                                value="{{$dicti->dictionary_name_vn }}" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Picture</label>
                            <input type="file" name="dictionary_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên danh mục">
                            <img src="{{ URL::to('public/uploads/dictionary/'.$dicti->dictionary_image ) }}"
                                style="width:80px;height=80px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea style="resize: none" rows="8" class="form-control ckeditor" name="dictionary_desc"
                                id="exampleInputPassword1"
                                placeholder="Mô tả sản phẩm">{{$dicti->dictionary_desc }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Wordtype</label>
                            <select name="dictionary_wordtype" class="form-control input-sm m-bot15">
                                @foreach($wordtype_dictionary as $key =>$wordtype)
                                @if($wordtype->wordtype_id==$dicti->wordtype_id)
                                <option selected value="{{ $wordtype->wordtype_id }}">{{ $wordtype->wordtype_name }}
                                </option>

                                @else
                                <option value="{{ $wordtype->wordtype_id }}">{{ $wordtype->wordtype_name }}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">AlPhabet</label>
                            <select name="dictionary_alphabet" class="form-control input-sm m-bot15">
                                @foreach($alphabet_dictionary as $key =>$alphabet)
                                @if($alphabet->alphabet_id==$dicti->alphabet_id)
                                <option selected value="{{ $alphabet->alphabet_id }}">{{ $alphabet->alphabet_name }}
                                </option>

                                @else
                                <option value="{{ $alphabet->alphabet_id }}">{{ $alphabet->alphabet_name }}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Show</label>
                            <select name="dictionary_status" class="form-control input-sm m-bot15">
                                <option value="0">Show</option>
                                <option value="1">Hide</option>

                            </select>
                        </div>

                        <button type="submit" name="add_dictionary" class="btn btn-info">Update Dictionary</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
