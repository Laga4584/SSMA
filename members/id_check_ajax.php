  <?php
  $u_id = $_GET['u_id'];
  
  include "../inc/dbcon.php";
   
  $sql="select * from members where id='$u_id'";
  
  try {
    $result = mysqli_query($dbcon, $sql);
    $num_match = mysqli_num_rows($result);

    if (!$num_match) {
      echo "N";
    } else {
      echo "Y";
    }
  }finally{
    mysqli_close($dbcon);
  }
?>