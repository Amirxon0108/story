<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../login-form.php");
    exit;
}
$user_id = $_SESSION['user_id'] ?? 0;
$username = $_SESSION['user_name'] ?? 'Foydalanuvchi';
$email = $_SESSION['email'] ?? 'email@example.com';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #333;
}

/* Profil konteyneri */
.profile-container {
  background: #fff;
  padding: 45px 55px;
  border-radius: 20px;
  box-shadow: 0 12px 40px rgba(0,0,0,0.2);
  width: 100%;
  max-width: 480px;
  text-align: center;
  transition: 0.4s ease;
}

.profile-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 18px 45px rgba(0,0,0,0.25);
}

/* Avatar */
.profile-avatar {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  background: linear-gradient(135deg, #ff0080 0%, #ff8c00 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 25px;
  font-size: 3rem;
  color: #fff;
  font-weight: 700;
  text-transform: uppercase;
  box-shadow: 0 8px 20px rgba(255, 0, 128, 0.4);
}

/* Sarlavha */
h1 {
  font-weight: 700;
  color: #222;
  margin-bottom: 15px;
  font-size: 2rem;
}

/* Profil ma’lumotlari */
.profile-info {
  background: #f5f7ff;
  padding: 25px;
  border-radius: 12px;
  margin: 25px 0;
  text-align: left;
  box-shadow: inset 0 0 10px rgba(37, 117, 252, 0.1);
}

.info-row {
  display: flex;
  justify-content: space-between;
  padding: 12px 0;
  border-bottom: 1px solid #e0e0e0;
}
.info-row:last-child {
  border-bottom: none;
}
.info-label {
  font-weight: 600;
  color: #444;
}
.info-value {
  color: #111;
  font-weight: 500;
}

/* Tugmalar */
.action-btns {
  display: flex;
  justify-content: space-between;
  gap: 12px;
  flex-wrap: wrap;
}

.action-btn {
  flex: 1;
  min-width: 47%;
  text-decoration: none;
  padding: 12px 15px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 1rem;
  color: #fff;
  box-shadow: 0 5px 15px rgba(0,0,0,0.15);
  transition: 0.3s;
}

.action-btn.avatar {
  background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
}
.action-btn.avatar:hover {
  background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
  transform: translateY(-3px);
}

.action-btn.password {
  background: linear-gradient(135deg, #ff8c00 0%, #ffcc00 100%);
  color: #222;
}
.action-btn.password:hover {
  background: linear-gradient(135deg, #ffcc00 0%, #ff8c00 100%);
  transform: translateY(-3px);
}

/* Logout tugmasi */
.logout-btn {
  display: block;
  margin-top: 25px;
  background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
  color: #fff;
  font-weight: 600;
  padding: 12px;
  border-radius: 12px;
  border: none;
  text-decoration: none;
  transition: 0.3s;
  box-shadow: 0 6px 18px rgba(255,65,108,0.4);
}
.logout-btn:hover {
  background: linear-gradient(135deg, #ff4b2b 0%, #ff416c 100%);
  transform: translateY(-3px);
}

@media (max-width: 480px) {
  .profile-container {
    padding: 35px 25px;
  }
  .action-btn {
    width: 100%;
  }
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
      <span class="info-value"><?= htmlspecialchars($email) ?></span>
    </div>
  </div>

  <div class="action-btns">
    <a href="profile/change_image.php" class="action-btn avatar" <?= $user_id?>>Profil rasmini yangilash</a>
    <a href="profile/change_password.php" class="action-btn password">Parolni almashtirish</a>
  </div>

  <a href="logout.php" class="logout-btn">Chiqish</a>
</div>

</body>
</html>
