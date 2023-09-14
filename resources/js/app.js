import './bootstrap';
// import './calendarForStaffRequest';


// addRequestShiftModal

// modalを閉じる
$('.addRequestShiftModalClose').click(function() {
  let staffShifts = document.getElementById('request-staff-shifts');
  staffShifts.textContent = "";
  $('#addRequestShiftModal').hide();
})

$('.showConfirmShiftModalClose').click(function() {
  let staffShifts = document.getElementById('confirm-staff-shifts');
  staffShifts.textContent = "";
  $('#showConfirmShiftModal').hide();
})



// modalからapiを使ってPOST
$('#addRequestShiftResister').click(function(){

  // データの送り先。api.phpに登録したURLを指定
  // var url = '{{ route(api.create_request_shift) }}';

  // 送りつけるデータの文字列を生成する
  // var data = 'user_id='.userId.'&date='.date.'&work_start='.work_start.'&work_end='.work_start;

  // 送るデータをモーダルの入力欄から取得する
  // serializeを使うことでformのinputの入力値からpost用のデータが生成される
  // user_id=xxxx&date=2023/08/01&work_start=.... のように
  var postData = $("#addRequestShiftModal form").serialize();
  console.log(postData);
  $.post( Laravel.request_shift_post_url, postData )
  .done(function() {
    alert('正常に登録できました')
  })
  .fail(function() {
    alert('登録に失敗しました')
  });

  
})






