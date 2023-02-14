<?php
// 세션
include "../inc/session.php";

// 로그인 사용자만 접근
include "../inc/login_check.php";

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from members where idx=$s_idx;";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// DB에서 데이터 가져오기
$array = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body, input, select, option, button{font-size:20px}
        input[type=checkbox]{width:20px; height:20px}
        input[type=text]:focus{border:5px solid red;outline: 0 none;background:#333;color: #fff;}
        .err_txt{font-size:16px; color:red}
        .dsp_txt{font-size:16px; color: red;}
        c_title{display:inline-block;width:80px}
        c_line{padding-bottom: 5px;border-bottom: 1px solid #999;}
    </style>
    <script type="text/javascript">
        window.onload = function(){
            var smt_btn = document.getElementById("smt_btn");
            smt_btn.addEventListener("click", form_check())
        };

        function edit_form_check(){
            //객체 생성
            var pwd = document.getElementById("pwd");
            var repwd = document.getElementById("repwd");
            var mobile = document.getElementById("mobild");

            if(pwd.value){
                var pwd_len = pwd.value.length;
                if(pwd_len < 4 || pwd_len > 12){
                    var txt = document.getElementById("err_pwd");
                    txt.textContent = "비밀번호는 4~12글자만 입력할 수 있습니다"
                    pwd.focus();
                    return false;
                };

                if(pwd.value != repwd.value){
                    alert("비밀번호를 확인해주세요");
                    repwd.focus();
                    return false;
                };
            };

            //정규식으로 숫자인지 검사
            var reg = /^[0-0]+$/g;
            if(!reg.test(mobile.value)){
                var txt = document.getElementById("err_repwd");
                txt.textContent = "전화번호는 숫자만 입력할 수 있습니다"
                mobile.focus();
                return false;
            };
        };

        function change_email(){
            var email_dns = document.getElementById("email_dns");
            var email_sel = document.getElementById("email_sel");
        
            var idx = email_sel.options.selectedndex;
            var val = email_sel.options[idx].value;
            email_dns.value = val;
        };

        function id_search(){
            //window.open("팝업할 문서 경로", "팝업 되었을 대의 이름", "옵션")
            window.open("id_search.html", "", "width=600, height=300, left=0, top=0");
        };

        function mem_del(){
            var rtn_val = confirm("정말 탈퇴하시겠습니까?");
            if(rtn_val == true){
                location.href = "member_delete.php";
                //location.href = "member_delete.php?g_idx=<?php echo $array["idx"]; ?>";
            };
        };
 
    </script>
</head>
<body>
    <form name="edit_form" action="edit.php" method="post" onsubmit="return edit_form_check()">
        <fieldset>
            <legend>회원정보</legend>
            <p>
                이름 <?php echo $array["u_name"]; ?>
            </p>
            <p>
                아이디 <?php echo $array["u_id"]; ?>
            </p>
            <p class="c_line">
                <label for="pwd" class="c_title">비밀번호</label>
                <input type="password" name="pwd" id="pwd">
                <br><span class="dsp_txt">* 비밀번호는 4-12글자만 입력할 수 있습니다</span>
                <br><span id="err_pwd" class="err_txt"></span>
            </p>
            <p class="c_line">
                <label for="repwd" class="c_title">비밀번호 확인</label>
                <input type="password" name="repwd" id="repwd>
            </p>
            <p class="c_line">
                <label for="mobile1" class="c_title">전화번호</label>
                <input type="text" name="mobile" id="mobile" value="<?php echo $array["mobile"]; ?>">
                <br>"-" 없이 숫자만 입력
            </p>
            <?php
            // 문자 분리 : explode
            // 변수 - explode("기준문자", "어떤 값에서");
            // 변수가 배열처리되어 분리된 값 사용
            // DB에서 가져온 이메일을 @ 기준으로 분리
            $email = explode("@", $array["email"]);
            ?>
            <p class="c_line">
                <label for="email_id" class="c_title">이메일</label>
                <input type="text" name="email_id" id="email_id" size="12" value="<?php echo $email[0] ?>">@
                <input type="text" name="email_dns" id="email_dns" size="12" value="<?php echo $email[1] ?>">
                <select name="email_sel" id="email_sel" oncahnge="change_email()">
                    <option value="">직접 입력</option>
                    <option value="naver.com">네이버</option>
                    <option value="hanmail.net">다음</option>
                    <option value="gmail.com">구글</option>
                </select>
            </p>
            <?php
            // DB에 입력된 YYYY-MM-DD 형식을 YYYYMMDD로 치환
            // 생년월일 변수 = 문자치환(생년월일 변수);
            // 변수 = str_replace("어떤 문자를", "어떤 문자로", "어떤 값에서");
            $birth = str_replace("-", "", $array["birth"]);

            ?>
            <p class="c_line">
                <label for="birth" class="c_title">생년월일</label>
                <input type="text" name="birth" id="birth" value="<?php echo $birth; ?>">
                <br><span class="dsp_txt">ex) 20221006</span>
                
            </p>
            <p class="c_line">
                <label for="addr_b" class="c_title">주소</label>
                <input type="text" name="ps_code" id="ps_code" value="<?php echo $array["ps_code"]; ?>">
                <button type="text">주소검색</button><br>
                <label for="addr_b">기본주소</label>
                <input type="text" name="addr_b" id="addr_b" size="30" value="<?php echo $array["addr_b"]; ?>"><br>
                <label for="addr_d">상세주소</label>
                <input type="text" name="addr_d" id="addr_d" size="30" value="<?php echo $array["addr_d"]; ?>">
                <br>ex) 20221006
            </p>
            <input type="radio" name="gender" id="male" class="gender" value="m"<?php if($array["gender"] == "m") echo " checked"; ?>>
            <label for="male">남</label>
            <input type="radio" name="gedner" id="female" class="gender" value="f"<?php if($array["gender"] == "f") echo "checked"; ?>>
            <label for="female">여</label>
            <p class="c_line">
                <input type="checkbox" name="apply" id="apply" class="apply">
                <label for="apply">약관동의</label>
            </p>
            <p>
                <button type="button" onclick="history_back()">이전 페이지</button>
                <button type="submit">정보수정</button>
                <button type="button" onclick="mem_del()">회원탈퇴</button>
            </p>
        </fieldset>

    </form>

</body>
</html>