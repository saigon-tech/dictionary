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
                        @foreach($edit_dictionary as $key => $dictionary)
                            <form role="form" action="{{  route('update.dictionary', [$dictionary->dictionary_id]) }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name From English</label>
                                    <input type="text" name="dictionary_name_eng" class="form-control" id="exampleInputEmail1"
                                           placeholder="Name From English" value="{{$dictionary->dictionary_name_eng  }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name From Vietnamese</label>
                                    <input type="text" name="dictionary_name_vn" class="form-control" id="exampleInputEmail1"
                                           value="{{$dictionary->dictionary_name_vn }}" placeholder="Name From Vietnamese">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Picture</label>
                                    <input type="file" name="dictionary_image" class="form-control" id="exampleInputEmail1"
                                           placeholder="Picture">
                                    <img src="{{ URL::to('public/uploads/dictionary/'.$dictionary->dictionary_image ) }}"
                                         style="width:80px;height:80px" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="8" class="form-control ckeditor" name="dictionary_desc"
                                              id="exampleInputPassword1"
                                              placeholder="Description">{{$dictionary->dictionary_desc }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select name="dictionary_category" class="form-control input-sm m-bot15">
                                        @foreach($category_dictionary as $key =>$category)
                                            @if($category->category_id==$dictionary->category_id)
                                                <option selected value="{{ $category->category_id }}">{{ $category->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alphabet</label>
                                    <select name="dictionary_alphabet" class="form-control input-sm m-bot15">
                                        @foreach($alphabet_dictionary as $key =>$alphabet)
                                            @if($alphabet->alphabet_id==$dictionary->alphabet_id)
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
