
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>WEB</title>
    </head>
    <body>
        <h1>ACCOUNT 목록</h1>
    </body>
</html>

<?php
    $connection = new mysqli('localhost', 'ysj','1234','testdb');

    $sql = 'select * from account; ';
    $result = mysqli_query($connection,$sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo 'a_no :' . $row['a_no']. 'a_term: '. $row['a_term']. 'a_dropdate: '. $row['a_dropdate']. 'a_name: '. $row['a_name']. 'a_b_code: '.$row['a_b_code']. '<br>';
        }
    }
    mysqli_close($connection);
?>

