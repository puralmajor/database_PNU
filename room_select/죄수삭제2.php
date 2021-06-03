<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>죄수  금월 출소자 페이지</title>
        <br>
    </head>
    <body>
        <div>
            <h3><p>죄수 금월 출소자 페이지</p></h3>
            
            <table>
                <thead>
                    <tr>
                        <th>죄수 번호</th>
                        <th>죄수 이름</th>
                        <th>죄수 죄질</th>
                        <th>죄수 입소일</th>
                        <th>죄수 출소일</th>
                        <th>죄수 형벌</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'root', 'wlsals!12', 'dogeprison');
                        $sql = "select p_number,p_name,p_crime,p_admission_date,p_release_date,p_sentence from prisoner where p_release_date = '".$_POST['p_release_date']."';";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['p_number'].'</td><td>' .$row['p_name'].'</td><td>'.$row['p_crime'].'</td><td>'. $row['p_admission_date'].'</td><td>'. $row['p_release_date'].'</td><td>'. $row['p_sentence'];
                        }
                        mysqli_close($conn);
                       
                    ?>
                </tbody>    
          
            </table>
        </div>

                

            <h4><p>해당날짜 죄수정보 삭제</p></h4>
            <form method="post" action = "pdelete3.php">
                전체 삭제를 희망하시면 금월을 다시 한번 입력 해주세요: <input type="text" name = "p_release_date" size = "20"/><br/>
                <input type="submit" value="삭제 확인"/>
                
            </form>
        


    </body>
</html>
