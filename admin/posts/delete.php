<?php
session_start();
include("../../sory/users.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $post_id=$_POST["post_id"];
    $imgname="SELECT image FROM posts WHERE id='$post_id'";
    $img=$conn->query($imgname)->fetch_assoc();
    $name=$img["image"];
    $path="../../uploads/".$name;
    unlink($path);
    $sql="DELETE FROM posts WHERE id='$post_id'";
    
    if($conn->query($sql)==TRUE){
        $_SESSION["delete"]=="Malumotlar o'chirildi";
        header("Location:../tables.php");
        exit;
    }

}


?>