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
            <form action="insert2.php" method="POST">
                <p><input type="varchar" name='p_number' placeholder='p_number'></p>
                <p><input type="varchar" name='p_name' placeholder='p_name'></p>
                <p><input type="varchar" name='p_crime' placeholder='p_crime'></p>
                <p><input type="varchar" name='p_admission_date' placeholder='p_admission_date'></p>
                <p><input type="varchar" name='p_release_date' placeholder='p_release_date'></p>
                <p><input type="varchar" name='p_crime_record' placeholder='p_crime_record'></p>
                <p><input type="varchar" name='p_age' placeholder='p_age'></p>
                <p><input type="varchar" name='p_sentence' placeholder='p_sentence'></p>
                <p><input type="varchar" name='p_penalty' placeholder='p_penalty'></p>
                <p><input type="varchar" name='prison_room_pr_number' placeholder='prison_room_pr_number'></p>
                <p><input type="submit"></p>
                


            



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
                        $conn = new mysqli('localhost', 'root', 'wlsals!12', 'dogeprison');
                        $sql = "select prison_room_pr_number, count(prison_room_pr_number),sum(p_crime = '살인'),sum(p_crime = '성범죄'),sum(p_crime = '마약') from prisoner GROUP BY PRISON_ROOM_PR_number HAVING COUNT(PRISON_ROOM_PR_number)>1 order by count(prison_room_pr_number);";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['prison_room_pr_number'].'</td><td>' .$row['count(prison_room_pr_number)'].'</td><td>'.$row["sum(p_crime = '살인')"].'</td><td>'. $row["sum(p_crime = '성범죄')"].'</td><td>'. $row["sum(p_crime = '마약')"];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>    
          
            </table>
        </div>
    </body>
</html>
