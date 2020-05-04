{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '曲詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toIndexPage">
    <a class="btn btn-success" href="/music">曲一覧へ</a>
  </div>
  <table class="table table-bordered">
    <tr>
      <th width="20%">曲名</th>
      <td width="80%">{{ $music -> music_title }}</td>
    </tr>
    <tr>
      <th width="20%">アーティスト</th>
      <td width="80%">{{ $music -> artist }}</td>
    </tr>
    <tr>
      <th width="20%">ジャンル</th>
      <td width="80%">{{ $music -> category -> category_name }}</td>
    </tr>
    <tr>
      <th width="20%">場面</th>
      <td width="80%">{{ $music -> scene -> scene_name }}</td>
    </tr>
    <tr>
      <th width="20%">時間</th>
      <td width="80%">{{ $music -> time }}</td>
    </tr>
    <tr>
      <th width="20%">最高得点</th>
      <td width="80%">{{ $music -> high_score }}</td>
    </tr>
    <tr>
      <th width="20%">平均得点</th>
      <td width="80%">{{ $music -> average_score }}</td>
    </tr>
    <tr>
      <th width="20%">キー</th>
      <td width="80%">{{ $music -> key }}</td>
    </tr>
    <tr>
      <th width="20%">備考</th>
      <td width="80%">{{ $music -> music_remark }}</td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/music/{{$music->id}}/edit">編集</a>
  <a class="btn btn-danger" href="/music/{{$music->id}}/logicDelete">削除</a>
@endsection
