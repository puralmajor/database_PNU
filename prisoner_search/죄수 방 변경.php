<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<style>
        table{
                border-top: 2px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 2px solid #444444;
                padding: 2px;
        }
        td{
                border-bottom: 1px solid red;
                padding: 6px;
        }
        .text{
            text-decoration: underline;
                text-align:center;
                padding-top:1px;
                color:#000000;
        }       
</style>

    <head>
        <title>죄수 방 변경 페이지</title>
        <br>
    </head>
    <body align = center>
        <div>
            <h3><p>죄수 방 변경<p></h3>

                <button type="button" class="btn btn-primary active" id="btn" 
	            onclick="document.location.href='죄수조회.php'">조회로 돌아가기</button>

                <form method="post" action = "죄수 방 변경.php">
                    <p>죄수번호: <input type="text" name = "u_p_number" /><p>
                    <p>변경될 방: <input type="text" name = "u_prison_room_pr_number" ><p>
                    <input type="submit" value="방 변경 확인"/>
    

                     <?php
                    $conn = new mysqli('localhost', 'root', 'sms0626', 'dogeprison');
                    $sql = "update prisoner set prison_room_pr_number = '".$_POST['u_prison_room_pr_number']."' where p_number = '".$_POST['u_p_number']."';";
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    ?>
                 </form>




            <table align = center>
                <thead>
                    <tr>
                        <th>방 번호</th>
                        <th>현재 인원수</th>
                        <th>살인범 수</th>
                        <th>성범죄자 수</th>
                        <th>마약범 수</th>
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
    </body>
</html>