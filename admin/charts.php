<?php
session_start();
require('../sory/users.php');


 
    $id =9;
  
    $message="SELECT * FROM contact WHERE id=$id";
    $m=$conn->query($message);
    $a=$m->fetch_assoc();
    if($a["view"]==0){
        $view="UPDATE contact SET view=1 WHERE id=$id";
        if($conn->query($view)==TRUE){

        }
    }


   
    


    
    $conn->close();
