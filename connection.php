<?php
    $conn = new mysqli('localhost', 'ysj', '1234', 'dogeprison');
    if($conn->connenct_errno) { die('Connecting Error :'.$conn->connect_error);}
?>