{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '曲一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/music/create">曲新規作成</a>
    <button type="button" class="delete-confirm btn btn-primary" value="A003" data-toggle="modal" data-target="#searchBox">検索</button>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>曲名</th>
        <th>アーティスト</th>
        <th>時間</th>
        <th>最高得点</th>
        <th>キー</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($musics as $music)
        <tr>
          <td>{{ $music -> id }}</td>
          <td>{{ $music -> music_title }}</td>
          <td>{{ $music -> artist }}</td>
          <td>{{ $music -> time }}</td>
          <td>{{ number_format($music -> high_score,3) }}</td>
          <td>{{ $music -> key }}</td>
          <td>
            <a class="btn btn-primary" href="/music/{{$music->id}}">詳細</a>
            <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal（削除用） -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">確認</h5>
              <h6>{{$music->id}}</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              削除しますか？
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
              <a class="btn btn-success" href="/music/{{$music->id}}/logicDelete" name="deletebtn">はい</a>
          </div>
      </div>
    </div>
  </div>

  <!-- Modal（検索用） -->
  <div class="modal fade" id="searchBox" tabindex="-1" role="dialog">
    @include('sub.search')
  </div>

  <script>
    $('.confirm-delete').click(function(){
        $('#deletebtn').val( $(this).val() );
    });

    $('.searchBox').click(function(){
        $('#searchBox').val( $(this).val() );
    });
  </script>

@endsection
