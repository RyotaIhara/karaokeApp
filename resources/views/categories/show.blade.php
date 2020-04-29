{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'カテゴリ詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toIndexPage">
    <a class="btn btn-success" href="/category">カテゴリ一覧へ</a>
  </div>
  <table class="table table-bordered">
    <tr>
      <th width="20%">カテゴリ名</th>
      <td width="80%">{{ $category -> name }}</td>
    </tr>
    <tr>
      <th width="20%" height="150">備考</th>
      <td width="80%" height="150">{{ $category -> remark }}</td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/category/{{$category->id}}/edit">編集</a>
  <a class="btn btn-danger" href="/category/{{$category->id}}/logicDelete">削除</a>
@endsection
