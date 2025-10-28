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
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 3rem;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
        }
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            font-size: 2rem;
        }
        .profile-info {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            text-align: left;
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
            color: #666;
        }
        .info-value {
            color: #333;
            font-weight: 500;
        }
        .logout-btn {
            padding: 14px 40px;
            font-size: 1rem;
            font-weight: 600;
            background: #dc3545;
            border: none;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .logout-btn:hover {
            background: #c82333;
        }
        @media (max-width: 480px) {
            .profile-container {
                padding: 30px 25px;
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
            <span class="info-value"><?= htmlspecialchars($email ) ?></span>
        </div>
    </div>
    <a href="index.php  " class="logout-btn">Orqaga</a>
    <a href="logout.php" class="logout-btn">Chiqish</a>
</div>

</body>
</html>