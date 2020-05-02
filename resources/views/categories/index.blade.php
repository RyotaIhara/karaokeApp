{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'カテゴリ一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/category/create">カテゴリ新規作成</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>カテゴリ名</th>
        <th>備考</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category -> category_name }}</td>
          <td>{{ $category -> category_remark }}</td>
          <td>
            <a class="btn btn-primary" href="/category/{{$category->id}}">詳細</a>
            <a class="btn btn btn-danger" href="/category/{{$category->id}}/logicDelete">削除</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection
