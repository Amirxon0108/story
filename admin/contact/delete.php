<?php
session_start();
require('../../sory/users.php');
if($_SERVER['REQUEST_METHOD']== 'POST'){
$id=$_POST['id'] ?? '' ;

$stmt = $conn->prepare("DELETE FROM contact WHERE id = ?");
$stmt->bind_param('s',$id);

if($stmt->execute()==TRUE){
        $_SESSION["delete"]="Malumotlar o'chirildi";
        header("Location:../contact.php");
        exit;
    }
}

?>