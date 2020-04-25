{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ追加')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>追加画面</h1>
  <a href="/user">ユーザ一覧へ</a>
  @if (count($errors))
      <div>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif
  <form action="{{ route("user.store") }}" method="post"> 
    <table>
      @csrf
      <tr>
        <th>ユーザー名: </th>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <th>フルネーム: </th>
        <td><input type="text" name="full_name"></td>
      </tr>
      <tr>
        <th>メールアドレス: </th>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <th>パスワード: </th>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <th>パスワード（確認）: </th>
        <td><input type="password" name="password_confirmation"></td>
      </tr>
      <tr>
        <th>権限: </th>
        <td>
          <input type="radio" name="admin" value="1">権限あり
          <input type="radio" name="admin" value="0" checked="checked">権限なし
        </td>
      </tr>
      <tr>
        <th></th><td>
          <input type="submit" value="send">送信
        </td>
      </tr>
    </table>
  </form>
@endsection
