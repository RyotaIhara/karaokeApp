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
      <td width="80%">{{ $user -> name }}</td>
    </tr>
    <tr>
      <th width="20%">フルネーム：</th>
      <td width="80%">{{ $user -> full_name }}</td>
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
  <a class="btn btn-danger" href="/user/{{$user->id}}/logicDelete">削除</a>
@endsection
