<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">検索用フォーム</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="/music/search" method="post">
      <div class="modal-body">
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
              <option value="" selected></option>
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
              <option value="" selected></option>
              @foreach($scenes as $scene)
                <option value="{{ $scene -> id }}">{{ $scene -> scene_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">時間: </label>
          <div class="form-group col-sm-3">
            <input type="time" step="1" class="form-control" name="time_from">
          </div>
          <label>〜</label>
          <div class="form-group col-sm-3">
            <input type="time" step="1" class="form-control" name="time_to">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">最高得点: </label>
          <div class="form-group col-sm-3">
            <input type="number" class="form-control" name="high_score_from">
          </div>
          <label>〜</label>
          <div class="form-group col-sm-3">
            <input type="number" class="form-control" name="high_score_to">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">平均得点: </label>
          <div class="form-group col-sm-3">
            <input type="number" class="form-control" name="average_score_from">
          </div>
          <label>〜</label>
          <div class="form-group col-sm-3">
            <input type="number" class="form-control" name="average_score_to">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">備考: </label>
          <div class="col-sm-10">
            <input type="text" name="music_remark" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">お気に入り: </label>
          <div class="col-sm-10">
            <input type="checkbox" name="favorite_flg" value="1">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">検索</button>
      </div>
    </form>
  </div>
</div>
