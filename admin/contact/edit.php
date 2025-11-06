<?php
    
require('../../sory/users.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $id = $_POST['id'] ?? '';
  if (!is_numeric($id)) {
    echo "Invalid ID";
    exit;
}

    $stmt = $conn->prepare("SELECT * FROM contact WHERE id =? ");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $a=$result->fetch_assoc();
        $stmt->close();
      
 if($a["view"]==0){
       $update = $conn->prepare("UPDATE contact SET view = 1 WHERE id = ?");
        $update->bind_param("i", $id);
        $update->execute();
        $update->close();


        }
            $conn->close();
    }   


?>