<?php
session_start();
require('sory/users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['parol'] ?? '';

    $errorr = [];

    if (empty($email)) $errorr['email'] = "Email kiritilmadi.";
    if (empty($pass)) $errorr['parol'] = "Parol kiritilmadi.";
    if (empty($user_name)) $errorr['username'] = "Username kiritilmadi.";

    if (!empty($errorr)) {
        $_SESSION['register_errors'] = $errorr;
        header('Location: login-form.php#register');
        exit;
    }

    $stmt = $conn->prepare("SELECT user_name, email FROM users WHERE user_name = ? OR email = ? LIMIT 1");
    $stmt->bind_param("ss", $user_name, $email);
    $stmt->execute();   
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        header("Location: login-form.php#login");
        exit;   
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (email, parol, user_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $hashed_pass, $user_name);

    if ($stmt->execute()) {
         $_SESSION['register_success'] = 'Hisob muvaffaqiyatli yaratildi!';
        header('Location: login-form.php#login');   
    } else {
        $_SESSION['register_errors'] =   ['db' => "Bazaga yozishda xatolik: " . $conn->error];
        header('Location: login-form.php#register');
        exit;
    }

    $conn->close();
}
?>
