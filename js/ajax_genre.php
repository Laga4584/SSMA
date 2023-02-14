<?php
/*
if (isset($_GET["call_name"])) {
echo match ($_GET["call_name"]) {
"getName" => getName()
};*/

$genre = $_GET["genre"];
$sub_genre = $_GET["sub_genre"];


if ($genre == "fantasy") {
  $genre_kor = "판타지";
} else if ($genre == "modern") {
  $genre_kor = "현판";
} else if ($genre == "oriental") {
  $genre_kor = "무협";
} else if ($genre == "romancefantasy") {
  $genre_kor = "로판";
} else {
  $genre_kor = "로맨스";
}

include "../inc/dbcon.php";

if ($sub_genre == "전체") {

  $sql = "select * from novels where genre='$genre_kor'";
} else {
  $sql = "select * from novels where sub_genre='$sub_genre'";
}

try {
  $result = mysqli_query($dbcon, $sql);

  //DB에서 가져온 데이타를 PHP 배열에 각각 넣어서 JSON으로 전달해 주자.
  $db_seq = array();
  $db_title = array();
  $db_cover = array();



  //한글은 iconv를 해줘야 안깨지더군요. 이부분은 환경에 맞춰서 각자 하시면 좋을듯.
  while ($row = mysqli_fetch_array($result)) {
    array_push($db_seq, $row['seq']);
    array_push($db_title, $row['title']);
    array_push($db_cover, $row['cover']);
  }

  //최종 결과를 json으로 전달해 주자.
  echo (json_encode(array("seq" => $db_seq, "title" => $db_title, "cover" => $db_cover)));

} finally {
  mysqli_close($dbcon);
}
?>