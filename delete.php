<?php
    $connection = new mysqli('localhost','test_user','1234','testdb');

    # 삭제 전 테이블 조회
    echo 'before delete....<br><br><br>';
    $sql = 'select * from branch;';
    $result = mysqli_query($connection, $sql);
    
    # 쿼리 결과 출력
    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_assoc($result)){
            echo 'b_code: ' . $row['b_code'].' b_name: '. $row['b_name'].' b_addr: '
            .$row['b_addr'].' b_phone: '. $row['b_phone'].' b_assets: '.$row['b_assets'].'<br>';
        }
    }
    
    echo '<br><br><br>';

    # sql 쿼리문 정의
    $sql = "delete from branch where b_name = '부산금정'";

    # 쿼리 실행
    $result = mysqli_query($connection, $sql);

    # delete 쿼리 결과 확인
    $sql = 'select * from branch;';
    $result = mysqli_query($connection, $sql);

    echo 'after delete....<br><br><br>';
    
    # 쿼리 결과 출력
    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_assoc($result)){
            echo 'b_code: ' . $row['b_code'].' b_name: '. $row['b_name'].' b_addr: '
            .$row['b_addr'].' b_phone: '. $row['b_phone'].' b_assets: '.$row['b_assets'].'<br>';
        }
    }
	mysqli_close($connection);
?>