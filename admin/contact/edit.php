<?php
session_start();
require('../../sory/users.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? '';
    $id = $_POST['id'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt = $conn->prepare("SELECT id FROM contact WHERE id = ? ");
    $stmt->bind_param('ss', $email , $id);
    $stmt->execute();
    $result = $stmt->get_result();




    
    $conn->close();
}