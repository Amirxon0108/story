<?php
session_start();
require('../../sory/users.php');
   
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login-form.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$old = $_POST['password'] ?? '';
$new = $_POST['newpassword'] ?? '';
$confirm = $_POST['confirmnewpassword'] ?? '';

// Xatolikni tekshirish
if (empty($old) || empty($new) || empty($confirm)) {
    header("Location: change_password.php?msg=Maydonlar to‘liq emas&type=error");
    exit;
}

if ($new !== $confirm) {
    header("Location: change_password.php?msg=Parollar mos emas&type=error");
    exit;
}

// Eski parol to‘g‘riligini tekshirish
$stmt = $conn->prepare("SELECT parol FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: change_password.php?msg=Foydalanuvchi topilmadi&type=error");
    exit;
}

$row = $result->fetch_assoc();

// Parolni tekshirish
if (!password_verify($old, $row['password'])) {
    header("Location: change_password.php?msg=Joriy parol noto‘g‘ri&type=error");
    exit;
}

// Yangi parolni xeshlash va bazaga yozish
$new_hash = password_hash($new, PASSWORD_DEFAULT);
$update = $conn->prepare("UPDATE users SET parol=? WHERE id=?");
$update->bind_param("si", $new_hash, $user_id);

if ($update->execute()) {
    header("Location: change_password.php?msg=Parol muvaffaqiyatli yangilandi&type=success");
    exit;
} else {
    header("Location: change_password.php?msg=Xatolik yuz berdi&type=error");
    exit;
}
