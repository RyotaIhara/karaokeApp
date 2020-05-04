{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '曲一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/scene/create">曲新規作成</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>曲名</th>
        <th>アーティスト</th>
        <th>ジャンル</th>
        <th>場面</th>
        <th>時間</th>
        <th>最高得点</th>
        <th>平均得点</th>
        <th>キー</th>
        <!--<th>お気に入り</th>-->
        <th>備考</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($musics as $music)
        <tr>
          <td>{{ $music -> music_title }}</td>
          <td>{{ $music -> artist }}</td>
          <td>{{ $music -> category -> category_name }}</td>
          <td>{{ $music -> scene -> scene_name }}</td>
          <td>{{ $music -> time }}</td>
          <td>{{ $music -> high_score }}</td>
          <td>{{ $music -> average_score }}</td>
          <td>{{ $music -> key }}</td>
          <!--<td>お気に入り</td>-->
          <td>{{ $music -> music_remark }}</td>
          <td>
            <a class="btn btn-primary" href="/music/{{$music->id}}">詳細</a>
            <a class="btn btn btn-danger" href="/music/{{$music->id}}/logicDelete">削除</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection
