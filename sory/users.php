<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'story';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($servername,$username,$password,$db_name);



if($conn->connect_error){
    die( "connected failed " . $conn->connect_error);
}


?>