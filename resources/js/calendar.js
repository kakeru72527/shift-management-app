import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
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
      $('#addRequestShiftModal .targetDate').text(targetDate);

      // APIに渡すデータとして保持するようにformの要素にもセットしておく
      $('#addRequestShiftModal .modal-body input[name="date"]').val(targetDate);

      // urlからstore_idを取得
      let requestUrl = new URL(window.location.href)
      
      var storeId = requestUrl.href.replace("http://localhost/shift-management-app/public/confirm_shift/", "")

      console.log(storeId)

      var postData = {date: targetDate, storeId: storeId}

      console.log(postData)
      
      $.get(Laravel.request_shift_get_url, postData)
      .done(function(){
        // モーダルを表示させる
        request_shifts.forEach(function(elem) {
          var staff = $('<div>');

          var text = '名前:' + elem.user_id + '' + elem.start_time +  '～' + elem.end_time;
          staff.text(text);
          
          $('.staff-shifts').append(staff);
        })
      $('#addRequestShiftModal').show();
      })
      .fail(function() {
        console.log("データ取得失敗");
      });
      
      
      
      
    },
  });
calendar.render();