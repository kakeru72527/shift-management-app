import{C as d,i as s,a as c}from"./index-b0680438.js";var r=document.getElementById("calendar-for-staff-confirm");console.log(r);let m=new d(r,{plugins:[s,c],initialView:"dayGridMonth",headerToolbar:{left:"prev,next today",center:"title",right:""},locale:"ja",dateClick:function(i){var e=i.dateStr;$("#showConfirmShiftModal .targetDate").text(e),new URL(window.location.href),console.log(storeId);var o={date:e,storeId};console.log(o),$.get(Laravel.confirm_shift_get_url,o).done(function(n){console.log(n);let a=document.getElementById("confirm-staff-shifts");a.textContent.indexOf("名前")==-1&&(n.forEach(function(t){console.log(t.name);var f=document.createElement("div"),l="名前 : "+t.name+" 時間 : "+t.start_time+"～"+t.end_time;a.append(l,f)}),$("#showConfirmShiftModal").show())}).fail(function(){console.log("データ取得失敗")})}});m.render();