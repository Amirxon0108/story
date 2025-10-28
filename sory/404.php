

<?php
// profile.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // login sahifangiz nomiga moslang
    exit;
}

// DB ga ulanish — o'zingizning config faylingizga moslang
$host = 'localhost';
$db   = 'your_db_name';
$user = 'your_db_user';
$pass = 'your_db_pass';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    echo "DB ulanmadi: " . htmlspecialchars($e->getMessage());
    exit;
}

// CSRF token (oddiy)
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// POST bilan yangilash
$update_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF tekshirish
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $update_message = 'Noto‘g‘ri so‘rov (CSRF).';
    } else {
        $new_username = trim($_POST['username'] ?? '');
        $new_email = trim($_POST['email'] ?? '');

        // Oddiy validatsiya
        if ($new_username === '' || !filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $update_message = 'Iltimos to‘g‘ri username va email kiriting.';
        } else {
            // unique constraints tekshirish va yangilash
            $userId = (int) $_SESSION['user_id'];

            // Tekshirish: boshqa user shu username yoki emailni ishlatmayaptimi?
            $stmt = $pdo->prepare("SELECT id FROM users WHERE (username = :username OR email = :email) AND id != :id");
            $stmt->execute([':username' => $new_username, ':email' => $new_email, ':id' => $userId]);
            $conflict = $stmt->fetch();

            if ($conflict) {
                $update_message = 'Bu username yoki email boshqa foydalanuvchi tomonidan ishlatilmoqda.';
            } else {
                $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
                $stmt->execute([':username' => $new_username, ':email' => $new_email, ':id' => $userId]);
                $update_message = 'Profil yangilandi.';
                // yangi ma'lumotlarni olish uchun davomida qatorni qaytaramiz
            }
        }
    }
}

// Foydalanuvchi ma'lumotini olish
$stmt = $pdo->prepare("SELECT id, username, email, created_at FROM users WHERE id = :id LIMIT 1");
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    // foydalanuvchi topilmasa
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="uz">
<head>
  <meta charset="utf-8">
  <title>Profil - <?=htmlspecialchars($user['username'])?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; max-width:800px;margin:30px auto;padding:0 16px;color:#111; }
    .card { border:1px solid #e6e6e6; padding:20px; border-radius:8px; box-shadow: 0 6px 18px rgba(0,0,0,0.03); }
    h1 { margin:0 0 8px 0; font-size:1.6rem; }
    label { display:block; margin-top:12px; font-weight:600; }
    input[type="text"], input[type="email"] { width:100%; padding:8px 10px; border:1px solid #ddd; border-radius:6px; margin-top:6px; }
    .btn { display:inline-block; margin-top:14px; padding:8px 14px; border-radius:8px; border:0; cursor:pointer; }
    .btn-primary { background:#2563eb; color:white; }
    .btn-ghost { background:transparent; border:1px solid #ddd; }
    .meta { color:#666; font-size:0.9rem; margin-top:6px; }
    .message { margin-top:12px; padding:10px; border-radius:6px; background:#f3f4f6; }
    .row { display:flex; gap:12px; margin-top:12px; }
  </style>
</head>
<body>
  <div class="card">
    <h1>Profil</h1>
    <div class="meta">Ro‘yxatdan o‘tgan: <?=htmlspecialchars($user['created_at'])?></div>

    <h3 style="margin-top:18px;">Ma'lumotlar</h3>
    <p><strong>Username:</strong> <?=htmlspecialchars($user['username'])?></p>
    <p><strong>Email:</strong> <?=htmlspecialchars($user['email'])?></p>

    <h3 style="margin-top:18px;">Profilni o'zgartirish</h3>
    <?php if ($update_message): ?>
      <div class="message"><?=htmlspecialchars($update_message)?></div>
    <?php endif; ?>

    <form method="post" action="">
      <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_SESSION['csrf_token'])?>">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" value="<?=htmlspecialchars($user['username'])?>">

      <label for="email">Email</label>
      <input id="email" name="email" type="email" value="<?=htmlspecialchars($user['email'])?>">

      <div class="row">
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a class="btn btn-ghost" href="logout.php">Chiqish</a>
      </div>
    </form>
  </div>
</body>
</html>



<?php
require 'header.php'
?>


  <main class="main">

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="text-center">
          <div class="error-icon mb-4" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi bi-exclamation-circle"></i>
          </div>

          <h1 class="error-code mb-4" data-aos="fade-up" data-aos-delay="300">404</h1>

          <h2 class="error-title mb-3" data-aos="fade-up" data-aos-delay="400">Oops! Page Not Found</h2>

          <p class="error-text mb-4" data-aos="fade-up" data-aos-delay="500">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
          </p>

          <div class="search-box mb-4" data-aos="fade-up" data-aos-delay="600">
            <form action="#" class="search-form">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for pages..." aria-label="Search">
                <button class="btn search-btn" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>

          <div class="error-action" data-aos="fade-up" data-aos-delay="700">
            <a href="/" class="btn btn-primary">Back to Home</a>
          </div>
        </div>

      </div>

    </section><!-- /Error 404 Section -->

  </main>

   <?php
require 'footer.php'
  ?>