{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'カテゴリ一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <a href="/category/create">カテゴリ新規作成</a>
  <table>
    <tr>
      <th>カテゴリ名</th>
      <th>備考</th>
    </tr>
    @foreach ($categories as $category)
        <tr>
          <td>{{ $category -> name }}</td>
          <td>{{ $category -> remark }}</td>
          <td>
            <a href="/category/{{$category->id}}">詳細を表示</a>
          </td>
        </tr>
    @endforeach
@endsection
