@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Dictionary
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
                    <form role="form" action="{{ route('save.dictionary') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name from English</label>
                            <input type="text" name="dictionary_name_eng" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên Từ Tiếng anh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name from VietNam</label>
                            <input type="text" name="dictionary_name_vn" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên Từ Tiếng Việt">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Picture</label>
                            <input type="file" name="dictionary_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Hình ảnh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea style="resize: none" rows="8" class="form-control ckeditor" name="dictionary_desc"
                                id="exampleInputPassword1" placeholder="Mô tả Từ điển"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="dictionary_category" class="form-control input-sm m-bot15">
                                @foreach($category_dictionary as $key =>$category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alphabet</label>
                            <select name="dictionary_alphabet" class="form-control input-sm m-bot15">
                                @foreach($alphabet_dictionary as $key =>$alphabet)
                                <option value="{{ $alphabet->alphabet_id }}">{{ $alphabet->alphabet_name }}</option>
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

                        <button type="submit" name="add_dictionary" class="btn btn-info">Add Dictionary</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
