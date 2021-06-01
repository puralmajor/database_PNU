<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>사동 및 방 정보 페이지</title>
        <br>
    </head>
    <body>
        <div>
            <h3><p>사동 및 방 정보 페이지</p></h3>
        
            <table>
                <thead>
                    <tr>
                        <th>PR_number</th>
                        <th>PR_type</th>
                        <th>p_number</th>
                        <th>p_name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'Doge', 'rudtlr2909.', 'dogeprison');
                        $sql = "select pr_number, pr_type, p_number, p_name from prison_room join prisoner where pr_number = '".$_POST['PR_number']."' and prison_room_pr_number like  '".$_POST['PR_number']."';";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['pr_number'].'</td><td>'.$row['pr_type'].'</td><td>'. $row['p_number'].'</td><td>'. $row['p_name'];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            
        </div>