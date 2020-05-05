<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">確認</h5>
          <h6>{{$music->id}}</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          削除しますか？
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
          <a class="btn btn-success" href="/music/{{$music->id}}/logicDelete" name="deletebtn">はい</a>
      </div>
  </div>
</div>
