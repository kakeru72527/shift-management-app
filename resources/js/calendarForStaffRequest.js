import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

// スタッフ画面 シフト希望ページ

var calendarForStaffRequest = document.getElementById("calendar-for-staff-request");

let calendarFSR = new Calendar(calendarForStaffRequest, {
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
      if($('#addRequestShiftModal').css("display") == "none"){

      // 二重クリック防止

      // $('.fc-daygrid-day-number').hide();
      // $('.loading').show();

      // setTimeout(function(){
      //   $('.fc-daygrid-day-number').show();
      //   $('.loading').hide();
      // }, 1000);
      
      let fcDaygridDayNumber = document.getElementsByClassName('fc-daygrid-day-number')
      
      Array.prototype.forEach.call(fcDaygridDayNumber, function (element) {
        element.classList.add("disabled");
    });

      
      // モーダル表示時に対象の日付を表示できる
      var targetDate = info.dateStr;
      $('#addRequestShiftModal .targetDate').text(targetDate);

      // APIに渡すデータとして保持するようにformの要素にもセットしておく
      $('#addRequestShiftModal .modal-body input[name="date"]').val(targetDate);

      // urlからstore_idを取得
      let requestUrl = new URL(window.location.href)
      
      // var storeId = requestUrl.href.replace("http://localhost/shift-management-app/public/request_shift/", "")

      console.log(storeId)

      var postData = {date: targetDate, storeId: storeId}

      console.log(postData)
      
      $.get(Laravel.request_shift_get_url, postData)
      .done(function(data){

        console.log(data);
        let staffShifts = document.getElementById('request-staff-shifts')

        if(staffShifts.textContent.indexOf('名前') == -1){
        // モーダルを表示させる
        data.forEach(function(elem) {
          console.log(elem.name)
          var staff = document.createElement("div");

          var text = '名前 : ' + elem.name + ' 時間 : ' + elem.start_time +  '～' + elem.end_time;
          // staff.textContent = text
          // console.log(staff)
          
          staffShifts.append(text, staff);
        })
      $('#addRequestShiftModal').show();
        }
      })
      .fail(function() {
        console.log("データ取得失敗");
      });

      
      
      
    }},
  });
calendarFSR.render();


