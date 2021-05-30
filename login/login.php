<?php 
session_start();
include "connection.php";

if(isset($_POST['id']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    $id=validate($_POST['id']);
    $pass=validate($_POST['password']);

    if (empty($id)){
        header("Location: index.php?error=아이디를 입력하세요.");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=비밀번호를 입력하세요.");
        exit();
    }else{
        $sql = "SELECT * FROM prison_officer where  PO_id='$id' AND PO_password='$pass'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['PO_id'] === $id && $row['PO_password'] === $pass){
                $_SESSION['PO_id'] = $row['PO_id'];
                $_SESSION['PO_password'] = $row['PO_password'];
                $_SESSION['PO_name'] = $row['PO_name'];
                header("Location: main.php");
                exit();
            }else{
                header("Location: index.php?error=ID 또는 PASSWORD 오류입니다.");
                exit();
            }
        }else{
            header("Location: index.php?error=ID 또는 PASSWORD 오류입니다.");
            exit();
        }
    }
}else{
    header("Location: index.php");
    exit();
}