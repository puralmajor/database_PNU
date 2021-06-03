<?php 
session_start();
include "connection.php";

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['crime']) && isset($_POST['admission'])
    && isset($_POST['release']) && isset($_POST['record']) && isset($_POST['age']) && isset($_POST['sentence']) && isset($_POST['penalty']) && isset($_POST['room'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    $id=validate($_POST['id']);
    $crime=validate($_POST['crime']);
    $name=validate($_POST['name']);
    $name=validate($_POST['record']);
    $admission=validate($_POST['admission']);
    $release=validate($_POST['release']);
    $age=validate($_POST['age']);
    $sentence=validate($_POST['sentence']);
    $penalty=validate($_POST['penalty']);
    $room=validate($_POST['room']);
    $record=validate($_POST['record']);

    $user_data = 'id='. $id. '&name='. $name;

    if (empty($id)){
        header("Location: input.php?error=아이디를 입력하세요.&$user_data");
        exit();
    }else if(empty($name)){
        header("Location: input.php?error=이름을 입력하세요.&$user_data");
        exit();
    }else if(empty($crime)){
        header("Location: input.php?error=범죄 종류를 입력하세요.&$user_data");
        exit();
    }else if(empty($admission)){
        header("Location: input.php?error=입소일을 입력하세요.&$user_data");
        exit();
    }else if(empty($release)){
        header("Location: input.php?error=출소일 확인이 필요합니다.&$user_data");
        exit();
    }else if(empty($record)){
        header("Location: input.php?error=범죄 경력 확인이 필요합니다.&$user_data");
        exit();
    }else if(empty($age)){
        header("Location: input.php?error=나이를 입력하세요.&$user_data");
        exit();
    }else if(empty($sentence)){
        header("Location: input.php?error=형량 확인이 필요합니다.&$user_data");
        exit();
    }else if(empty($room)){
        header("Location: input.php?error=수감될 방을 지정하세요.&$user_data");
        exit();
    }else if($release !== $admission+$sentence){
        header("Location: input.php?error=출소일이 올바르지 않습니다.&$user_data");
        exit();
    }else{ 
        $sql = "SELECT * FROM prisoner where  P_number='$id' ";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0) {
            header("Location: input.php?error=이미 존재하는 죄수번호입니다.&$user_data");
            exit();
        }else{
            $sql2 = "INSERT INTO prisoner(P_number, P_name, P_crime, P_admission_date, P_release_date, P_crime_record, P_age, P_sentence, P_penalty, PRISON_ROOM_PR_number) VALUES('$id', '$name', '$crime', '$admission', '$release', '$record', '$age', '$sentence', '$penalty', '$room')";
            $result2 = mysqli_query($conn,$sql2);
            if($result2) {
                header("Location: input.php?success=정상적으로 등록되었습니다.");
                exit();
            }else{
                header("Location: input.php?error=unknown error occured. please contact with administor&$user_data");
                exit();
            }
        }
    }
}else{
    header("Location: input.php");
    exit();
}