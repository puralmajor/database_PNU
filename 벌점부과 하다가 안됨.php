<?php
    session_start();
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
    include "connection.php";
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
        <title>죄수 벌점 갱신</title>
        <br>
    </head>
    <body align = center>
        <div>
            <h3><p>죄수 벌점 갱신</p></h3>
            <h4><p>선택한 죄수 벌점</p></h4>
            <table align = center>
                <thead>
                    <tr>
                        <th>죄수번호</th>
                        <th>죄수 벌점</th>
                    </tr>
                </thead>
             </table>

             <?php
                    if(isset($_POST['p_number'])){
                        function validate($data){
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                    }

                $p_number = validate($p_number);
                $sql = " select P_number, P_penalty from prisoner where p_number = '$p_number' ";
                # 쿼리 실행
                $result = mysqli_query($connection, $sql);
                # 쿼리 결과 출력
                /* while($row = mysqli_fetch_assoc($result)){
                    $p_penalty = $row['p_penalty'];
                    $number = $row['prisoner_p_number'];
                    if($row['p_penalty'] === $p_penalty && $row['prisoner_p_penalty'] === $number)
                    {
                        echo $p_penalty, $number;
                    } 
                
                }*/
                mysqli_close($connection);
            ?>



        </div>
    </tbody>
</html>
