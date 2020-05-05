{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/user/create">新規作成</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ユーザー名</th>
        <th>フルネーム</th>
        <th>メールアドレス</th>
        <th>権限</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
          <tr>
            <td>{{ $user -> user_name }}</td>
            <td>{{ $user -> user_full_name }}</td>
            <td>{{ $user -> email }}</td>
            <td>
              @if ($user -> admin == 1)
                <?php echo "権限あり"; ?>
              @else
                <?php echo "権限なし"; ?>
              @endif
            </td>
            <td>
              <a class="btn btn-primary" href="/user/{{$user->id}}">詳細</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-whatever="{{$user->id}}">削除</button>
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
      target.href = "/user/" + String(delete_id) + "/logicDelete"

      var modal = $(this)  //モーダルを取得
    })
  </script>

@endsection
