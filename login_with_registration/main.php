<?php
session_start();
if(isset($_SESSION['PO_id']) && isset($_SESSION['PO_name'])) {

?>
<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    div {
        width: 100%;
        height: 300px;
        border: 1px solid #000;
    }
    div.left {
        width: 50%;
        float: left;
        box-sizing: border-box;
        background: #909090;
    }
    div.right {
        width: 50%;
        float: right;
        box-sizing: border-box;
        background: #A874;
    }
    </style>
</head>
<body>
    <h2><?php echo $_SESSION['PO_name'] ?> 으로 로그인 하셨습니다. <a href="logout.php" class="ca">Logout</a></h2>
        <div class="left" style="cursor:pointer; text-align:right; line-height:250px" OnClick="location=https://www.naver.com" ><h2>방으로 조회</h2></div>
        <div class="right" style="cursor:pointer; text-align:right; line-height:250px"><h2>죄수번호로 조회</h2></div>
        <a href="po.php" class='ca'>교도관 조회</a>
</body>
</html>
<?php
}else{
    header("Location: index.php");
    exit();
}

?>