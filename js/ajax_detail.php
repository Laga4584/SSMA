<?php
if(isset($_GET["req"])){
    $req = $_GET["req"];
}else{
    $req = $_POST["req"];
}

if ($req == "fetch") {
    fetch_data();
} else {
    post_data();
}

function fetch_data()
{
    $novel_seq = $_GET["novel_seq"];
    include "../inc/session.php";
    include "../inc/dbcon.php";

    $sql = "select * from novels where seq=" . $novel_seq . ";";

    try {

        $result = mysqli_query($dbcon, $sql);

        $db_seq = array();
        $db_title = array();
        $db_author = array();
        $db_publisher = array();
        $db_rating = array();
        $db_series = array();
        $db_fin = array();
        $db_cover = array();
        $db_story = array();
        $db_genre = array();
        $db_sub_genre = array();
        $db_favorite = array();
        $db_keywords = array(); 


        while ($row = mysqli_fetch_array($result)) {
            array_push($db_seq, $row['seq']);
            array_push($db_title, $row['title']);
            array_push($db_author, $row['author']);
            array_push($db_publisher, $row['publisher']);
            array_push($db_rating, $row['rating']);
            array_push($db_series, $row['series']);
            array_push($db_fin, $row['fin']);
            array_push($db_cover, $row['cover']);
            array_push($db_story, $row['story']);
            array_push($db_genre, $row['genre']);
            array_push($db_sub_genre, $row['sub_genre']);
            array_push($db_keywords, $row['keywords']);

            $sql_2 = "select * from favorites where novel_seq=" . $novel_seq . " and user_seq=" . $s_idx . ";";
            
            $result_2 = mysqli_query($dbcon, $sql_2);
            $num = mysqli_num_rows($result_2);
            if (!$num) {
                array_push($db_favorite, 'n');
            } else {
                array_push($db_favorite, 'y');
            }
        }

        //최종 결과를 json으로 전달해 주자.
        echo (json_encode(array("seq" => $db_seq, "title" => $db_title, "author" => $db_author, "publisher" => $db_publisher, "rating" => $db_rating, "series" => $db_series, "fin" => $db_fin, "cover" => $db_cover, "story" => $db_story, "genre" => $db_genre, "sub_genre" => $db_sub_genre, "favorite" => $db_keywords, "keywords" => $db_favorite)));

    } finally {
        mysqli_close($dbcon);
    }
}

function post_data(){
    $novel_seq = $_POST["novel_seq"];
    $favorite = $_POST["favorite"];
    include "../inc/session.php";
    include "../inc/dbcon.php";

    if ($favorite == 'y') {
        $sql = "insert into favorites (user_seq, novel_seq) values('" . $s_idx . "', '" . $novel_seq . "');";
    }else{
        $sql = "delete from favorites where novel_seq=" . $novel_seq . " and user_seq=" . $s_idx . ";";
    }

    try {
        mysqli_query($dbcon, $sql);
    } finally {
        mysqli_close($dbcon);
    }
}

?>