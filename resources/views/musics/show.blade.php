{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '曲詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toIndexPage">
    <a class="btn btn-success" href="/music">曲一覧へ</a>
  </div>
  <table class="table table-bordered">
    <tr>
      <th width="20%">曲名</th>
      <td width="80%">{{ $music -> music_title }}</td>
    </tr>
    <tr>
      <th width="20%">アーティスト</th>
      <td width="80%">{{ $music -> artist }}</td>
    </tr>
    <tr>
      <th width="20%">ジャンル</th>
      <td width="80%">{{ $music -> category -> category_name }}</td>
    </tr>
    <tr>
      <th width="20%">場面</th>
      <td width="80%">{{ $music -> scene -> scene_name }}</td>
    </tr>
    <tr>
      <th width="20%">時間</th>
      <td width="80%">{{ $music -> time }}</td>
    </tr>
    <tr>
      <th width="20%">最高得点</th>
      <td width="80%">{{ number_format($music -> high_score,3) }}</td>
    </tr>
    <tr>
      <th width="20%">平均得点</th>
      <td width="80%">{{ number_format($music -> average_score,3) }}</td>
    </tr>
    <tr>
      <th width="20%">キー</th>
      <td width="80%">{{ $music -> key }}</td>
    </tr>
    <tr>
      <th width="20%" height="150">備考</th>
      <td width="80%" height="150">{{ $music -> music_remark }}</td>
    </tr>
    <tr>
      <th width="20%">お気に入り</th>
      <td width="80%">
        @if ($music -> favorite_flg == 1)
          <?php echo "○"; ?>
        @else
          <?php echo "-"; ?>
        @endif
      </td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/music/{{$music->id}}/edit">編集</a>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-whatever="{{$music->id}}">削除</button>

  <!-- Modal（削除用） -->
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
            <a class="btn btn-success" id="parse" href="" name="deletebtn">はい</a>
          </div>
      </div>
    </div>
  </div>

  <script>
    // 削除確認モーダル出力
    $('#confirm-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
      var delete_id = button.data('whatever') //data-whatever の値を取得
      console.log(delete_id)

      // aタグのhrefを操作する 
      var target = document.getElementById("parse")
      target.href = "/music/" + String(delete_id) + "/logicDelete"

      var modal = $(this)  //モーダルを取得
    })
  </script>

@endsection
