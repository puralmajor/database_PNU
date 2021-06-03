<?php
  include "../connection.php";
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>삭제완료!</title>
  </head>
  <body>
  <?php
        $sql = "delete from prisoner where p_release_date = '".$_POST['p_release_date']."';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        if($result){
            echo "삭제가 완료되었습니다.";
        }
    ?>
    <button type="button" class="btn btn-primary active" id="btn" 
   onclick="document.location.href='pdelete.php'">확인</button>
        
  </body>
</html>