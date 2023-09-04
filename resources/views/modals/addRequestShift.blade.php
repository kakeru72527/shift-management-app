<div class="modal" id="addRequestShift" tabindex="-1" aria-labelledby="addRequestShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="">
        <div class="modal-header">
          <h5 class="modal-title targetDate" id="addRequestShiftModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id"  value="{{ $user->id }}">
          <input type="hidden" name="store_id" value="{{ $store->id }}">
          <input type="hidden" name="target_date">
          <label for="start_time">始業時刻</label><input type="time" name="work_start" id="start_time">
          <label for="end_time">終業時刻</label><input type="time" name="work_end" id="end_time">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>