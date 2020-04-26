{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ追加')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>追加画面</h1>
  <a href="/category">カテゴリ一覧へ</a>
  @if (count($errors))
      <div>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif
  <form action="{{ route("category.store") }}" method="post"> 
    <table>
      @csrf
      <tr>
        <th>カテゴリ名: </th>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <th>備考: </th>
        <td><input type="text" name="remark"></td>
      </tr>
      <tr>
        <th></th><td>
          <input type="submit" value="send">送信
        </td>
      </tr>
    </table>
  </form>
@endsection
