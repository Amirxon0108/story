<?php
require('../../sory/users.php');


$title=$_POST['title'] ?? '';
$id=$_POST["id"];
$author_name = $_POST['author_name'] ?? '' ;
$n_type = $_POST['n_type'] ?? '' ;

$sql = "UPDATE posts SET title = '$title' , author_name ='$author_name' , n_type = '$n_type' WHERE id='$id' ";
$respons = $conn->query($sql);


header('Location: ../tables.php');
$conn-close();
