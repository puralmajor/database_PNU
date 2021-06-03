<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
    include "../connection.php";
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>방 정보 페이지</title>
        <br>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div>
          <form>
            <h2><p>방 정보 페이지</p></h2>
            <table>
                <thead>
                    <tr>
                        <th>방번호</th>
                        <th>방사이즈</th>
                        <th>죄수번호</th>
                        <th>이름</th>
                        <th>벌점</th>
                        <th>범죄종류</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "select pr_number,pr_type,p_number,p_name,p_penalty,p_crime from prison_room join prisoner where PR_number = '".$_POST['PR_number']."' and PRISON_ROOM_PR_number = '".$_POST['PR_number']."';";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['pr_number'].'</td><td>'.$row['pr_type'].'</td><td>'. $row['p_number'].'</td><td>'. $row['p_name'].'</td><td>'. $row['p_penalty'].'</td><td>'.$row['p_crime'];
                        }
                    ?>
                </tbody>
            </table> <br><br>
            
            
            
            
            
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
                        $sql2 = "select sum(P_penalty),sum(p_crime = '살인'),sum(p_crime = '성범죄'),sum(p_crime = '마약'), count(PR_number) from prison_room join prisoner where pr_number = '".$_POST['PR_number']."' and prison_room_pr_number = '".$_POST['PR_number']."';";
                        $result  = mysqli_query($conn, $sql2);
                        while($row2 = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row2['sum(P_penalty)'].'</td><td>'.$row2["sum(p_crime = '살인')"].'</td><td>'. $row2["sum(p_crime = '성범죄')"].'</td><td>'. $row2["sum(p_crime = '마약')"].'</td><td>'. $row2['count(PR_number)'];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            </form>
            <br>
            <button type="button" class="btn btn-primary active" id="btn" 
                onclick="document.location.href='../prisoner_search/input.php'">죄수 추가</button>
            <button type="button" class="btn btn-primary active" id="btn" 
                onclick="document.location.href='../prisoner_search/죄수삭제1.php'">죄수 삭제</button>
            <button type="button" class="btn btn-primary active" id="btn" 
                onclick="document.location.href='prchange.php'">죄수 방 정보 변경</button>
        
        </div>
    </body>
        
       