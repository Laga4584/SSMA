<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세 정보</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/detail.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/detail.js"></script>
    <script>
        <?php
        $novel_seq = $_GET["seq"];
        echo "var novel_seq = '$novel_seq';";
        ?>
        $(document).ready(function(){
            getContents(novel_seq);
      
        });
    </script>
</head>
<body>
    <header>
        <div class="prev" onclick="history.back()"><</div>
        <div class="page_title">소설 정보</div>
    </header>
    <main>
        <section class="info">
            <div class="info_area">
                <div class="cover"></div>
                <div class="desc">
                    <span class="genre"><a></a></span><span> > </span><span class="sub_genre"><a></a></span>
                    <p class="title">영혼 없는 불경자의 밤</p>
                    <p class="author"><a>홍정훈</a></p>
                    <p class="publisher"><a>레드독퍼블리싱그룹</a></p>
                    <p class="rating">4.8</p>
                    <p class="state"></p>
                </div>
            </div>
            <div class="button_area">
                <button class="like" onclick="set_favorite()"><div class="icon"></div></button>
                <div class="platforms">
                    <div class="link_page">카카페</div>
                    <div class="link_series">시리즈</div>
                    <div class="link_ridi">리디북스</div>
                </div>
            </div>
        </section>
        <section class="story">
            <h3>작품 소개</h3>
            <p></p>
        </section>
        <section class="keywords">
            <h3>키워드</h3>
            <ul>
                <li><button>현판</button></li>
                <li><button>회귀</button></li>
                <li><button>성장</button></li>
            </ul>
        </section>
        <!--
        <section class="reviews">
            <h3>리뷰</h3>
            <ul>
                <li>
                    <div class="rating">
                    </div>
                    <p class="content">
                        설정도 독특하고 흥미롭네요 재밌어요
                    </p>
                    <p class="name"></p>
                    <p class="date"></p>
                </li>
            </ul>
        </section>
-->
    </main>
    <?php include "inc/bnb.html" ?>
</body>
</html>