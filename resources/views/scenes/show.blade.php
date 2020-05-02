{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '場面詳細')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toIndexPage">
    <a class="btn btn-success" href="/scene">場面一覧へ</a>
  </div>
  <table class="table table-bordered">
    <tr>
      <th width="20%">場面</th>
      <td width="80%">{{ $scene -> scene_name }}</td>
    </tr>
    <tr>
      <th width="20%" height="150">備考</th>
      <td width="80%" height="150">{{ $scene -> scene_remark }}</td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/scene/{{$scene->id}}/edit">編集</a>
  <a class="btn btn-danger" href="/scene/{{$scene->id}}/logicDelete">削除</a>
@endsection
