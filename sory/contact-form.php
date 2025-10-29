<?php
session_start();
require('users.php');

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $email =$_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $view=0;


   if(!empty($email) && !empty($message)){ 
     $stmt = $conn->prepare("INSERT INTO contact( email,message,view) VALUES (?,?,?) ");
    $stmt->bind_param("ssi" , $email,$message, $view);
   
   if( $stmt->execute()){
    $_SESSION['contact_success'] = "Habar muvaffaqiyatli qo'shildi!";
    header('Location: contact.php');
   }else{

    $_SESSION['contact_errors'] = "Xatolik yuz berdi: " . $stmt->error;
    header('Location: contact.php');
   }
    

   }
   $conn-close();
}



?>