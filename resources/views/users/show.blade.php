{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <table>
    <tr>
      <th>ユーザー名：</th>
      <td>{{ $user -> name }}</td>
    </tr>
    <tr>
      <th>フルネーム：</th>
      <td>{{ $user -> full_name }}</td>
    </tr>
    <tr>
      <th>メールアドレス：</th>
      <td>{{ $user -> email }}</td>
    </tr>
    <tr>
      <th>権限：</th>
      <td>
        @if ($user -> admin == 1)
          <?php echo "権限あり"; ?>
        @else
          <?php echo "権限なし"; ?>
        @endif
      </td>
    </tr>
@endsection
