
function dsp_id() {
    var txt = document.getElementById("dsp_id");
    txt.textContent = "4~12글자로 입력해주세요";

}

function dsp_pwd() {
    var txt = document.getElementById("dsp_pwd");
    txt.textContent = "4~12글자로 입력해주세요";
}

function fncGetXMLHttpRequest() {
    if (window.ActiveXObject) {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e1) { return null; }
        }
        //IE 외 파이어폭스 오페라 같은 브라우저에서 XMLHttpRequest 객체 구하기
    } else if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        return null;
    }
}

function check_id() {
    var uid = document.getElementById("uid");
    var id_len = uid.value.length;
    var txt = document.getElementById("err_id");
    if (!uid.value) {
        txt.textContent = "아이디을 입력하세요";
        txt.className = "err_txt";
        return false;
    } else if (id_len < 4 || id_len > 12) {
        txt.textContent = "아이디는 4~12글자만 입력할 수 있습니다";
        txt.className = "err_txt";
        return false;
    } else {
        var xmlhttp = fncGetXMLHttpRequest();
        // 아이디를 체크할 php 페이지에 체크 하려하는 id 값을 파라미터로 전송
        xmlhttp.open('GET', 'id_check_ajax.php?u_id=' + uid.value, false);

        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == '4' && xmlhttp.status == 200) {
                if (xmlhttp.status == 500 || xmlhttp.status == 404 || xmlhttp.status == 403){
                    alert(xmlhttp.status);
                    return false;
                }
                else {
                    var res = xmlhttp.responseText;
                    res = res.replace(/\n/g, ""); //행바꿈 제거
                    res = res.replace(/\r/g, ""); //엔터값 제거
                    res = res.replace(/\s+/, ""); //왼쪽 공백 제거
                    res = res.replace(/\s+$/g, ""); //오른쪽 공백 제거
                    if (res == 'Y') {
                        txt.textContent = '이미 가입된 아이디입니다.';
                        txt.className = "err_txt";
                        return false;
                    } else {
                        txt.textContent = '사용할 수 있는 아이디입니다.';
                        txt.className = "dsp_txt";
                        return true;
                    }

                }
            }
        };

        xmlhttp.send();

    }
}

function check_pwd() {
    var pwd = document.getElementById("pwd");
    var pwd_len = pwd.value.length;
    var txt = document.getElementById("err_pwd");
    if (!pwd.value) {
        txt.textContent = "비밀번호를 입력하세요";
        txt.className = "err_txt";
        return false;
    } else if (pwd_len < 4 || pwd_len > 12) {
        txt.textContent = "비밀번호는 4~12글자만 입력할 수 있습니다";
        txt.className = "err_txt";
        return false;
    } else {
        txt.textContent = "사용할 수 있는 비밀번호입니다";
        txt.className = "dsp_txt";
        return true;
    }

}

function check_pwd_check() {
    var pwd = document.getElementById("pwd");
    var pwd_check = document.getElementById("pwd_check");
    var txt = document.getElementById("err_pwd_check");

    if (!pwd_check.value) {
        txt.textContent = "비밀번호를 한번 더 입력해주세요";
        txt.className = "err_txt";
        return false;
    } else if (pwd.value != pwd_check.value) {
        txt.textContent = "비밀번호를 확인해주세요";
        txt.className = "err_txt";
        return false;
    } else {
        txt.textContent = "비밀번호가 일치합니다"
        txt.className = "dsp_txt";
        return true;
    }
}

function check_nickname() {
    var nickname = document.getElementById("nickname");
    var txt = document.getElementById("err_nickname")

    if (!nickname.value) {
        txt.textContent = "닉네임을 입력해주세요";
        return false;
    } else {
        txt.textContent = "";
        return true;
    }
}

function check_birth() {
    var birth = document.getElementById("birth");
    var txt = document.getElementById("err_birth")

    if (!birth.value) {
        txt.textContent = "생년을 입력해주세요";
        return false;
    } else {
        txt.textContent = "";
        return true;
    }
}

function check_gender() {
    var gender = document.getElementById("gender");
    var txt = document.getElementById("err_gender")

    if (!gender.value) {
        txt.textContent = "성별을 선택해주세요";
        return false;
    } else {
        txt.textContent = "";
        return true;
    }
}


function check_email() {
    var email = document.getElementById("email");
    var txt = document.getElementById("err_email")

    if (!email.value) {
        txt.textContent = "이메일을 입력해주세요";
        return false;
    } else {
        txt.textContent = "";
        return true;
    }
}

function check_form(){
    if(!check_id())return false;
    if(!check_pwd())return false;
    if(!check_pwd_check())return false;
    if(!check_nickname())return false;
    if(!check_birth())return false;
    if(!check_gender())return false;
    if(!check_email())return false;
}