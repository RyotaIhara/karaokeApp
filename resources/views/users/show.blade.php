{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toIndexPage">
    <a class="btn btn-success" href="/user">ユーザ一覧へ</a>
  </div>
  <table class="table table-bordered">
    <tr>
      <th width="20%">ユーザー名：</th>
      <td width="80%">{{ $user -> user_name }}</td>
    </tr>
    <tr>
      <th width="20%">フルネーム：</th>
      <td width="80%">{{ $user -> user_full_name }}</td>
    </tr>
    <tr>
      <th width="20%">メールアドレス：</th>
      <td width="80%">{{ $user -> email }}</td>
    </tr>
    <tr>
      <th width="20%">権限：</th>
      <td width="80%">
        @if ($user -> admin == 1)
          <?php echo "権限あり"; ?>
        @else
          <?php echo "権限なし"; ?>
        @endif
      </td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/user/{{$user->id}}/edit">編集</a>
  <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>

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
                <a class="btn btn-success" href="/user/{{$user->id}}/logicDelete" name="deletebtn">はい</a>
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
