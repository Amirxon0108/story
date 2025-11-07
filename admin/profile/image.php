<?php 
require('../../sory/users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["user_id"];
    $author_name = $_POST['name'] ?? '';
    $imageName = '';

    $targetDir = "../../uploads/";

    // Fayl yuborilganini tekshirish
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $originalName = basename($_FILES["image"]["name"]);
        $fileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileType, $allowedTypes)) {
            // Fayl nomini noyob qilish
            $imageName = microtime(true) . "." . $fileType;
            $path = $targetDir . $imageName;

            // Faylni uploads papkaga saqlash
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                // Fayl muvaffaqiyatli saqlandi
            } else {
                echo "Faylni yuklashda xatolik yuz berdi.";
                exit;
            }
        } else {
            echo "Post rasmi uchun faqat JPG, JPEG, PNG, GIF yoki WEBP yuklanadi.<br>";
            exit;
        }            
    }

    // Bazaga yangilash
    $stmt = $conn->prepare("UPDATE users SET imageP = ? WHERE id = ?");
    $stmt->bind_param('si', $imageName, $id);

    if ($stmt->execute()) {
        header('Location: ../profile.php');
        exit;
    } else {
        echo "Bazaga qo'shilmadi: " . $stmt->error;
    }
}
?>
