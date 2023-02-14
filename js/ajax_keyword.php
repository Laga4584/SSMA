<?php
/*
if (isset($_GET["call_name"])) {
echo match ($_GET["call_name"]) {
"getName" => getName()
};*/
$keyword_list = $_GET["keyword_list"];

include "../inc/dbcon.php";

$sql = "select * from novels where keywords LIKE ";
for ($i = 0; $i < count($keyword_list); $i++) {
  $sql = $sql . "'%" . $keyword_list[$i] . "%' AND keywords LIKE ";
}

$sql = substr($sql, 0, -19) . ";";

try {

  $result = mysqli_query($dbcon, $sql);

  //DB에서 가져온 데이타를 PHP 배열에 각각 넣어서 JSON으로 전달해 주자.
  $db_seq = array();
  $db_title = array();
  $db_author = array();
  $db_publisher = array();
  $db_rating = array();
  $db_series = array();
  $db_fin = array();
  $db_cover = array();



  //한글은 iconv를 해줘야 안깨지더군요. 이부분은 환경에 맞춰서 각자 하시면 좋을듯.
  while ($row = mysqli_fetch_array($result)) {
    array_push($db_seq, $row['seq']);
    array_push($db_title, $row['title']);
    array_push($db_author, $row['author']);
    array_push($db_publisher, $row['publisher']);
    array_push($db_rating, $row['rating']);
    array_push($db_series, $row['series']);
    array_push($db_fin, $row['fin']);
    array_push($db_cover, $row['cover']);
  }

  //최종 결과를 json으로 전달해 주자.
  echo (json_encode(array("seq" => $db_seq, "title" => $db_title, "author" => $db_author, "publisher" => $db_publisher, "rating" => $db_rating, "series" => $db_series, "fin" => $db_fin, "cover" => $db_cover)));

} finally {
  mysqli_close($dbcon);
}
?>