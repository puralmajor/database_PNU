<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>방 정보 페이지</title>
        <br>
    </head>
    <body>
        <div>
            <h3><p>방 정보 페이지</p></h3>
        
            <table>
                <thead>
                    <tr>
                        <th>pr_number</th>
                        <th>pr_type</th>
                        <th>p_number</th>
                        <th>p_name</th>
                        <th>p_penalty</th>
                        <th>p_crime</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'root', 'wlsals!12', 'dogeprison');
                        $sql = "select pr_number,pr_type,p_number,p_name,p_penalty,p_crime from prison_room join prisoner where PR_number = '".$_POST['PR_number']."' and PRISON_ROOM_PR_number = '".$_POST['PR_number']."';";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['pr_number'].'</td><td>'.$row['pr_type'].'</td><td>'. $row['p_number'].'</td><td>'. $row['p_name'].'</td><td>'. $row['p_penalty'].'</td><td>'.$row['p_crime'];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            
            
            
            
            
            <table>
                <thead>
                    <tr>
                        <th>방 벌점 총합</th>
                        <th>방 내 살인범 수</th>
                        <th>방 내 성범죄자 수</th>
                        <th>방 내 마약범 수</th>
                        <th>방 내 총인원 수</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'root', 'wlsals!12', 'dogeprison');
                        $sql = "select sum(P_penalty),sum(p_crime = '살인'),sum(p_crime = '성범죄'),sum(p_crime = '마약'), count(PR_number) from prison_room join prisoner where pr_number = '".$_POST['PR_number']."' and prison_room_pr_number = '".$_POST['PR_number']."';";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['sum(P_penalty)'].'</td><td>'.$row["sum(p_crime = '살인')"].'</td><td>'. $row["sum(p_crime = '성범죄')"].'</td><td>'. $row["sum(p_crime = '마약')"].'</td><td>'. $row['count(PR_number)'];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary active" id="btn" 
   onclick="document.location.href='pinsert.php'">죄수 추가</button>
            <button type="button" class="btn btn-primary active" id="btn" 
   onclick="document.location.href='pdelete.php'">죄수 삭제</button>
            <button type="button" class="btn btn-primary active" id="btn" 
   onclick="document.location.href='prchange.php'">죄수 방 정보 변경</button>
        
        </div>
    </body>
        
       