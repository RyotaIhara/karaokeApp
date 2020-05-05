{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '場面一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/scene/create">場面新規作成</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>場面</th>
        <th>備考</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($scenes as $scene)
        <tr>
          <td>{{ $scene -> scene_name }}</td>
          <td>{{ $scene -> scene_remark }}</td>
          <td>
            <a class="btn btn-primary" href="/scene/{{$scene->id}}">詳細</a>
            <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    @include('sub.delete')
  </div>

  <script>
    $('.delete-confirm').click(function(){
        $('#deletebtn').val( $(this).val() );
    });
  </script>

@endsection
