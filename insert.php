<?php
    $connection = new mysqli('localhost','test_user','1234','testdb');

    # 삽입 전 테이블 조회
    echo 'before insert....<br><br><br>';
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
    $sql = "insert into branch values('500', '부산금정','부산시 금정구','051-500-1234','1234000')";

    # 쿼리 실행
    $result = mysqli_query($connection, $sql);

    # insert 쿼리 결과 확인
    $sql = 'select * from branch;';
    $result = mysqli_query($connection, $sql);
    
    echo 'after insert....<br><br><br>';

    # 쿼리 결과 출력
    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_assoc($result)){
            echo 'b_code: ' . $row['b_code'].' b_name: '. $row['b_name'].' b_addr: '
            .$row['b_addr'].' b_phone: '. $row['b_phone'].' b_assets: '.$row['b_assets'].'<br>';
        }
    }
	mysqli_close($connection);
?>