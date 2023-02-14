<?php
include "inc/session.php";
if(!$s_idx){
    echo
    "<script type=\"text/javascript\">
    location.href = \"login.php?url=mypage.php\";
    </script>";
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/mypage.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/mypage.js"></script>
</head>
<body>
    <header>
    <div class="prev" onclick="history.back()"><</div>
        <div class="page_title">마이페이지</div>
    </header>
    <main>
        <section class="menu">
            <div class="profile">김유저 님</div>
            <ul>
                <li><a href=""><span class="text">내정보</span><span class="arrow">></span></a></li>
                <li><a href=""><span class="text">내 리뷰</span><span class="arrow">></span></a></li>
                <li><a href=""><span class="text">공지사항</span><span class="arrow">></span></a></li>
                <li><a href="logout.php"><span class="text">로그아웃</span><span class="arrow">></span></a></li>

            </ul>
        </section>
    </main>
    <?php include "inc/bnb.html" ?>
</body>
</html>