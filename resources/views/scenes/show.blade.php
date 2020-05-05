{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '場面詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toIndexPage">
    <a class="btn btn-success" href="/scene">場面一覧へ</a>
  </div>
  <table class="table table-bordered">
    <tr>
      <th width="20%">場面</th>
      <td width="80%">{{ $scene -> scene_name }}</td>
    </tr>
    <tr>
      <th width="20%" height="150">備考</th>
      <td width="80%" height="150">{{ $scene -> scene_remark }}</td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/scene/{{$scene->id}}/edit">編集</a>
  <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>

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
