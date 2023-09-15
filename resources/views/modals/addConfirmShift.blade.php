<div class="modal" id="addConfirmShiftModal" tabindex="-1" aria-labelledby="addConfirmShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="">
        <div class="modal-header">
          <h5 class="modal-title targetDate" id="addConfirmShiftModalLabel"></h5>
          <button type="button" class="btn-close addConfirmShiftModalClose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>・シフト希望状況</p>
          <div id="request-shifts-for-admin"></div>
          <br>
          <p>・シフト確定状況</p>
          <div id="confirm-shifts-for-admin"></div>
          <br>
          <p>・シフト登録</p>
            <select name="staff_id"  class="form-select" id="staff">
              <option selected>スタッフを選択</option>
              @foreach($staffs as $staff)
              <option value="{{ $staff->id }}">{{ $staff->user->name }}</option>
              @endforeach
            </select>
          <input type="hidden" name="store_id" value="{{ $store->id }}">
          <input type="hidden" name="date">
          <br>
          <div class="d-flex mt-1">
            <label for="start_time" class="mt-1">始業時刻</label><input type="time" name="start_time" id="start_time" class="form-control mx-2" style="width: 100px">
            <label for="end_time" class="mt-1">終業時刻</label><input type="time" name="end_time" id="end_time" class="form-control mx-2" style="width: 100px">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary addConfirmShiftModalClose" data-bs-dismiss="modal">閉じる</button>
          <button type="button" class="btn btn-primary" id="addConfirmShiftResister">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
