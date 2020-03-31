@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Listed Alphabet
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
          <a href="{{ route('add.alphabet') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Alphabet</a>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{ URL::to('/tim-kiem-alphabet') }}" method="POST">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="input-sm form-control" name="keywords_submit" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit" name="search_items">Go!</button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <div class="table-responsive">
      <?php
                $message = Session::get('message');
                if($message)
                {
                        echo '<span. class="text-alert">'. $message.'</span>';
                        // $message = Session::get('message');
                        Session::put('message',null);
                }
                ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Alphabet</th>
            <th>Description</th>
            <th style="width:30px;">Show</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_alphabet_dictionary as $key =>$alphabet_dis)
          <tr>
            <td>{{$alphabet_dis->alphabet_name }}</td>
            <td>{!! $alphabet_dis->alphabet_desc !!}</td>
            <td><span class="text-ellipsis">
                <?php
                    if($alphabet_dis->alphabet_status==0){
                        ?>
                <a href="{{ route('unactive.alphabet', [$alphabet_dis->alphabet_id]) }}"><span
                    class="fa-thumb-styling-one fa fa-thumbs-up" style="font-size: 28px;
    color: green;"></span></a>
                <?php
                    }
                    else {
                        ?>
                <a href="{{ route('active.alphabet', [$alphabet_dis->alphabet_id]) }}"><span class="
                  fa-thumb-styling-two fa fa-thumbs-down" style="font-size: 28px;
    color: red;"></span></a>
              <?php
                    }
                    ?>
              </span></td>

            <td>
              <a href="{{ route('edit.alphabet', [$alphabet_dis->alphabet_id]) }}"
                class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Ban cố chắc xóa danh mục này không ')"
                href="{{ route('destroy.alphabet', [$alphabet_dis->alphabet_id]) }}"
                class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
