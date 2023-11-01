<?php

$host = "localhost";
$user = "root";
$pass = "" ;
$db = "hersa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Gagal Terhubung".mysqli_connect_error());
}

?>