{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '曲一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/scene/create">曲新規作成</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>曲名</th>
        <th>アーティスト</th>
        <th>ジャンル</th>
        <th>場面</th>
        <th>時間</th>
        <th>最高得点</th>
        <th>平均得点</th>
        <th>キー</th>
        <!--<th>お気に入り</th>-->
        <th>備考</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($musics as $music)
        <tr>
          <td>{{ $music -> music_title }}</td>
          <td>{{ $music -> artist }}</td>
          <td>{{ $music -> category -> category_name }}</td>
          <td>{{ $music -> scene -> scene_name }}</td>
          <td>{{ $music -> time }}</td>
          <td>{{ $music -> high_score }}</td>
          <td>{{ $music -> average_score }}</td>
          <td>{{ $music -> key }}</td>
          <!--<td>お気に入り</td>-->
          <td>{{ $music -> music_remark }}</td>
          <td>
            <a class="btn btn-primary" href="/music/{{$music->id}}">詳細</a>
            <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">確認</h5>
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

  <script>
    $('.delete-confirm').click(function(){
        $('#deletebtn').val( $(this).val() );
    });
  </script>

@endsection
