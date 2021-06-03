<?php

$conn = mysqli_connect("localhost", "ysj", "1234", "dogeprison");

if(!$conn) {
    echo "Connection failed!";
}