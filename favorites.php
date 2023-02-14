<?php
include "inc/session.php";
if(!$s_idx){
    echo
    "<script type=\"text/javascript\">
    location.href = \"login.php?url=favorites.php\";
    </script>";
};

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>찜</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/favorites.css">
    
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/favorites.js"></script>
    
</head>
<body>
    <header>
    <div class="prev" onclick="history.back()"><</div>
        <div class="page_title">찜한 소설</div>
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
