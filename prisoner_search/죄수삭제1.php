<?php
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>죄수 삭제</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>이번 달의 출소자는?</h1>
    <form action="pdelete2.php" method="POST">
                <p><input type="varchar" name='p_release_date' placeholder='0000.00 (년도.월)'></p>
               
                <p><input type="submit"></p>
    </from>
  </body>
  

</html>
