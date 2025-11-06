<?php 
require('../../sory/users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $imageName = '';
     $author_name = $_POST['name'] ?? '';

      $targetDir = "../../uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); 
    }

    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $originalName = basename($_FILES["image"]["name"]);
        $imageName =  microtime();

       
        $fileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $seve_name=$imageName.".". $fileType;;
        $path="../../uploads/".$seve_name;
        if (in_array($fileType, $allowedTypes)) {
            move_uploaded_file($_FILES["image"]["tmp_name"],  $path);
        } else {
            echo "Post rasmi uchun faqat JPG, JPEG, PNG, GIF yoki WEBP yuklanadi.<br>";
            exit;
        }
    }

}

