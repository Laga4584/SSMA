<?php
/*
if (isset($_GET["call_name"])) {
echo match ($_GET["call_name"]) {
"getName" => getName()
};*/

include "../inc/session.php";
include "../inc/dbcon.php";

try {

  $sql = "select * from favorites where user_seq=" . $s_idx . ";";
  $result = mysqli_query($dbcon, $sql);

  //DB에서 가져온 데이타를 PHP 배열에 각각 넣어서 JSON으로 전달해 주자.
  $db_seq = array();
  $db_title = array();
  $db_cover = array();

  //한글은 iconv를 해줘야 안깨지더군요. 이부분은 환경에 맞춰서 각자 하시면 좋을듯.
  while ($row = mysqli_fetch_array($result)) {
    $sql_2 = "select * from novels where seq=" . $row['novel_seq'] . ";";
    $result_2 = mysqli_query($dbcon, $sql_2);
    while ($array_2 = mysqli_fetch_array($result_2)) {
      array_push($db_seq, $array_2['seq']);
      array_push($db_title, $array_2['title']);
      array_push($db_cover, $array_2['cover']);
    }
  }

  //최종 결과를 json으로 전달해 주자.
  echo (json_encode(array("seq" => $db_seq, "title" => $db_title, "cover" => $db_cover)));

} finally {
  mysqli_close($dbcon);
}

?>