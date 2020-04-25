{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ編集；')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>編集画面</h1>
  <a href="/user/{{$user->id}}">詳細画面に戻る</a>
  <form action="{{ route("user.update", $user->id) }}" method="post">
    <table>
      @csrf
      @method('PUT')
      <tr>
        <th>name: </th>
      <td><input type="text" name="name" value="{{$user->name}}"></td>
      </tr>
      <tr>
        <th>full_name: </th>
        <td><input type="text" name="full_name" value="{{$user->full_name}}"></td>
      </tr>
      <tr>
        <th>email: </th>
        <td><input type="text" name="email" value="{{$user->email}}"></td>
      </tr>
      <tr>
        <th>password: </th>
        <td><input type="text" name="password" value="{{$user->password}}"></td>
      </tr>
      <tr>
        <th>admin: </th>
        <td>
          <input type="radio" name="admin" value="1" {{ $user->admin === 1? 'checked="checked"' : '' }}>権限あり
          <input type="radio" name="admin" value="0" {{ $user->admin === 0? 'checked="checked"' : '' }}>権限なし
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
