<?php
$PO_id = $_GET['PO_id'];
$PO_password = $_GET['PO_password'];

if(!is_null($PO_id)) {
  $p_conn = mysqli_connect('localhost', 'ysj', '1234', 'dogeprison');
  $p_sql = "SELECT PO_password FROM PROSON_OFFICER WHERE PO_id = '.$PO_id';";
  $p_result = mysqli_query($p_conn, $p_sql);
  while($p_row = mysqli_fetch_array($p_result)) {
    $encrypted_password = $p_row['PO_password'];
  }
  if(is_null($encrypted_password)) {
    $wu = 1;
  } else {
    if ( password_verify($PO_password, $encrypted_password)) {
      header('Location: login-ok.php');
    } else {
      $wp = 1;
    }
  }
}
?>

<!--
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
  </body>
</html>
-->
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/style/style.css">
  </head>

  <body width="100%" height="100%">
    <form action="login.php" method="POST" class="loginForm">
      <h2>Login</h2>
      <div class="idForm">
        <input type="text" name="PO_id" class="id" placeholder="ID" required>
      </div>
      <div class="passForm">
        <input type="password" name="PO_password"class="pw" placeholder="PW">
      </div>
      <button type="submit" value="로그인">
        LOG IN
      </button>
      <?php
        if($wu==1) {
          echo "<p>사용자 이름이 존재하지 않습니다.</p>";
        }
        if($wp==1) {
          echo "<p>비밀번호가 틀렸습니다.</p>";
        }
      ?>
      <div class="bottomText">
        <a href="/sign.php">신규등록</a>
      </div>
    </form>
  </body>
</html>
