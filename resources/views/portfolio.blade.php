<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>MION KAKERU ポートフォリオ</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>

<body>
  <div class="wrapper">

    <!-- header -->
    <header class="header ">
      <div class="container">
        <h1 class="header-logo">
          <a href="#">MINO KAKERU</a>
        </h1>
        <nav class="gnav">
          <ul class="gnav-list">
            <li class="gnav-item"><a href="#works">WORKS</a></li>
            <li class="gnav-item"><a href="#skill">SKILL</a></li>
            <li class="gnav-item"><a href="#about">ABOUT</a></li>
            <li class="gnav-item"><a href="#contact">CONTACT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- /header -->

    <main class="content">

      <!-- mv -->
      <div class="mv">
        <div class="mv-container">
          <img src="{{ asset('img/main.jpg') }}" alt="">
        </div>
      </div>
      <!-- /mv -->

      <!-- works -->
      <section class="works section" id="works">
        <div class="container">
          <h2 class="title">WORKS</h2>

          <div class="works-list">
            <a class="works-item" href="https://laravel-posting-app-test-4db069dc8225.herokuapp.com/">
              <div class="works-img"><img src="{{ asset('img/post-app.png') }}" alt="投稿アプリ" /></div>
              <p class="works-name">投稿アプリ</p>
              <p class="works-info">HTML/CSS(Bootstrap)/Laravel/MySQL</p>
              <p class="works-detail">投稿の作成・閲覧・編集・削除の機能を持つ投稿アプリです。Laravelを用いてCRUD機能を作成しました。</p>
            </a>
            <a class="works-item" href="https://laravel-todo-app-test-499aa08176d2.herokuapp.com/">
              <div class="works-img"><img src="{{ asset('img/todo-app.png') }}" alt="TODOアプリ" /></div>
              <p class="works-name">TODOアプリ</p>
              <p class="works-info">HTML/CSS(Bootstrap)/JavaScript/Laravel/MySQL</p>
              <p class="works-detail">目標やタグも設定できるTODOアプリを作成しました。それぞれのCRUD機能以外に、ログイン機能や一対多の関係などを理解してテーブルの紐付けも行いました。
                <br>メールアドレス：xiangsanye44@gmail.com
                <br>パスワード：password
                <br>で既存のユーザーにログインできます。
              </p>
            </a>
            <a class="works-item" href="https://laravel-samuraimart-test-ee8302d82cfb.herokuapp.com/">
              <div class="works-img"><img src="{{ asset('img/samuraimart-picture.png') }}" alt="ECサイト" /></div>
              <p class="works-name">ECサイト</p>
              <p class="works-info">HTML/CSS(Bootstrap)/Laravel/MySQL</p>
              <p class="works-detail">Laravelを用いてECサイトを作成しました。ログイン機能・お気に入り機能・商品の並び替え(ソート)機能・カート機能など、様々なライブラリを利用して作成しました。
                <br>メールアドレス：xiangsanye44@gmail.com
                <br>パスワード：password
                <br>で既存のユーザーにログインできます。
              </p>
            </a>
            
          </div>

          <div class="worksmain-list ">
            <a class="worksmain-item" href="https://shift-management-app-2574d9cd9caa.herokuapp.com/">
              <div class="worksmain-img">
                <img src="{{ asset('img/shift-management-app-example.png') }}" alt="exmaple" /></div>
              <p class="worksmain-name">シフト管理アプリ</p>
              <p class="worksmain-info">HTML/CSS(Bootstrap)/JavaScript/jQuery/PHP/MySQL</p>
              <p class="worksmain-detail">
                オリジナルアプリとして開発したシフト管理アプリです。<br>
                「シフト希望の登録・閲覧」、「確定したシフトの登録、閲覧」、「スタッフの追加、削除」、「お問い合わせフォーム」などの機能を持っています。<br>
                FullCalendarライブラリを使用してカレンダーを表示し、日付をクリックするとその日のシフトの閲覧や登録ができる<br>わかりやすい作りになるように工夫しました。<br>
                 画像をクリックするとアプリのページに行くことができます。
                 <br>
                 ●テストユーザー<br>
                 メールアドレス：test@example.com 
                 パスワード：password 
                 サンプルデータ：2023-11-1にあります。
              </p>
            </a>
            
          </div>
        </div>
      </section>
      <!-- /works -->

      <!-- skill -->
      <section class="skill section" id="skill">
        <div class="container">
          <h2 class="title">SKILL</h2>
          <div class="skill-list">
            <div class="skill-item">
              <p class="skill-img"><img src="{{  asset('img/html.png')  }}" alt="html"></p>
              <div class="skill-body">
                <h3 class="skill-name">HTML/CSS</h3>
                <p class="skill-text">
                  代表的なタグやプロパティを使用し静的なWebサイトを製作できます(レスポンシブデザインも対応)。</p>
              </div>
            </div>
            
            <div class="skill-item">
              <p class="skill-img"><img src="{{  asset('img/javascript.png')  }}" alt="javascript"></p>
              <div class="skill-body">
                <h3 class="skill-name">JavaScript</h3>
                <p class="skill-text">
                  非同期処理やDOM操作、イベント処理など使用し動的な機能を製作できます。</p>
              </div>
            </div>
            
            <div class="skill-item">
              <p class="skill-img"><img src="{{  asset('img/jquery.png')  }}" alt="jquery"></p>
              <div class="skill-body">
                <h3 class="skill-name">jQuery</h3>
                <p class="skill-text">
                  Webサイトにフェードイン・フェードアウトなどリッチな動きをつけることが可能です。</p>
              </div>
            </div>

            <div class="skill-item">
              <p class="skill-img"><img src="{{  asset('img/PHP-logo.svg.png')  }}" alt="php"></p>
              <div class="skill-body">
                <h3 class="skill-name">PHP</h3>
                <p class="skill-text">
                  フレームワークであるLaravelを使用し、オリジナルアプリであるシフト管理アプリなどを作成しました。</p>
              </div>
            </div>
           
          </div>
        </div>
      </section>
      <!-- /skill -->

      <!-- about -->
      <section class="about section" id="about">
        <div class="container">
          <h2 class="title">ABOUT</h2>
          <div class="profile">
            <p class="profile-img">
              <img src="{{ asset('img/portfolio-main-s.jpg') }}" alt="about">
            </p>
            <div class="profile-body">
              <p>
                三野翔
              </p>
              <p>
                兵庫県西宮市在住です。2016年に九州大学工学部機械航空工学科に入学しましたが、自分が学びたかった航空の分野に進むことができず2020年から休学をしておりました。
                休学期間中に自分がやりたい仕事について考え、大学で受けたプログラミングの授業を思い出し、エンジニアとしての道を目指すことを決心しました。
                プログラミングスクールでの学習を経て、現在は就職活動をしております。
              </p>
              
            </div>
          </div>
        </div>
      </section>
      <!-- /about -->

      <!-- contact -->
      <section class="contact section" id="contact">
        <div class="container">
          <h2 class="title">CONTACT</h2>
          <p class="lead">
            お問い合わせは、<br class="sp-only">メールにてお願いいたします。
          </p>
          <div class="contact-list">
            <p>xiangsanye44@gmail.com</p>
          </div>
        </div>
      </section>
      <!-- /contact -->
      <div class="page-top" id="js-page-top">
        <span class="material-icons-outlined">expand_less</span>
      </div>
    </main>

    <!-- footer -->
    <footer class="footer">
      <div class="copyright">&copy;MINO KAKERU</div>
    </footer>
    <!-- /footer -->

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type='text/javascript' src="js/script.js"></script>
</body>
</html>