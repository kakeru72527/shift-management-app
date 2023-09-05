import './bootstrap';
import './calendar';


// addRequestShiftModal

// modalを閉じる
$('.addRequestShiftModalClose').click(function() {
  $('#addRequestShiftModal').hide();
})

// modalからapiを使ってPOST
$('#addRequestShiftResister').click(function(){

  // データの送り先。api.phpに登録したURLを指定
  var url = "http://localhost/api/request_shifts/create";

  // 送りつけるデータの文字列を生成する
  // var data = 'user_id='.userId.'&date='.date.'&work_start='.work_start.'&work_end='.work_start;

  // 送るデータをモーダルの入力欄から取得する
  // serializeを使うことでformのinputの入力値からpost用のデータが生成される
  // user_id=xxxx&date=2023/08/01&work_start=.... のように
  var postData = $("#addRequestShiftModal form").serialize();

  $.post( url, postData )
  .done(function() {
    alert('正常に登録できました')
  })
  .fail(function() {
    alert('登録に失敗しました')
  });
})






