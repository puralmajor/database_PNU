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
        <title>죄수 조회 페이지</title>
        <br>
    </head>
    <body align = center>
        <div>
            <h3><p>수감중인 죄수 정보 조회</p></h3>
            
            <form method = "POST" action="죄수조회.php">
                조회할 죄수번호를 입력하세요: <input type="text" name = "p_number" placeholder="죄수번호"/>
                <input type="submit" value="검색"/>
            
                <button type="button" class="btn btn-primary active" id="btn" 
	            onclick="document.location.href='벌점부여.php'">벌점 부여</button></p>

                <button type="button" class="btn btn-primary active" id="btn" 
	            onclick="document.location.href='벌점부과.php'">죄수 추가</button>
                <button type="button" class="btn btn-primary active" id="btn" 
	            onclick="document.location.href='벌점부과.php'">죄수 삭제</button>
                
                <button type="button" class="btn btn-primary active" id="btn" 
	            onclick="document.location.href='죄수 방 변경.php'">죄수 방 정보 변경</button></p>
            
                <?php
                    $conn = new mysqli('localhost', 'root', 'sms0626', 'Dogeprison');
                    $sql = "select P_number,P_name,P_crime,P_admission_date,P_release_date,P_crime_record,P_age,P_sentence,P_penalty from Prisoner where P_number like '%" .$_POST['p_number']."%' order by P_number;";
                    $result = mysqli_query($conn, $sql);
                    echo "<table border=1 align = center>
                            <thead>
                                <tr>
                                <th width = 80 align=center bgcolor=#ffeecc>죄수번호</th>
                                <th width = 80 align=center bgcolor=#ffeecc>죄수이름</th>
                                <th width = 70 align=center bgcolor=#ffeecc>죄명</th>
                                <th width = 100 align=center bgcolor=#ffeecc>입소일</th>
                                <th width = 100 align=center bgcolor=#ffeecc>출소일</th>
                                <th width = 60 align=center bgcolor=#ffeecc>전과수</th>
                                <th width = 60 align=center bgcolor=#ffeecc>나이</th>
                                <th width = 60 align=center bgcolor=#ffeecc>형량</th>
                                <th width = 60 align=center bgcolor=#ffeecc>벌점</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while($row = mysqli_fetch_assoc($result)){
                        $p_id = $row['p_number'];
                        echo '<tr><td><font color=red>' .$row['P_number'].'</td><td>'.$row['P_name'].'</td><td>'. $row['P_crime'].
                        '</td><td>'. $row['P_admission_date'].'</td><td>'.$row['P_release_date'].'<//tr><td>' .$row['P_crime_record'].
                        '<//tr><td>' .$row['P_age'].'<//tr><td>' .$row['P_sentence'].'</td><td>'.$row['P_penalty'];
                    }
                    echo $p_id;
                    echo "  </tbody>
                        </table>";
                    mysqli_close($conn);
                ?>           
            </form>
        </div>
    </body>
</html>