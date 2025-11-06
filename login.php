<?php
session_start();
require ('sory/users.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'] ?? '';
    $pass=$_POST['parol'] ?? '' ; 

    $errors = [];
    if(empty($email))$errors['email'] = 'email kiritilmadi';
    if(empty($pass))$errors['parol'] = 'parol kiritilmadi';

    if(!empty($errors)){
        $_SESSION['login_errors']=$errors;
        header('Location: login-form.php#login');
        exit;
    }
     $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $request = $stmt->get_result();

     
    if($request->num_rows>0){
         $user = $request->fetch_assoc();
         if(password_verify($pass, $user['parol'])){
            $_SESSION["user"]=$user;
              $_SESSION['user_id'] = $user['id']; 
           $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['email'] = $user['email'];
             $_SESSION['logged_in'] = true;
            header("Location: admin/index.php");
            exit;
            
         }
         else{
            $_SESSION["login_errors"]="Login yoki parol hato";
            header("Location:login-form.php");
            exit;
         }

    }
    else{
        $_SESSION["login_errors"] = ['not_found'=> 'bunday Email yoki parol yaratilmagan '];
        header('Location: login-form.php#login');
        exit;
    }

}

?>