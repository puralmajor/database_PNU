<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
    include "../connection.php";
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>죄수 벌점 부여 페이지</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <br>
    </head>
    <body align = center>
        <div>
            <h3><p>죄수 벌점 부여<p></h3>

                <button type="button" class="btn btn-primary active" id="btn" 
	            onclick="document.location.href='죄수조회.php'">조회로 돌아가기</button>
                </p>
                <form method="post" action = "벌점부여.php">
                죄수번호: <input type="text" name = "u_p_number" size = "20"/><br>
                벌점: <input type="text" name = "u_p_penalty" size = "20"/><br>
                <input type="submit" value="갱신">

                
                <?php
                    $sql = "update prisoner set p_penalty = '".$_POST['u_p_penalty']."' where p_number = '".$_POST['u_p_number']."';";
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                ?>

                </form>
        </div>
    </body>
</html>