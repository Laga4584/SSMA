<?php 
//이전 페이지에서 값 가져오기
//method: get
//method: get -> $_GET["필드의 네임 속성값"];
//method: post -> $_POST["필드의 네임 속성값"];

//이전 페이지에서 값 가져오기
$nickname = $_POST["nickname"];
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];
$birth = $_POST["birth"];
$gender = $_POST["gender"];
//$apply = $_POST["apply"];

//시간 구하기
$reg_date = date("Y-m-d");

// 값 확인
// js: document.writh() -> echo
/*
echo "<p> 이름 :".$nickname."</p>";
echo "<p> 아이디 :".$uid."</p>";
echo "<p> 비밀번호 :".$pwd."</p>";
echo "<p> 이메일 :".$email."</p>";
echo "<p> 성별 :".$gender."</p>";
echo "<p> 가입일 :".$reg_date."</p>";
*/

// DB연결
include "../inc/dbcon.php";

$sql = "insert into members(id, password, nickname, birth, email, gender, reg_date) values( '$uid', '$pwd', '$nickname', '$birth', '$email', '$gender', '$reg_date');";

//데이터베이스에 쿼리 전송
//mysqli_query("DB연결객체", "전송할 쿼리");
try {
  mysqli_query($dbcon, $sql);
}
finally{
  mysqli_close($dbcon);
}

//DB 접속 종료
//mysqli_close("DB연결객체");
//mysqli_close($dbcon);

//리디렉션
echo "<script type=\"text/javascript\">
location.href = \"welcome.php\";
</script>";

?>

<!--
<script type="text/javascript">
  //location.href = "이동할 페이지 주소";
  location.href = "welcome.php";
</script>
-->