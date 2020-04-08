@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Alphabet
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
                @foreach($edit_alphabet_dictionary as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ route('update.alphabet', [$edit_value->alphabet_id]) }}"
                        method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Alphabet</label>
                            <input type="text" value="{{ $edit_value->alphabet_name }}" name="alphabet_dictionary_name"
                                class="form-control" id="exampleInputEmail1" placeholder="Name Alphabet">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description Alphabet</label>
                            <textarea style="resize: none" rows="8" class="form-control ckeditor"
                                name="alphabet_dictionary_desc" id="exampleInputPassword1"
                                placeholder="Description Alphabet">{{$edit_value->alphabet_desc}}</textarea>
                        </div>



                        <button type="submit" name="update_category_product" class="btn btn-info">Update Alphabet</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection
