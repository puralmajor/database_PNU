
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>삭제완료!</title>
  </head>
  <body>
  <?php
        $conn = new mysqli('localhost', 'root', 'wlsals!12', 'dogeprison');
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