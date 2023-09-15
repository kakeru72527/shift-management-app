<div class="modal" id="addConfirmShiftModal" tabindex="-1" aria-labelledby="addConfirmShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="">
        <div class="modal-header">
          <h5 class="modal-title targetDate" id="addConfirmShiftModalLabel"></h5>
          <button type="button" class="btn-close addConfirmShiftModalClose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>シフト希望状況</p>
          <div id="request-shifts-for-admin"></div>
          <br>
          <p>シフト確定状況</p>
          <div id="confirm-shifts-for-admin"></div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary addConfirmShiftModalClose" data-bs-dismiss="modal">閉じる</button>
          <button type="button" class="btn btn-primary" id="addConfirmShiftResister">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
