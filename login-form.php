<?php
session_start();
?>
<!doctype html>
<html lang="uz">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login / Register — Elegant Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
    :root{
      --accent: #5b8cff;
      --accent-hover: #4a7ae8;
      --muted: #6b7280;
      --card-bg: #ffffff;
      --body-bg: linear-gradient(180deg,#fbfdff 0%, #f0f4ff 100%);
      --radius: 16px;
      --shadow-sm: 0 2px 8px rgba(15,23,42,0.04);
      --shadow-md: 0 8px 24px rgba(15,23,42,0.08);
      --shadow-lg: 0 16px 40px rgba(15,23,42,0.12);
      font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }

    *{box-sizing:border-box;margin:0;padding:0}
    html,body{height:100%}
    body{
      background: var(--body-bg);
      display:flex;
      align-items:center;
      justify-content:center;
      padding:32px;
      color:#111827;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.8; }
    }

    @keyframes slideIn {
      from { transform: translateX(-10px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }

    .wrap{
      width:100%;
      max-width:1000px;
      display:grid;
      grid-template-columns: 1fr 440px;
      gap:32px;
      align-items:center;
      animation: fadeInUp 0.6s ease-out;
    }

    .brand-panel{
      padding:48px;
      border-radius:var(--radius);
      background: linear-gradient(135deg, rgba(91,140,255,0.1), rgba(125,224,255,0.05));
      box-shadow: var(--shadow-lg);
      min-height:420px;
      display:flex;
      flex-direction:column;
      justify-content:center;
      gap:24px;
      position:relative;
      overflow:hidden;
      transition: transform 0.3s ease;
    }

    .brand-panel::before{
      content:'';
      position:absolute;
      top:-50%;
      right:-50%;
      width:200%;
      height:200%;
      background: radial-gradient(circle, rgba(91,140,255,0.08) 0%, transparent 70%);
      animation: pulse 4s ease-in-out infinite;
    }

    .brand-panel:hover{
      transform: translateY(-4px);
    }

    .logo{
      display:flex;
      gap:14px;
      align-items:center;
      position:relative;
      z-index:1;
      animation: slideIn 0.5s ease-out;
    }

    .logo .mark{
      width:64px;
      height:64px;
      border-radius:16px;
      display:grid;
      place-items:center;
      background:linear-gradient(135deg,var(--accent),#7de0ff);
      color:white;
      font-weight:700;
      font-size:24px;
      box-shadow:0 8px 24px rgba(91,140,255,0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .logo .mark:hover{
      transform: rotate(5deg) scale(1.05);
      box-shadow:0 12px 32px rgba(91,140,255,0.4);
    }

    h1{
      font-size:28px;
      position:relative;
      z-index:1;
      line-height:1.3;
      animation: slideIn 0.6s ease-out;
    }

    p.lead{
      color:var(--muted);
      line-height:1.6;
      position:relative;
      z-index:1;
      animation: slideIn 0.7s ease-out;
    }

    .feature-box{
      margin-top:24px;
      display:flex;
      gap:16px;
      align-items:center;
      position:relative;
      z-index:1;
      animation: slideIn 0.8s ease-out;
    }

    .feature-icon{
      width:80px;
      height:80px;
      border-radius:16px;
      background:linear-gradient(135deg, rgba(91,140,255,0.12), rgba(125,224,255,0.08));
      display:grid;
      place-items:center;
      font-size:32px;
      transition: transform 0.3s ease;
    }

    .feature-icon:hover{
      transform: scale(1.1) rotate(-5deg);
    }

    .card{
      padding:32px;
      border-radius:20px;
      background:var(--card-bg);
      box-shadow: var(--shadow-lg);
      border:1px solid rgba(15,23,42,0.05);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
      animation: fadeInUp 0.7s ease-out;
    }

    .card:hover{
      box-shadow: 0 20px 48px rgba(15,23,42,0.15);
      transform: translateY(-2px);
    }

    .tabs{
      display:flex;
      gap:8px;
      margin-bottom:24px;
      background:rgba(15,23,42,0.02);
      padding:6px;
      border-radius:14px;
    }

    .tab{
      flex:1;
      text-align:center;
      padding:12px 16px;
      border-radius:10px;
      cursor:pointer;
      font-weight:600;
      font-size:15px;
      color:var(--muted);
      background:transparent;
      border:none;
      transition: all 0.3s ease;
      position:relative;
    }

    .tab:hover:not(.active){
      background:rgba(91,140,255,0.05);
      color:#374151;
    }

    .tab.active{
      background:linear-gradient(135deg, var(--accent), #7db9ff);
      color:white;
      box-shadow: 0 4px 12px rgba(91,140,255,0.3);
      transform: translateY(-1px);
    }

    form{
      display:grid;
      gap:16px;
    }

    label{
      font-size:14px;
      font-weight:600;
      color:#374151;
      display:block;
      margin-bottom:8px;
    }

    input[type=text],input[type=email],input[type=password]{
      width:100%;
      padding:14px 16px;
      border-radius:12px;
      border:2px solid #e5e7eb;
      font-size:15px;
      transition: all 0.3s ease;
      background:white;
    }

    input[type=text]:focus,input[type=email]:focus,input[type=password]:focus{
      outline:none;
      border-color:var(--accent);
      box-shadow: 0 0 0 4px rgba(91,140,255,0.1);
      transform: translateY(-1px);
    }

    input[type=text]:hover,input[type=email]:hover,input[type=password]:hover{
      border-color:#d1d5db;
    }

    .row{display:flex;gap:14px}
    .row .col{flex:1}
    .small{font-size:13px;color:var(--muted)}

    .actions{
      display:flex;
      align-items:center;
      justify-content:space-between;
      margin-top:4px;
    }

    .btn{
      padding:13px 24px;
      border-radius:12px;
      border:none;
      font-weight:700;
      font-size:15px;
      cursor:pointer;
      transition: all 0.3s ease;
      position:relative;
      overflow:hidden;
    }

    .btn::before{
      content:'';
      position:absolute;
      top:50%;
      left:50%;
      width:0;
      height:0;
      border-radius:50%;
      background:rgba(255,255,255,0.3);
      transform:translate(-50%,-50%);
      transition:width 0.6s,height 0.6s;
    }

    .btn:hover::before{
      width:300px;
      height:300px;
    }

    .btn.primary{
      background:linear-gradient(135deg, var(--accent), #7db9ff);
      color:white;
      box-shadow:0 8px 20px rgba(91,140,255,0.25);
    }

    .btn.primary:hover{
      box-shadow:0 12px 28px rgba(91,140,255,0.35);
      transform: translateY(-2px);
    }

    .btn.primary:active{
      transform: translateY(0);
    }

    .btn.ghost{
      background:transparent;
      border:2px solid rgba(15,23,42,0.08);
      color:var(--muted);
    }

    .btn.ghost:hover{
      border-color:var(--accent);
      color:var(--accent);
      background:rgba(91,140,255,0.05);
    }

    .muted-link{
      color:var(--accent);
      text-decoration:none;
      font-size:13px;
      font-weight:600;
      transition: all 0.2s ease;
      position:relative;
    }

    .muted-link::after{
      content:'';
      position:absolute;
      bottom:-2px;
      left:0;
      width:0;
      height:2px;
      background:var(--accent);
      transition:width 0.3s ease;
    }

    .muted-link:hover::after{
      width:100%;
    }

    .muted-link:hover{
      color:var(--accent-hover);
    }

    .divider{
      height:1px;
      background:linear-gradient(90deg, transparent, rgba(15,23,42,0.1), transparent);
      margin:20px 0;
    }

    .socials{display:flex;gap:12px}
    .socials button{
      flex:1;
      padding:12px;
      border-radius:12px;
      border:2px solid rgba(15,23,42,0.08);
      cursor:pointer;
      background:white;
      font-size:18px;
      transition: all 0.3s ease;
    }

    .socials button:hover{
      border-color:var(--accent);
      background:rgba(91,140,255,0.05);
      transform: translateY(-2px);
      box-shadow: var(--shadow-sm);
    }

    .note{
      font-size:13px;
      color:var(--muted);
      text-align:center;
      font-weight:500;
    }

    .error{
      color:#ef4444;
      font-size:13px;
      margin-top:8px;
      padding:10px 14px;
      background:rgba(239,68,68,0.08);
      border-radius:8px;
      border-left:3px solid #ef4444;
      animation: slideIn 0.3s ease-out;
    }

    .success{
      color:#10b981;
      font-size:13px;
      margin-top:8px;
      padding:10px 14px;
      background:rgba(16,185,129,0.08);
      border-radius:8px;
      border-left:3px solid #10b981;
      animation: slideIn 0.3s ease-out;
    }

    .password-wrapper{
      position:relative;
    }

    .toggle-pass{
      position:absolute;
      right:12px;
      top:12px;
      border:none;
      background:transparent;
      cursor:pointer;
      font-size:20px;
      transition: transform 0.2s ease;
      z-index:1;
    }

    .toggle-pass:hover{
      transform: scale(1.2);
    }

    input[type=checkbox]{
      width:18px;
      height:18px;
      cursor:pointer;
      accent-color:var(--accent);
    }

    @media (max-width:900px){
      .wrap{
        grid-template-columns:1fr;
        max-width:520px;
      }
      .brand-panel{
        order:2;
        padding:32px;
      }
      h1{font-size:24px}
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>
<body>
  <main class="wrap">
    <section class="brand-panel">
      <div class="logo">
        <div class="mark">S</div>
        <div>
          <div style="font-weight:700;font-size:18px">Story</div>
          <div class="small" style="margin-top:4px">Sodda — zamonaviy — professional</div>
        </div>
      </div>

      <h1>Salom! Tizimga kirish yoki ro'yxatdan o'ting</h1>
      <p class="lead">Foydalanish uchun email va parolingizni kiriting. Ro'yxatdan o'tish orqali yangi hisob yaratasiz va barcha xususiyatlardan foydalana olasiz.</p>

      <div class="feature-box">
        <div style="flex:1">
          <div style="font-size:13px;color:var(--muted);margin-bottom:4px">Xavfsizlik</div>
          <div style="font-weight:700;font-size:16px">2‑bosqichli tekshirish</div>
          <div style="font-size:12px;color:var(--muted);margin-top:2px">Ma'lumotlaringiz xavfsiz</div>
        </div>
        <div class="feature-icon">
          🔒
        </div>
      </div>
    </section>

    <section class="card" aria-labelledby="auth-heading">
      <div style="display:flex;flex-direction:column">
        <div class="tabs" role="tablist">
          <button class="tab active" id="tab-login" role="tab" aria-selected="true" onclick="show('login')" type="button">Kirish</button>
          <button class="tab" id="tab-register" role="tab" aria-selected="false" onclick="show('register')" type="button">Ro'yxatdan o'tish</button>
        </div>

 <?php     
   if (!empty($_SESSION['register_success'])) {
    echo '<div class="success">' . htmlspecialchars($_SESSION['register_success']) . '</div>';
    unset($_SESSION['register_success']);
}
?>
<?php $errors = $_SESSION['login_errors'] ?? [];
unset($_SESSION['login_errors']);

if (!is_array($errors)) {
    $errors = [$errors];
}
if (!empty($errors)) {
    echo '<div class="alert alert-danger">';
    foreach ($errors as $error) {
        echo '<p>' . ($error) . '</p>';
    }
    echo '</div>';
}
?>
        <form action="login.php" method="POST" id="form-login" >
          <div>
            <label for="l-email">Email manzil</label>
            <input name="email" id="l-email" type="email" placeholder="you@example.com"  autocomplete="email" />
          </div>

          <div>
            <label for="l-pass">Parol</label>
            <div class="password-wrapper">
              <input name="parol" id="l-pass" type="password" placeholder="••••••••"  autocomplete="current-password" />
              <button type="button" class="toggle-pass" aria-label="Parolni ko'rsatish" onclick="togglePass('l-pass', this)">👁️</button>
            </div>
          </div>

          <div class="actions">
            <label style="display:flex;gap:8px;align-items:center;font-size:13px;cursor:pointer">
              <input type="checkbox" id="remember"> Eslab qol
            </label>
            <a href="#" class="muted-link" >Parolni unutdingiz?</a>
          </div>

          <div style="display:flex;gap:12px;margin-top:8px;align-items:center">
            <button class="btn primary" type="submit">Kirish</button>
            <button class="btn ghost" type="button">Ro'yxatdan o'tish</button>
          </div>

          <div id="login-msg" role="status" aria-live="polite"></div>

          <div class="divider"></div>

          <div class="note">Yoki ijtimoiy tarmoq orqali davom eting</div>
          <div class="socials" style="margin-top:12px">
            <button type="button" aria-label="Google orqali kirish" title="Google">G</button>
            <button type="button" aria-label="Facebook orqali kirish" title="Facebook">f</button>
            <button type="button" aria-label="Twitter orqali kirish" title="Twitter">𝕏</button>
          </div>
        </form>
<?php $errorr = $_SESSION['register_errors'] ?? [];
unset($_SESSION['register_errors']);

if (!empty($errorr)) {
    echo '<div class="alert alert-danger">';
    foreach ($errorr as $err) {
        echo '<p>' . ($err) . '</p>';
    }
    echo '</div>';
}

?>


  
        <form action="register.php" method="POST" id="form-register" style="display:none">
          <div>
            <?php
if (!empty($_SESSION['register_errors'])) {
    echo '<div class="error">';
    foreach ($_SESSION['register_errors'] as $msg) {
        echo '<p>' . htmlspecialchars($msg) . '</p>';
    }
    echo '</div>';
    unset($_SESSION['register_errors']);
} 
?>
            <label for="r-name">To'liq ism</label>
            <input name="username" id="r-name" type="text" placeholder="Ismingiz va familiyangiz"  autocomplete="name" />
          </div>

          <div>
            <label for="r-email">Email manzil</label>
            <input name="email" id="r-email" type="email" placeholder="you@example.com"  autocomplete="email" />
          </div>

          <div class="row">
            <div class="col">
              <label for="r-pass">Parol</label>
              <div class="password-wrapper">
                <input name="parol"  id="r-pass" type="password" placeholder="Kamida 8 ta belgi" minlength="8"  autocomplete="new-password" />
                <button type="button" class="toggle-pass" aria-label="Parolni ko'rsatish" onclick="togglePass('r-pass', this)">👁️</button>
              </div>
            </div>
            <div class="col">
              <!-- <label for="r-pass2">Parolni tasdiqlang</label>
              <div class="password-wrapper">
                <input id="r-pass2" type="password" placeholder="Parolni takrorlang" required autocomplete="new-password" />
                <button type="button" class="toggle-pass" aria-label="Parolni ko'rsatish" onclick="togglePass('r-pass2', this)">👁️</button>
              </div> -->
            </div>
          </div>

          <div style="display:flex;align-items:center;gap:8px;margin-top:4px">
            <input id="agree" type="checkbox" required />
            <label for="agree" class="small" style="cursor:pointer">
              <a href="#" class="muted-link" >Foydalanish shartlari</a>ni qabul qilaman
            </label>
          </div>

          <div style="display:flex;gap:12px;margin-top:8px;align-items:center">
            <button class="btn primary" type="submit">Ro'yxatdan o'tish</button>
            <button class="btn ghost" type="button" >Kirishga o'tish</button>
          </div>

          <div id="register-msg" role="status" aria-live="polite"></div>
        </form>
      </div>
    </section>
  </main>

  <script>
    function show(kind){
      const loginForm = document.getElementById('form-login');
      const registerForm = document.getElementById('form-register');
      const loginTab = document.getElementById('tab-login');
      const registerTab = document.getElementById('tab-register');

      loginForm.style.display = kind === 'login' ? '' : 'none';
      registerForm.style.display = kind === 'register' ? '' : 'none';
      
      loginTab.classList.toggle('active', kind === 'login');
      registerTab.classList.toggle('active', kind === 'register');
      
      loginTab.setAttribute('aria-selected', kind === 'login');
      registerTab.setAttribute('aria-selected', kind === 'register');

      document.getElementById('login-msg').textContent = '';
      document.getElementById('register-msg').textContent = '';
    }

    function togglePass(id, btn){
      const el = document.getElementById(id);
      if(!el) return;
      const isPassword = el.type === 'password';
      el.type = isPassword ? 'text' : 'password';
      btn.textContent = isPassword ? '🙈' : '👁️';
      btn.setAttribute('aria-label', isPassword ? 'Parolni yashirish' : 'Parolni ko\'rsatish');
    }

   

   
  </script>
</body>
</html>