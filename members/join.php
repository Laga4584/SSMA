<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/join.css">
    <script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/join.js"></script>
</head>
<body>
    <div class="title">
        <div class="logo"></div>
        <h1>소설모아</h1>
    </div>
    <form name="join_form" action="insert.php" method="post">
        <fieldset>
            <legend class="screen_out">회원가입 정보입력</legend>
            <div class="input_wrap">
                <div id="dsp_id" class="dsp_txt"></div>
                <div class="input_cont">
                    
                    <input type="text" name="uid" id="uid" placeholder="아이디"  onfocus="dsp_id()" onblur="check_id()">
                </div>
                <div id="err_id" class="err_txt"></div>
            </div>
            <div class="input_wrap">
                <div id="dsp_pwd" class="dsp_txt"></div>
                <input type="password" name="pwd" id="pwd" placeholder="비밀번호" onfocus="dsp_pwd()" onblur="check_pwd()">
                <div id="err_pwd" class="err_txt"></div>
            </div>
            <div class="input_wrap">
                <input type="password" name="pwd_check" id="pwd_check" placeholder="비밀번호 확인" onblur="check_pwd_check()">
                <div id="err_pwd_check" class="err_txt"></div>
            </div>

            <div class="input_wrap">
                <input type="text" name="nickname" id="nickname" placeholder="닉네임" onblur="check_nickname()">
                <div id="err_nickname" class="err_txt"></div>
            </div>
            
            <div class="input_wrap">
                <input type="text" name="birth" id="birth" placeholder="년(4자)" onblur="check_birth()">
                <div id="err_birth" class="err_txt"></div>
            </div>

            <div class="input_wrap">
                <select name="gender" id="gender" placeholder="성별" onblur="check_gender()">
                    <option value="" disabled selected>성별</option>
                    <option value="m">남자</option>
                    <option value="f">여자</option>
                </select>
                <div id="err_gender" class="err_txt"></div>
            </div>

            <div class="input_wrap">
                <label class="screen_out" for="email">이메일</label>
                <input type="text" name="email" id="email" placeholder="이메일" onblur="check_email()">
                <div id="err_email" class="err_txt"></div>
            </div>
                
            <button type="submit" class="submit" onclick="check_form()">가입하기</button>
        </fieldset>
    </form>
</body>
</html>