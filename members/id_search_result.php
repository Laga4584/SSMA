<?php
// 데이터 가져오기
$u_id = $_POST["user_id"];

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
// select u_id from members where u_id='$u_id';   <= id 검색이니까 필드는 u_id가 필요
$sql = "select u_id from members where u_id='$u_id';";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// DB에서 데이터 가져오기
$num = mysqli_num_rows($result);                         //<-----select count(*) from members;

// 조건문 작성

// DB 종료

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"<?php echo $u_id; ?>"검색 결과</title>
    <style type="text/css">
        body{font-size:20px}
        .id_txt{font-weight:bold;color:rgb(40, 92, 188)}
        .able{font-weight:bold;color:rgb(40,92,188)}
        .unable{font-weight:bold;color:rgb(251,77,14)}        
    </style>
    <script type="text/javascript">
        function return_id(){
            opener.document.getElementById("u_id").value = "<?php echo $u_id; ?>";
            window.close();
        };
    </script>
</head>
<body>
<?php if(!$num){ ?>
    <p>
        입력하신 <span class="id_txt">"<?php echo $u_id; ?>"</span>은 사용할 수 <span class="able">있는</span> 아이디입니다.
    </p>
    <p>
        <a href="#" onclick="javascript:history.back();">[다시 검색]</a>
        <a href="#" onclick="return_id()">[사용하기]</a>
    </p>
    <?php } else{ ?>
    <p>
        입력하신 <span class="id_txt">"<?php echo $u_id; ?>"</span>은 사용할 수 <span class="unable">없는</span> 아이디입니다.
    </p>
    <p>
        <a href="#" onclick="javascript:history.back();">[다시 검색]</a>
        <a href="#" onclick="window.close()">[닫기]</a>
    </p>
    <?php
    };

    mysqli_close($dbcon);     //<--- 따로 써도 되고 묶어써도 됨
    ?>
</body>
</html>