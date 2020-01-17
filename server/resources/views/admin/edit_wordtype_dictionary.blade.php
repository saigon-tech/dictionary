@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhập danh mục sản phẩm
            </header>
            <?php
                    $message = Session::get('message');
                    if($message)
                    {
                            echo '<span. class="text-alert">'. $message.'</span>';
                            // $message = Session::get('message');
                            Session::put('message',null);
                    }
                    ?>
            <div class="panel-body">
                @foreach($edit_wordtype_dictionary as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/update-wordtype-dictionary/'.$edit_value->wordtype_id) }}"
                        method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{ $edit_value->wordtype_name }}" name="wordtype_dictionary_name"
                                class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control ckeditor"
                                name="wordtype_dictionary_desc" id="exampleInputPassword1"
                                placeholder="Mô tả danh mục">{{$edit_value->wordtype_desc}}</textarea>
                        </div>



                        <button type="submit" name="update_wordtype_dictionary" class="btn btn-info">Thêm danh
                            mục</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection