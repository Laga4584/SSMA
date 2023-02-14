<?php
$url = $_GET["url"];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
    <div class="logo"></div>
    <h1>소설모아</h1>
    <form name="login" action="login_ok.php?url='<?php echo $url ?>'" method="post">
        <fieldset>
            <legend class="screen_out">로그인</legend>
            <p>
                <input type="text" name="uid" id="uid" placeholder="아이디">
            </p>
            <p>
                <input type="password" name="pwd" id="pwd" placeholder="비밀번호">
            </p>
        </fieldset>
        <div class="find">
        <div class="find_id">아이디 찾기</div>
        <div class="find_pwd">비밀번호 찾기</div>
    </div>
    <div class="button_wrap">
        <button class="button" type="submit">로그인</button>
        <div class="button"><a href="memebers/join.php">회원가입</a></div>
    </div>
    </form>
    
</body>
</html>