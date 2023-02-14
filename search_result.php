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
    <link rel="stylesheet" type="text/css" href="css/search_result.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/search_result.js"></script>
    <script>
        <?php
        $word = $_GET["word"];
       echo "var word = '$word';";
        ?>
        $(document).ready(function(){
            getContents(word);
      
        });
    </script>
</head>
<body>
    <header>
        <div class="page_title_wrap">
            <section class="page_title">
            <div class="prev" onclick="history.back()"><</div>
                <div class="search">
                    <input type="text"  onkeyup="if(window.event.keyCode==13){search(this)}">
                    <div class="search_icon">검색</div>
                </div>
                <!--
                <a class="favorites" href="favorites.php">즐겨찾기</a>
-->
            </section>
        </div>
    </header>
    <main>
        <section class="novels">
            <ul>
            
            </ul>
        </section>
    
    </main>
    <?php include "inc/bnb.html" ?>
    
</body>
</html>