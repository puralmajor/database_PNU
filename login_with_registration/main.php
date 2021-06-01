<?php
session_start();
if(isset($_SESSION['PO_id']) && isset($_SESSION['PO_name'])) {

?>
<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1><?php echo $_SESSION['PO_name'] ?> 으로 로그인 하셨습니다.</h1> <br>
    <a href="logout.php">Logout</a>
</body>
</html>
<?php
}else{
    header("Location: index.php");
    exit();
}

?>