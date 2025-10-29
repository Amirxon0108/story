<?php
session_start();
require('../../sory/users.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $id = $_POST['id'] ?? '';
  

    $stmt = $conn->prepare("SELECT * FROM contact WHERE id =$id ");
  
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->view==0){
        
    $request="UPDATE contact SET view=1 WHERE id=$id";
        if( $conn->query($request)==TRUE){

        }
    }


    
    $conn->close();
}