<?php
include "../inc/session.php";
include "../inc/dbcon.php";

$page_num = $_GET["page_num"];
$page_offset = $page_num * 18;
$page_limit = ($page_num+1) * 18;

if(!$s_idx){
    $sql = "select keywords from users where seq=1";
}else{
    $sql = "select keywords from users where seq='$s_idx'";
}

try {
    $result = mysqli_query($dbcon, $sql);
    $array = mysqli_fetch_array($result)['keywords'];
    if(!$array){
        $keywords = "판타지, 무협, 성장";
    }else{
        $keywords = explode(",", $array);
    }

    $sql2 = "select * from novels where keywords like '%$keywords[0]%' or keywords like '%$keywords[1]%' or keywords like '%$keywords[2]%' order by date desc limit $page_offset, $page_limit";

    $db_seq = array();
    $db_title = array();
    $db_cover = array();

    $result = mysqli_query($dbcon, $sql2);

    while ($row = mysqli_fetch_array($result)) {
        array_push($db_seq, $row['seq']);
        array_push($db_title, $row['title']);
        array_push($db_cover, $row['cover']);
    }

    echo (json_encode(array("seq" => $db_seq, "title" => $db_title, "cover" => $db_cover)));

} finally {
    mysqli_close($dbcon);
}

?>