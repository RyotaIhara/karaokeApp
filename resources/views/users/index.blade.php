{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <table>
    <tr>
      <th>ユーザー名</th>
      <th>フルネーム</th>
      <th>メールアドレス</th>
      <th>権限</th>
      <th>操作</th>
    </tr>
    @foreach ($users as $user)
        <tr>
          <td>{{ $user -> name }}</td>
          <td>{{ $user -> full_name }}</td>
          <td>{{ $user -> email }}</td>
          <td>
            @if ($user -> admin == 1)
              <?php echo "権限あり"; ?>
            @else
              <?php echo "権限なし"; ?>
            @endif
          </td>
          <td>
            <a href="/user/{{$user->id}}">詳細を表示</a>
          </td>
        </tr>
    @endforeach
@endsection
