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
      // 例えば、カレンダーの日付を取って、モーダル内の日付の要素に埋め込めば
      // モーダル表示時に対象の日付を表示できる
      var targetDate = info.dateStr;
      $('#addRequestShiftModal .targetDate').text(targetDate);

      // APIに渡すデータとして保持するようにformの要素にもセットしておく
      $('#addRequestShiftModal .modal-body[name="target_date"]').val(targetDate);

      // 非表示のモーダルはshowクラスを追加すると表示できるので
      // ↑で値のセットも終わったので、モーダルを表示させる
      $('#addShiftModal').addClass('show');
    },
  });
calendar.render();