{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'カテゴリ編集；')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>編集画面</h1>
  <a href="/category/{{$category->id}}">詳細画面に戻る</a>
  @if (count($errors))
      <div>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif
  <form action="{{ route("category.update", $category->id) }}" method="post">
    <table>
      @csrf
      @method('PUT')
      <tr>
        <th>ユーザー名: </th>
      <td><input type="text" name="name" value="{{$category->name}}"></td>
      </tr>
      <tr>
        <th>フルネーム: </th>
        <td><input type="text" name="full_name" value="{{$category->remark}}"></td>
      </tr>
      <tr>
        <th></th><td>
          <input type="submit" value="send">送信
        </td>
      </tr>
    </table>
  </form>
@endsection
