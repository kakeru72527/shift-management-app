
import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";




// スタッフ画面 確定シフトページ

var calendarForAdminAddConfirm = document.getElementById("calendar-for-admin-add-confirm");
console.log(calendarForAdminAddConfirm)

let calendar = new Calendar(calendarForAdminAddConfirm, {
    plugins: [interactionPlugin, dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },

    locale: "ja",

    // 日付をクリック、または範囲を選択したイベント
    
    dateClick: function(info) {
      
      // モーダル表示時に対象の日付を表示できる
      var targetDate = info.dateStr;
      $('#addConfirmShiftModal .targetDate').text(targetDate);

      // APIに渡すデータとして保持するようにformの要素にもセットしておく
      $('#addConfirmShiftModal .modal-body input[name="date"]').val(targetDate);

      // 当日シフト確認のリンク生成

      let link = location.href + "/" +targetDate;

      console.log(link)

      let linkButton = document.getElementById('link-button')

      linkButton.setAttribute('href', link)


      // urlからstore_idを取得
      let requestUrl = new URL(window.location.href)
      
      

      console.log(storeId)

      var postData = {date: targetDate, storeId: storeId}

      console.log(postData)
      
      $.get(Laravel.request_shift_get_url, postData)
      .done(function(data){

        console.log(data);
        let staffShifts = document.getElementById('request-shifts-for-admin')
        // モーダルを表示させる
        data.forEach(function(elem) {
          console.log(elem.name)
          var staff = document.createElement("div");

          var text = '名前 : ' + elem.name + ' 時間 : ' + elem.start_time +  '～' + elem.end_time;
          // staff.textContent = text
          // console.log(staff)
          
          staffShifts.append(text, staff);
        })
        
      // $('#addConfirmShiftModal').show();
      })
      .fail(function() {
        console.log("データ取得失敗");
      });

      $.get(Laravel.confirm_shift_get_url, postData)
      .done(function(data){

        console.log(data);
        let staffShifts = document.getElementById('confirm-shifts-for-admin')
        // モーダルを表示させる
        data.forEach(function(elem) {
          console.log(elem.name)
          var staff = document.createElement("div");

          var text = '名前 : ' + elem.name + ' 時間 : ' + elem.start_time +  '～' + elem.end_time;
          // staff.textContent = text
          // console.log(staff)
          
          staffShifts.append(text, staff);
        })
      $('#addConfirmShiftModal').show();
      })
      .fail(function() {
        console.log("データ取得失敗");
      });
      
      
      
      
    },
  });
calendar.render();