<?php
$conn = mysqli_connect('localhost', 'ysj','1234','dogeprison');
$hashedPassword = password_hash($_POST['PO_password'], PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "INSERT INTO prison_officer(PO_id, PO_name, PO_password) VALUES('{$_POST['PO_id']}','{$_POST['PO_name']}','{$hashedPassword}', NOW())";
echo $sql;
$result = mysqli_query($conn, $sql);

if($result === false) {
    echo "등록에 문제가 발생하였습니다. 관리자에게 문의하세요.";
    echo mysqli_error($conn);
} else {
    ?>
        <script>
            alter("등록이 완료되었습니다.");
            location.href = "index.php";
        </script>
<?php
}
?>