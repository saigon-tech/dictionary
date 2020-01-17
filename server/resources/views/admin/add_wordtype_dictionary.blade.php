@extends('Layouts.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Word Type
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
                    <form role="form" action="{{ URL::to('/save-wordtype-dictionary') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name WordType</label>
                            <input type="text" name="wordtype_dictionary_name" class="form-control"
                                id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea style="resize: none" rows="8" class="form-control ckeditor"
                                name="wordtype_dictionary_desc" id="exampleInputPassword1"
                                placeholder="Mô tả danh mục"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Show</label>
                            <select name="wordtype_dictionary_status" class="form-control input-sm m-bot15">
                                <option value="0">Show</option>
                                <option value="1">Hide</option>

                            </select>
                        </div>

                        <button type="submit" name="add_wordtype_dictionary" class="btn btn-info">Add WordType</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection