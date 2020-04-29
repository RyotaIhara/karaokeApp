{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ追加')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <h1>追加画面</h1>
  <div class="toIndexPage">
    <a class="btn btn-success" href="/user">ユーザ一覧へ</a>
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
  <form action="{{ route("user.store") }}" method="post">
    @csrf
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">ユーザー名: </label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="Password" class="col-sm-2 col-form-label">フルネーム: </label>
      <div class="col-sm-10">
        <input type="text" name="full_name" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="Password" class="col-sm-2 col-form-label">メールアドレス: </label>
      <div class="col-sm-10">
        <input type="text" name="email" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="Password" class="col-sm-2 col-form-label">パスワード: </label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="Password" class="col-sm-2 col-form-label">パスワード（確認）: </label>
      <div class="col-sm-10">
        <input type="password" name="password_confirmation" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="Password" class="col-sm-2 col-form-label">権限: </label>
      <div class="col-sm-10">
        <input type="radio" name="admin" value="1" class="form-control">権限あり
          <input type="radio" name="admin" value="0" checked="checked" class="form-control">権限なし
      </div>
    </div>
    <button type="submit" class="btn btn-primary">送信</button>
  </form>
@endsection
