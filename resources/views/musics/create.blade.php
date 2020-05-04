{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '曲追加')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>曲追加画面</h1>
  <div class="toIndexPage">
    <a class="btn btn-success" href="/music">曲一覧へ</a>
  </div>
  @if (count($errors))
      <div>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif
  <form action="{{ route("music.store") }}" method="post">
    @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">曲名: </label>
      <div class="col-sm-10">
        <input type="text" name="music_title" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">アーティスト: </label>
      <div class="col-sm-10">
        <input type="text" name="artist" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ジャンル: </label>
      <div class="col-sm-10">
        <select name="category_id" class="form-control">
          @foreach($categories as $category)
            <option value="{{ $category -> id }}">{{ $category -> category_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">場面: </label>
      <div class="col-sm-10">
        <select name="scene_id" class="form-control">
          @foreach($scenes as $scene)
            <option value="{{ $scene -> id }}">{{ $scene -> scene_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">時間: </label>
      <div class="col-sm-10">
        <input type="time" step="1" name="time" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">最高得点: </label>
      <div class="col-sm-10">
        <input type="number" name="high_score" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">平均得点: </label>
      <div class="col-sm-10">
        <input type="number" name="average_score" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">キー: </label>
      <div class="col-sm-10">
        <input type="text" name="key" class="form-control" value="0">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">備考: </label>
      <div class="col-sm-10">
        <textarea name="music_remark" class="form-control" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">お気に入り: </label>
      <div class="col-sm-10">
        <input type="checkbox" name="favorite_flg" value="1">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">送信</button>
  </form>
@endsection
