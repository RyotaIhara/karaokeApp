{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'カテゴリ詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <a href="/category">カテゴリ一覧へ</a>
  <table>
    <tr>
      <th>カテゴリ名：</th>
      <td>{{ $category -> name }}</td>
    </tr>
    <tr>
      <th>備考：</th>
      <td>{{ $category -> remark }}</td>
    </tr>
    <tr>
      <th>操作：</th>
      <td>
        <a href="/category/{{$category->id}}/edit">編集</a>
        <a href="/category/{{$category->id}}/logicDelete">削除</a>
      </td>
    </tr>
@endsection
