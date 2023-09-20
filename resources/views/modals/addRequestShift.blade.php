<div class="modal" id="addRequestShiftModal" tabindex="-1" aria-labelledby="addRequestShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title targetDate" id="addRequestShiftModalLabel"></h5>
          <button type="button" class="btn-close addRequestShiftModalClose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>現在のシフト希望状況</p>
          <div id="request-staff-shifts"></div>
          <input type="hidden" name="staff_id"  value="{{ $staff->id }}">
          <input type="hidden" name="store_id" value="{{ $store->id }}">
          <input type="hidden" name="date">
          <div class="d-flex">
            <label for="start_time" class="mt-1">始業時刻</label><input type="time" name="start_time" id="start_time" class="form-control mx-2" style="width: 100px">
            <label for="end_time" class="mt-1">終業時刻</label><input type="time" name="end_time" id="end_time" class="form-control mx-2" style="width: 100px">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary addRequestShiftModalClose" data-bs-dismiss="modal">閉じる</button>
          <button type="button" class="btn btn-primary" id="addRequestShiftResister">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
