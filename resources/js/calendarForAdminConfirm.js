import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid'

// スタッフ画面 確定シフトページ

var calendarForAdminShowConfirm = document.getElementById("calendar-for-admin-show-confirm");

const calendar = new Calendar(calendarForAdminShowConfirm, {
  plugins: [timeGridPlugin],
  initialView: 'timeGridWeek',
  headerToolbar: {
    left: 'prev,next',
    center: 'title',
    right: 'timeGridWeek,timeGridDay' // user can switch between the two
  },

  locale: "ja"
})

calendar.render();