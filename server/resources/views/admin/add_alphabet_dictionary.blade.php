@extends('admin_layout')
@section('admin_content')
<div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm danh mục Bảng Chữ cái
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
                            <form role="form" action="{{ URL::to('/save-alphabet-dictionary') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Bảng Chữ cái</label>
                                    <input type="text" name="alphabet_dictionary_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Bảng Chữ cái</label>
                                    <textarea style="resize: none" rows="8" class="form-control ckeditor" name="alphabet_dictionary_desc" 
                                    id="exampleInputPassword1" placeholder="Mô tả Bảng Chữ cái"></textarea>
                                </div>

                            <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="alphabet_dictionary_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                            </div>
                         
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm Bảng Chữ cái</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
</div>
@endsection