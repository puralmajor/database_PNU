<?php
    ini_set('error_reporting','E_ALL ^ E_NOTICE');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>DB-PHP 연동 예제</title>
        <p>데이터베이스 웹 어플리케이션 예제</p>
        <br>
    </head>
    <body>
        <div>
            <h3><p>SELECT 예제</p></h3>
            <h4><p>account 테이블 조회</p></h4>
            <table>
                <thead>
                    <tr>
                        <th>a_no</th>
                        <th>a_term</th>
                        <th>a_dropdate</th>
                        <th>a_name</th>
                        <th>a_b_code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = new mysqli('localhost', 'test_user', '1234', 'testdb');
                        $sql = "select * from account";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr><td>' .$row['a_no'].'</td><td>'.$row['a_term'].'</td><td>'. $row['a_dropdate'].
                            '</td><td>'. $row['a_name'].'</td><td>'.$row['a_b_code'];
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>


        <div>
            <h3><p>SELECT 예제 2</p></h3>
            <form method = "POST" action="example.php">
                고객이름의 일부를 입력하세요: <input type="text" name = "searchname"/>
                <input type="submit" value="검색"/>
                <?php
                    $conn = new mysqli('localhost', 'test_user', '1234', 'testdb');
                    $sql = "select * from customer where c_name like '%".$_POST['searchname']."%';";
                    $result = mysqli_query($conn, $sql);
                    echo "<table>
                            <thead>
                                <tr>
                                <th>c_no</th>
                                <th>c_name</th>
                                <th>c_addr</th>
                                <th>c_phone</th>
                                <th>c_dist</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['c_no']."</td><td>".$row['c_name']."</td><td>".$row['c_addr']."</td><td>".$row['c_phone']."</td><td>".$row['c_dist'];
                    }
                    echo "  </tbody>
                        </table>";
                    mysqli_close($conn);
                ?>           
            </form>
        </div>


        <div>
            <h3><p>branch 테이블 조회</p></h3>
            <form method="post" action = "example.php">
                <input type="submit" value="조회"/>
                <?php
                    $conn = new mysqli('localhost', 'test_user', '1234', 'testdb');
                    $sql = "select * from branch;";
                    $result = mysqli_query($conn, $sql);
                    echo "<table>
                            <thead>
                                <tr>
                                <th>b_no</th>
                                <th>b_name</th>
                                <th>b_addr</th>
                                <th>b_phone</th>
                                <th>b_assets</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['b_no']."</td><td>".$row['b_name']."</td><td>".$row['b_addr']."</td><td>".$row['b_phone']."</td><td>".$row['b_assets'];
                    }
                    echo "  </tbody>
                        </table>";
                    mysqli_close($conn);
                ?>
            </form>
        </div>


        <div>
            <h3><p>INSERT 예제</p></h3>
            <h4><p>branch 테이블 삽입</p></h4>
            <form method="post" action = "example.php">
                b_code: <input type="text" name = "b_code" size = "20"/><br/>
                b_name: <input type="text" name = "b_name" size = "20"/><br/>
                b_addr: <input type="text" name = "b_addr" size = "20"/><br/>
                b_phone: <input type="text" name = "b_phone" size = "20"/><br/>
                b_assets: <input type="text" name = "b_assets" size = "20"/><br/>
                <input type="submit" value="삽입"/>
                <?php
                    $conn = new mysqli('localhost', 'test_user', '1234', 'testdb');
                    $sql = "insert into branch values('".$_POST['b_code']."','".$_POST['b_name']."','".$_POST['b_addr']."','".$_POST['b_phone']."','".$_POST['b_assets']."');";
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                ?>
            </form>
        </div>


        <div>
            <h3><p>UPDATE 예제</p></h3>
            <h4><p>branch 테이블 갱신</p></h4>
            <form method="post" action = "example.php">
                지점이름: <input type="text" name = "u_b_name" size = "20"/><br/>
                전화번호: <input type="text" name = "u_b_phone" size = "20"/><br/>
                <input type="submit" value="갱신"/>
                <?php
                    $conn = new mysqli('localhost', 'test_user', '1234', 'testdb');
                    $sql = "update branch set b_phone = '".$_POST['u_b_phone']."' where b_name = '".$_POST['u_b_name']."';";
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                ?>
            </form>
        </div>

        
        <div>
            <h3><p>DELETE 예제</p></h3>
            <h4><p>branch 테이블 삭제</p></h4>
            <form method="post" action = "example.php">
                삭제할 지점 이름: <input type="text" name = "d_b_name" size = "20"/><br/>
                <input type="submit" value="삭제"/>
                <?php
                    $conn = new mysqli('localhost', 'test_user', '1234', 'testdb');
                    $sql = "delete from branch where b_name = '".$_POST['d_b_name']."';";
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                ?>
            </form>
        </div>
    </body>
</html>