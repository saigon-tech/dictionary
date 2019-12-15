@extends('admin_layout')
@section('admin_content')
<div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm  sản phẩm
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
                            <form role="form" action="{{ URL::to('/save-dictionary') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Từ Tiếng anh</label>
                                    <input type="text" name="dictionary_name_eng" class="form-control" id="exampleInputEmail1" placeholder="Tên Từ Tiếng anh">
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Từ Tiếng Việt</label>
                                        <input type="text" name="dictionary_name_vn" class="form-control" id="exampleInputEmail1" placeholder="Tên Từ Tiếng Việt">
                                    </div>
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh </label>
                                        <input type="file" name="dictionary_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh">
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Từ điển</label>
                                    <textarea style="resize: none" rows="8" class="form-control ckeditor"  name="dictionary_desc"
                                    id="exampleInputPassword1" placeholder="Mô tả Từ điển"></textarea>
                                </div>
                                
                                    <div class="form-group">
                                            <label for="exampleInputPassword1">Loại Từ </label>
                                              <select name="dictionary_wordtype" class="form-control input-sm m-bot15">
                                                @foreach($wordtype_dictionary as $key =>$wordtype)
                                                    <option value="{{ $wordtype->wordtype_id }}">{{ $wordtype->wordtype_name }}</option>
                                                @endforeach
                                                    
                                            </select>
                                    </div>   
                                    <div class="form-group">
                                            <label for="exampleInputPassword1">Bảng Chữ Cái</label>
                                                <select name="dictionary_alphabet" class="form-control input-sm m-bot15">
                                                    @foreach($alphabet_dictionary as $key =>$alphabet)
                                                    <option value="{{ $alphabet->alphabet_id }}">{{ $alphabet->alphabet_name }}</option>
                                                    @endforeach
                                                        
                                                </select>
                                            </div>
                            <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="dictionary_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                                </div>
                         
                                <button type="submit" name="add_dictionary" class="btn btn-info">Thêm Sản phẩm</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
</div>
@endsection