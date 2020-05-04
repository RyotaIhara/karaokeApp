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
      <td width="80%">{{ $category -> category_name }}</td>
    </tr>
    <tr>
      <th width="20%" height="150">備考</th>
      <td width="80%" height="150">{{ $category -> category_remark }}</td>
    </tr>
  </table>
  <a class="btn btn-primary" href="/category/{{$category->id}}/edit">編集</a>
  <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>

  <!-- Modal -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                <a class="btn btn-success" href="/category/{{$category->id}}/logicDelete" name="deletebtn">はい</a>
            </div>
        </div>
    </div>
  </div>

  <script>
    $('.delete-confirm').click(function(){
        $('#deletebtn').val( $(this).val() );
    });
  </script>

@endsection
