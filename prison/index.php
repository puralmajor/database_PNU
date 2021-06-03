<?php
$conn = mysqli_connect(
  'localhost', // 주소
  'root',
  'wlsals!12',
  'dogeprison'); // 데이터베이스 이름

$sql = "SELECT * FROM branch";
$result = mysqli_query($conn, $sql);

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1>죄수 등록 페이지</h1>
    <h3> 죄수 번호, 이름, 죄질을 입력하세요. </h3>
    <form action="insert.php" method="POST">
      <p><input type="text" name="b_code" placeholder="죄수번호 "></p>
      <p><input type="text" name="b_name" placeholder="이름 "></p>
      <p><input type="text" name="b_addr" placeholder="죄질 "></p>
      <p><input type="submit"></p>
    </form>
    <button type="button" class="btn btn-primary active" id="btn" 
   onclick="document.location.href='ri.php'">방으로</button>
    <button type="button" class="btn btn-primary active" id="btn" 
   onclick="document.location.href='po.php'">교도관조회</button>
        
  </body>
</html>