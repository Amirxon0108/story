<?php 
require('../../sory/users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["user_id"];
    $author_name = $_POST['user_name'] ?? '';
    $imageName = '';

    $targetDir = "../../uploads/";

  
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $originalName = basename($_FILES["image"]["name"]);
        $fileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileType, $allowedTypes)) {
         
            $imageName = uniqid() . "." . $fileType;
            $path = $targetDir . $imageName;

        
            $query = $conn->query("SELECT imageP FROM users WHERE id = $id");
            $row = $query->fetch_assoc();
            if (!empty($row['imageP']) && file_exists($targetDir . $row['imageP'])) {
                unlink($targetDir . $row['imageP']);
            }

          
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                echo "Faylni yuklashda xatolik yuz berdi.";
                exit;
            }
        } else {
            echo "Post rasmi uchun faqat JPG, JPEG, PNG, GIF yoki WEBP yuklanadi.<br>";
            exit;
        }            
    }

   
    if ($imageName !== '') {
      
        $stmt = $conn->prepare("UPDATE users SET imageP = ?, user_name = ? WHERE id = ?");
        $stmt->bind_param('ssi', $imageName, $author_name, $id);
    } else {
        
        $stmt = $conn->prepare("UPDATE users SET user_name = ? WHERE id = ?");
        $stmt->bind_param('si', $author_name, $id);
    }

    if ($stmt->execute()) {
        header('Location: ../profile.php');
        exit;
    } else {
        echo "Bazaga qo'shilmadi: " . $stmt->error;
    }
}
?>
