import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";




// スタッフ画面 確定シフトページ

var calendarForStaffConfirm = document.getElementById("calendar-for-staff-confirm");
console.log(calendarForStaffConfirm)

let calendarFSC = new Calendar(calendarForStaffConfirm, {
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
      $('#showConfirmShiftModal .targetDate').text(targetDate);


      // urlからstore_idを取得
      let requestUrl = new URL(window.location.href)
      
      // var storeId = requestUrl.href.replace("http://localhost/shift-management-app/public/confirm_shift/", "")

      console.log(storeId)

      var postData = {date: targetDate, storeId: storeId}

      console.log(postData)
      
      $.get(Laravel.confirm_shift_get_url, postData)
      .done(function(data){

        console.log(data);
        let staffShifts = document.getElementById('confirm-staff-shifts')  
        
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
          $('#showConfirmShiftModal').show();
        }
      })
      .fail(function() {
        console.log("データ取得失敗");
      });
      
      
      
      
    },
  });
calendarFSC.render();