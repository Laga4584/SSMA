<?php
 
// 데이터 가져오기
$genre = $_GET["genre"];
?>

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
    <link rel="stylesheet" type="text/css" href="css/genre.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/genre.js"></script>
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
            </section>
        </div>
        <div class="category_wrap">
            <section class="category">
                <ul id= "category_list" class="<?php echo $genre ?>">
                    <li class="menu_fantasy"><a href="genre.php?genre=fantasy">판타지</a></li>
                    <li class="menu_modern"><a href="genre.php?genre=modern">현판</a></li>
                    <li class="menu_oriental"><a href="genre.php?genre=oriental">무협</a></li>
                    <li class="menu_romancefanstasy"><a href="genre.php?genre=romancefantasy">로판</a></li>
                    <li class="menu_romance"><a href="genre.php?genre=romance">로맨스</a></li>
                </ul>
            </section>
        </div>
        <div class="menu_wrap">
            <section class="menu">
                <ul id="menu_list">
                    <?php if($genre=="fantasy"){ ?>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="전체">전체</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="정통">정통</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="퓨전">퓨전</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="대체역사">대체역사</button></li>
                    <?php }else if($genre=="modern"){ ?>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="전체">전체</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="현대">현대</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="스포츠">스포츠</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="게임">게임</button></li>
                    <?php }else if($genre=="oriental"){ ?>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="전체">전체</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="정통무협">정통무협</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="신무협">신무협</button></li>
                    <?php }else if($genre=="romancefantasy"){ ?>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="전체">전체</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="동양풍">동양풍</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="서양풍">서양풍</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="가상">가상</button></li>
                    <?php }else{ ?>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="전체">전체</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="현대물">현대물</button></li>
                    <li><button onclick="getContents(this, '<?php echo $genre ?>')" value="시대물">시대물</button></li>
                    <?php }; ?>
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
</body>
</html>