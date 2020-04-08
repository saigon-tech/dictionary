@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Category
                </header>
                <?php
                $message = Session::get('message');
                if($message)
                {
                    echo '<span. class="text-alert">'. $message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">
                    @foreach($edit_category_dictionary as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{ route('update.category', [$edit_value->category_id])}}"
                                  method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Category</label>
                                    <input type="text" value="{{ $edit_value->category_name }}" name="category_dictionary_name"
                                           class="form-control" id="exampleInputEmail1" placeholder="Name Category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description Category</label>
                                    <textarea style="resize: none" rows="8" class="form-control ckeditor"
                                              name="category_dictionary_desc" id="exampleInputPassword1"
                                              placeholder="Description Category">{{$edit_value->category_desc}}</textarea>
                                </div>



                                <button type="submit" name="update_category_product" class="btn btn-info">Update Category</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
@endsection
