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
           


            
            <table>
                <thead>
                    <tr>
                        <th>방 번호</th>
                        <th>방 현재 인원 수</th>
                        <th>방 내 살인범 수</th>
                        <th>방 내 성범죄자 수</th>
                        <th>방 내 마약범 수</th>
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
