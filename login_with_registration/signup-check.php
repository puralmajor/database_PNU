<?php 
session_start();
include "connection.php";

if(isset($_POST['id']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['passwordCheck']) && isset($_POST['building']) && isset($_POST['rank'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    $id=validate($_POST['id']);
    $pass=validate($_POST['password']);
    $name=validate($_POST['name']);
    $passCheck=validate($_POST['passwordCheck']);
    $building=validate($_POST['building']);
    $rank=validate($_POST['rank']);

    $user_data = 'id='. $id. '&name='. $name;

    if (empty($id)){
        header("Location: signup.php?error=아이디를 입력하세요.&$user_data");
        exit();
    }else if(empty($name)){
        header("Location: signup.php?error=이름을 입력하세요.&$user_data");
        exit();
    }else if(empty($rank)){
        header("Location: signup.php?error=계급을 입력하세요.&$user_data");
        exit();
    }else if(empty($pass)){
        header("Location: signup.php?error=비밀번호를 입력하세요.&$user_data");
        exit();
    }else if(empty($passCheck)){
        header("Location: signup.php?error=비밀번호 확인이 필요합니다.&$user_data");
        exit();
    }else if(empty($building)){
        header("Location: signup.php?error=배정된 사동을 입력하세요.&$user_data");
        exit();
    }else if($pass !== $passCheck){
        header("Location: signup.php?error=입력하신 비밀번호가 서로 다릅니다.&$user_data");
        exit();
    }else{ 
        $sql = "SELECT * FROM prison_officer where  PO_id='$id' ";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=이미 존재하는 ID입니다.&$user_data");
            exit();
        }else{
            $sql2 = "INSERT INTO prison_officer(PO_id,PO_name,PO_rank,PO_password,PRISON_BUILDING_PB_id) VALUES('$id', '$name', '$rank', '$password', '$building')";
            $result2 = mysqli_query($conn,$sql2);
            if($result2) {
                echo "<script:javascript> alert(\"등록완료\');</script>";
                header("Location: signup.php?success=정상적으로 등록되었습니다.");      
                exit();
            }else{
                header("Location: signup.php?error=unknown error occured. please contact with administor&$user_data");
                exit();
            }
        }
    }
}else{
    header("Location: signup.php");
    exit();
}
