<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#ffffff">

  <!-- 뷰포트, 파비콘 설정-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
   
    <title>소설모아</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
    <header>
        <div class="page_title_wrap">
            <section class="page_title">
                <div class="logo"><a href="">소설모아</a></div>
                <div class="search">
                    <input type="text">
                    <div class="search_icon">검색</div>
                </div>
                <a class="favorites" href="favorites.php">즐겨찾기</a>
            </section>
        </div>
        <div class="category_wrap">
            <section class="category">
                <ul>
                    <li><a href="genre.php?genre=fantasy">판타지</a></li>
                    <li><a href="genre.php?genre=modern">현판</a></li>
                    <li><a href="genre.php?genre=oriental">무협</a></li>
                    <li><a href="genre.php?genre=romancefantasy">로판</a></li>
                    <li><a href="genre.php?genre=romance">로맨스</a></li>
                </ul>
            </section>
        </div>
        <div class="menu_wrap">
            <section class="menu">
                <ul>
                    <li><a href="genre.php?genre=fantasy">장르별</a></li>
                    <li><a href="search_keyword.php">키워드별</a></li>
                    <li><a href="new.php">신규</a></li>
                    <li><a href="popular.php">인기</a></li>
                </ul>
            </section>
        </div>
    </header>
    <main>
        <section class="recommend">
            <ul>

            </ul>
        </section>
    
    </main>
    <?php include "inc/bnb.html" ?>
    <!-- 서비스 워커 등록 -->
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker
        .register('./service_worker.js')
        .then(function () {
          console.log('서비스 워커가 등록됨!');
        })
    }
  </script>
</body>
</html>