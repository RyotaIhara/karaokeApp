{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', '場面追加')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>追加画面</h1>
  <div class="toIndexPage">
    <a class="btn btn-success" href="/scene">場面一覧へ</a>
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

  <form action="{{ route("scene.store") }}" method="post">
    @csrf
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">場面: </label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="Password" class="col-sm-2 col-form-label">備考: </label>
      <div class="col-sm-10">
        <textarea name="remark" class="form-control" rows="5"></textarea> 
      </div>
    </div>
    <button type="submit" class="btn btn-primary">送信</button>
  </form>
@endsection
