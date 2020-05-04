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
  <form action="{{ route("music.update", $music->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">曲名: </label>
      <div class="col-sm-10">
        <input type="text" name="music_title" class="form-control" value="{{$music->music_title}}">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">アーティスト: </label>
      <div class="col-sm-10">
        <input type="text" name="artist" class="form-control" value="{{$music->artist}}">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ジャンル: </label>
      <div class="col-sm-10">
        <select name="category_id" class="form-control">
          @foreach($categories as $category)
            <option value="{{ $category -> id }}" {{ $music->category_id === $category->id? 'selected="selected"' : '' }}>{{ $category -> category_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">場面: </label>
      <div class="col-sm-10">
        <select name="scene_id" class="form-control">
          @foreach($scenes as $scene)
            <option value="{{ $scene -> id }}" {{ $music->scene_id === $scene->id? 'selected="selected"' : '' }}>{{ $scene -> scene_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">時間: </label>
      <div class="col-sm-10">
        <input type="time" step="1" name="time" class="form-control" value="{{$music->time}} ">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">最高得点: </label>
      <div class="col-sm-10">
        <input type="text" name="high_score" class="form-control" value="{{$music->high_score}}">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">平均得点: </label>
      <div class="col-sm-10">
        <input type="text" name="average_score" class="form-control" value="{{$music->average_score}}">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">キー: </label>
      <div class="col-sm-10">
        <input type="text" name="key" class="form-control" value="{{$music->key}}">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">備考: </label>
      <div class="col-sm-10">
        <input type="text" name="music_remark" class="form-control" value="{{$music->music_remark}}">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">送信</button>
  </form>
@endsection
