<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>죄수 추가  페이지</title>
        <br>
    </head>
    <body>
        <div>
            <h3><p>죄수 추가 페이지</p></h3>
            <h4><p>죄수 정보를 입력하세요</p></h4>
            <form action="plus.php" method="POST">
                <p><input type="text" name="p_number" placeholder='p_number'></p>
                <p><input type="text" name="p_name" placeholder='p_name'></p>
                <p><input type="text" name="p_crime" placeholder='p_crime'></p>
                <p><input type="text" name="p_admission_date" placeholder='p_admission_date'></p>
                <p><input type="text" name="p_release_date" placeholder='p_release_date'></p>
                <p><input type="text" name="p_crime_record" placeholder='p_crime_record'></p>
                <p><input type="text" name="p_age" placeholder='p_age'></p>
                <p><input type="text" name="p_sentence" placeholder='p_sentence'></p>
                <p><input type="text" name="p_penalty" placeholder='p_penalty'></p>
                <p><input type="text" name="prison_room_pr_number" placeholder='prison_room_pr_number'></p>
                <p><input type="submit"></p>

                <?php
                $conn = mysqli_connect(
                'localhost',
                'root',
                'sms0626',
                'dogeprison');
                

                $filtered = array(
                    'p_number'=>mysqli_real_escape_string($conn, $_POST['p_number']),
                    'p_name'=>mysqli_real_escape_string($conn, $_POST['p_name']),
                    'p_crime'=>mysqli_real_escape_string($conn, $_POST['p_crime']),
                    'p_admission_date'=>mysqli_real_escape_string($conn, $_POST['p_admission_date']),
                    'p_release_date'=>mysqli_real_escape_string($conn, $_POST['p_release_date']),
                    'p_crime_record'=>mysqli_real_escape_string($conn, $_POST['p_crime_record']),
                    'p_age'=>mysqli_real_escape_string($conn, $_POST['p_age']),
                    'p_sentence'=>mysqli_real_escape_string($conn, $_POST['p_sentence']),
                    'p_penalty'=>mysqli_real_escape_string($conn, $_POST['p_penalty']),
                    'prison_room_pr_number'=>mysqli_real_escape_string($conn, $_POST['prison_room_pr_number'])
                );

                $sql = "
                INSERT INTO prisoner(p_number, p_name, p_crime, p_admission_date, p_release_date, p_crime_record, p_age, p_sentence, p_penalty, prison_room_pr_number)
                    VALUES(
                    '{$filtered['p_number']}',
                    '{$filtered['p_name']}',
                    '{$filtered['p_crime']}',
                    '{$filtered['p_admission_date']}',
                    '{$filtered['p_release_date']}',
                    '{$filtered['p_crime_record']}',
                    '{$filtered['p_age']}',
                    '{$filtered['p_sentence']}',
                    '{$filtered['p_penalty']}',
                    '{$filtered['prison_room_pr_number']}',
                        NOW()
                    )
                ";
                $result = mysqli_query($conn, $sql);
                if($result === false){
                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
                error_log(mysqli_error($conn));
                } else {
                echo '성공했습니다. <a href="3_1.php">돌아가기</a>';
                }
                ?>   


            
            <table>
                <thead>
                    <tr>
                        <th>방 번호</th>
                        <th>방 현재 인원 수</th>
                        <th>방 내 살인범 수</th>
                        <th>방 내 마약범 수</th>
                        <th>방 내 총인원 수</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'root', 'sms0626', 'dogeprison');
                        $sql3 = "select prison_room_pr_number, count(prison_room_pr_number),sum(p_crime = '살인'),sum(p_crime = '성범죄'),sum(p_crime = '마약') from prisoner GROUP BY PRISON_ROOM_PR_number HAVING COUNT(PRISON_ROOM_PR_number)>0 order by count(prison_room_pr_number);";

                        $result  = mysqli_query($conn, $sql3);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['prison_room_pr_number'].'</td><td>' .$row['count(prison_room_pr_number)'].'</td><td>'.$row["sum(p_crime = '살인')"].'</td><td>'. $row["sum(p_crime = '성범죄')"].'</td><td>'. $row["sum(p_crime = '마약')"];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>     
          
            </table>
        </div>
     