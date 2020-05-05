{{-- layoutsフォルダのapplication.blade.phpを継承 --}}
@extends('layouts.application')

{{-- @yield('title')にテンプレートごとにtitleを入力 --}}
@section('title', 'ユーザ一覧')

{{-- @yield('content')に以下の内容を表示 --}}
@section('content')
  <div class="toCreatePage">
    <a class="btn btn-success" href="/user/create">新規作成</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ユーザー名</th>
        <th>フルネーム</th>
        <th>メールアドレス</th>
        <th>権限</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
          <tr>
            <td>{{ $user -> user_name }}</td>
            <td>{{ $user -> user_full_name }}</td>
            <td>{{ $user -> email }}</td>
            <td>
              @if ($user -> admin == 1)
                <?php echo "権限あり"; ?>
              @else
                <?php echo "権限なし"; ?>
              @endif
            </td>
            <td>
              <a class="btn btn-primary" href="/user/{{$user->id}}">詳細</a>
              <button type="button" class="delete-confirm btn btn-danger" value="A003" data-toggle="modal" data-target="#confirm-delete">削除</button>

            </td>
          </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    @include('sub.delete')
  </div>

  <script>
    $('.delete-confirm').click(function(){
        $('#deletebtn').val( $(this).val() );
    });
  </script>

@endsection
