<?php
    include "../connection.php";
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>교도관 조회</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <br>
    </head>
    <body>
        <div>
            <h3><p>교도관 조회 페이지</p></h3>
        
            <table>
                <thead>
                    <tr>
                        <th>교도관 id</th>
                        <th>교도관 이름</th>
                        <th>교도관 계급</th>
                        <th>담당 사동</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "select po_id,po_name,po_rank,prison_building_pb_id from prison_officer where po_name = '".$_POST['po_name']."';";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['po_id'].'</td><td>' .$row['po_name'].'</td><td>'.$row['po_rank'].'</td><td>'. $row['prison_building_pb_id'];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>    
          
            </table>
        </div>
    </body>
</html>