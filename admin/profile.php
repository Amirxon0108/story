<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../login-form.php");
    exit;
}

$username = $_SESSION['user_name'] ?? 'Foydalanuvchi';
$email = $_SESSION['email'] ?? 'email@example.com';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil</title>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
* { box-sizing: border-box; }
body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
    margin: 0; padding: 0;
    min-height: 100vh;
    display: flex; justify-content: center; align-items: center;
}
.profile-container {
    background: #fff0f5;
    padding: 40px 50px;
    border-radius: 16px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    width: 100%; max-width: 500px;
    text-align: center;
}
.profile-avatar {
    width: 120px; height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ff6ec7 0%, #6a11cb 100%);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 25px; font-size: 3rem; color: #fff; font-weight: 700; text-transform: uppercase;
}
h1 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700; color: #222;
    margin-bottom: 15px; font-size: 2rem;
}
.profile-info {
    background: #ffe4f0; padding: 25px;
    border-radius: 12px; margin: 25px 0;
    text-align: left;
}
.info-row {
    display: flex; justify-content: space-between;
    padding: 12px 0; border-bottom: 1px solid #e0c0de;
}
.info-row:last-child { border-bottom: none; }
.info-label { font-weight: 600; color: #555; }
.info-value { color: #111; font-weight: 500; }

.action-btns {
    display: flex; justify-content: space-around; margin-top: 25px; gap: 15px;
    flex-wrap: wrap;
}
.action-btn {
    padding: 12px 20px;
    font-size: 1rem; font-weight: 600;
    border-radius: 12px; text-decoration: none;
    display: inline-block; transition: all 0.3s ease;
    color: #fff; width: 48%; text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.12);
}
.action-btn.avatar { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); }
.action-btn.avatar:hover { background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%); transform: translateY(-3px); }

.action-btn.password { background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%); color:#111; }
.action-btn.password:hover { background: linear-gradient(135deg, #ffd200 0%, #f7971e 100%); transform: translateY(-3px); }

.logout-btn {
    padding: 12px 20px; font-size: 1rem; font-weight: 600;
    background: #d90429; border: none; border-radius: 12px;
    color: #fff; cursor: pointer; transition: all 0.3s ease;
    text-decoration: none; display: inline-block; margin-top: 20px; width: 100%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}
.logout-btn:hover { background: #a6031f; transform: translateY(-3px); }

@media (max-width: 480px) {
    .profile-container { padding: 30px 25px; }
    .action-btn { width: 100%; }
}
</style>
</head>
<body>

<div class="profile-container">
    <div class="profile-avatar">
        <?= strtoupper(substr($username, 0, 1)) ?>
    </div>
    
    <h1>Profil</h1>
    
    <div class="profile-info">
        <div class="info-row">
            <span class="info-label">Username:</span>
            <span class="info-value"><?= htmlspecialchars($username) ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value"><?= htmlspecialchars($email ) ?></span>
        </div>
    </div>

    <div class="action-btns">
        <a href="profile/change_image.php" class="action-btn avatar">Profil rasmini yangilash</a>
        <a href="profile/change_password.php" class="action-btn password">Parolni almashtirish</a>
    </div>

    <a href="logout.php" class="logout-btn">Chiqish</a>
</div>

</body>
</html>
