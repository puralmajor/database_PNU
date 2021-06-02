<?php
    $connection = new mysqli('localhost', 'test_user','1234','testdb');

    # sql 쿼리문 정의
    $sql = 'select * from account;';

    # 쿼리 실행
    $result = mysqli_query($connection, $sql);

    # 쿼리 결과 출력
    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_assoc($result)){
            echo 'a_no: ' . $row['a_no'].' a_term: '. $row['a_term'].' a_dropdate: '
            .$row['a_dropdate'].' a_name: '. $row['a_name'].' a_b_code: '.$row['a_b_code'].'<br>';
        }
    }
	mysqli_close($connection);
?>