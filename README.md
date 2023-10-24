## シフト管理アプリ

<img width="1128" alt="shift-management-app-example" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/d7cb498e-6d46-4346-bd92-8e4c6054c993">

## 概要

こちらはアプリ1つで複数店舗のシフト管理が可能となるアプリです。店舗のオーナーや店長はシフト作成・管理がしやすくなり、アルバイトやスタッフは出勤希望日の申請やシフト閲覧がしやすくなり、店舗の運営負担を軽減することができるようになります。

## 作成した経緯

大学時代にアルバイトで働いていた焼き鳥屋では、シフト申請する際は店舗に置いてある出勤希望シートへ記入する形式でした。この場合、シフトが入っていない休みの日にわざわざ店舗まで行かないといけないこともあり、もっと簡単に申請できないかと思っていたことがきっかけでした。そこで、プログラミングを活かして自身でシフト管理アプリが開発できないかと考え、今回制作に至りました。

## URL

https://shift-management-app-2574d9cd9caa.herokuapp.com/
<br>

●テストユーザー
<br>
メールアドレス： test@example.com
<br>
パスワード： password
## 機能一覧

| トップ画面 |　ログイン画面 |
| ---- | ---- |
| <img width="1128" alt="shift-top" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/7585d569-21f6-4b83-8f26-bf6550cb2ab3">　|　<img width="1128" alt="shift-login" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/411566e7-da94-4c21-a316-8853ee65a12c"> |
| ログインしていない状態でのトップページです。 | メールアドレスとパスワードによるログイン機能を実装しました。 | 

| 新規登録画面 |　ホーム画面 |
| ---- | ---- |
| <img width="1128" alt="shift-resister" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/da212455-373e-47fa-9b40-5bcb877d9989"> | <img width="1128" alt="shift-home" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/0d1747f7-ed44-4fd6-b5ac-7fc6108f4ba5"> |
| 名前・メールアドレス・パスワードを入力するとユーザー登録ができます。 | ログインした状態でのホーム画面です。ユーザーがスタッフや管理者として登録されている店舗が表示されます。 | 

| 確定シフト閲覧(スタッフ側)画面 |　希望シフト作成(スタッフ側)画面 |
| ---- | ---- |
| <img width="1128" alt="shift-confirm-for-staff" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/98a0fe3f-4daa-4dce-9d3b-cc91cc7328de"> | <img width="1128" alt="shift-request-for-staff" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/4524d9b5-c212-4e39-975d-a5bc21126985"> |
| スタッフ側が確定シフトを閲覧できるページです。カレンダの日付をクリックするとモーダルが表示されます。 | スタッフ側が希望シフトを作成できるページです。カレンダの日付をクリックするとモーダルが表示され、ほかのスタッフの希望シフトの状況を見ながら作成できます。 | 

| 確定シフト作成(管理者側)画面 |　一日単位でのシフト確認(管理者側)画面 |
| ---- | ---- |
| <img width="1128" alt="shift-for-admin-calendar" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/ef31ffb5-4616-4f11-bbf1-87d77e5d0de5"> | <img width="1128" alt="shift-for-admin-day-calendar" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/0d1cee4a-57bf-4d74-8caf-24fe19dccc9a"> |
| 管理者側が確定したシフトを作成できるページです。カレンダの日付をクリックするとモーダルが表示され、スタッフの希望・確定シフトの状況を見ながら作成できます。| 管理者側が指定した日付のシフトを確認できるページです。ガントチャートを用いて視覚的にシフト状況を分かりやすく確認できます。 | 

| スタッフ編集(管理者)画面 |　スタッフ追加(管理者)画面 |
| ---- | ---- |
| <img width="1128" alt="shift-edit-staff" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/e44903bc-2977-4c8d-aae3-b14c51a8c39d"> | <img width="1128" alt="shift-add-staff" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/d0f49632-b587-489f-bac7-4aa9dab98142"> |
| 管理者側のスタッフ管理用のページです。退職したスタッフが店舗のページに入れないようにスタッフを削除できます。 | 管理者側のスタッフ追加ページです。メールアドレスと役職(アルバイト・正社員)を選択すると追加できます。 | 

| お問い合わせ画面 |
| ---- |
| <img width="1128" alt="shift-contact" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/a7441734-4094-45c4-983f-8eaf55090637"> |
| 画面右上のメニューからお問い合わせページに行くことができます。お問い合わせの内容はアプリの管理者にメールで連絡がいきます。また、店舗の新規登録の申請もこのページで受け付けています。 | 

## 使用技術

| Category          |                                    |
| ----------------- | --------------------------------------------------   |
| フロントエンド     | HTML,CSS,JavaScript,JQuery                       |
| バックエンド       | PHP,Laravel |
| データベース  | MySQL |
| その他 | Github, FullCalendarライブラリ(カレンダーの表示) |

## ER図
<img width="596" alt="shift-ER" src="https://github.com/kakeru72527/shift-management-app/assets/96040265/502647c8-b430-4373-beea-3ae8577516b4">

## 工夫した点

・視覚的にわかりやすいものを作りたかったのでFullcalendarライブラリ(https://fullcalendar.io/)
を用いてのカレンダーの実装に挑戦しました。一日単位でのシフトを表示する画面ではガントチャートをライブラリを使わずに自作で作ることができた。 <br>
・カレンダーをクリックした際に表示されるモーダルの内容や、モーダルでの入力内容を非同期で通信できるようにAPIを用いての通信に挑戦して作成することができた。




