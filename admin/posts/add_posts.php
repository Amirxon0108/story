<?php
require '../../sory/users.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'] ?? '';
     $maqola = $_POST['n_type'] ?? '';
    $content = $_POST['content'] ?? '';
    $author_name = $_POST['author_name'] ?? '';
    $r_time = $_POST['r_time'] ?? '';
    $imageName = '';
    $user_img = '';

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

    
    if (isset($_FILES['user_img']) && $_FILES['user_img']['error'] === 0) {
        $originalName2 = basename($_FILES["user_img"]["name"]);
        $safeName2 = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $originalName2);
        $user_img = time() . '_user_' . $safeName2;

        $targetFilePath2 = $targetDir . $user_img;
        $fileType2 = strtolower(pathinfo($targetFilePath2, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileType2, $allowedTypes)) {
            move_uploaded_file($_FILES["user_img"]["tmp_name"], $targetFilePath2);
        } else {
            echo "Foydalanuvchi rasmi uchun faqat JPG, JPEG, PNG, GIF yoki WEBP yuklanadi.<br>";
            exit;
        }
    }
 
   
    $stmt = $conn->prepare("INSERT INTO posts (title, content, image, user_img, author_name, r_time, n_type) VALUES (?,?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $content, $seve_name, $user_img, $author_name, $r_time,$maqola);

    if ($stmt->execute()) {
        header("Location: ../../sory/index.php");
        exit();
    } else {
        echo "Bazaga yozishda xatolik: " . $stmt->error;
    }
}
?>
