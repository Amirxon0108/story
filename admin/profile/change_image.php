<?php
require('../../sory/users.php');
?>
<!doctype html>
<html lang="uz">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profilni tahrirlash — HTML &amp; CSS</title>
  <style>
    :root{
      --bg:#0f1724;
      --card:#0b1220;
      --muted:#9aa4b2;
      --accent:#7c5cff;
      --accent-2:#6ad3ff;
      --white:#f8fafc;
      --glass: rgba(255,255,255,0.04);
      --success:#22c55e;
      --danger:#ef4444;
      --radius:14px;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      background: linear-gradient(180deg, #071028 0%, #061526 60%);
      color:var(--white);
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:32px;
    }

    .card{
      width:100%;
      max-width:940px;
      background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02));
      border-radius:var(--radius);
      padding:28px;
      box-shadow: 0 8px 30px rgba(2,6,23,0.7), inset 0 1px 0 rgba(255,255,255,0.02);
      display:grid;
      grid-template-columns: 320px 1fr;
      gap:24px;
      align-items:start;
    }

    /* Left column: avatar */
    .avatar-col{ display:flex; flex-direction:column; align-items:center; gap:16px; }
    .avatar-wrap{
      width:200px;
      height:200px;
      border-radius:999px;
      overflow:hidden;
      display:flex;
      align-items:center;
      justify-content:center;
      background: radial-gradient(100% 100% at 10% 10%, rgba(124,92,255,0.18), rgba(106,211,255,0.08) 60%), linear-gradient(180deg, rgba(255,255,255,0.03), rgba(0,0,0,0.08));
      border: 4px solid rgba(255,255,255,0.03);
      box-shadow: 0 6px 18px rgba(7,10,30,0.6);
      position:relative;
    }
    .avatar-placeholder{
      text-align:center;
      color:var(--accent);
      font-weight:600;
      letter-spacing:0.6px;
    }
    .avatar-placeholder .initial{
      font-size:64px;
      line-height:1;
      display:block;
      margin-bottom:6px;
    }
    .avatar-actions{
      display:flex;
      gap:8px;
      margin-top:6px;
    }

    /* Right column: form */
    .form-col{}
    h1{ margin:0 0 8px 0; font-size:20px; color:var(--white); }
    p.lead{ margin:0 0 18px 0; color:var(--muted); font-size:14px; }

    form{
      background: transparent;
    }
    .field{
      margin-bottom:14px;
    }
    label{
      display:block;
      font-size:13px;
      color:var(--muted);
      margin-bottom:8px;
    }
    input[type="text"],
    input[type="file"],
    button, .fake-file{
      width:100%;
      font-size:15px;
    }

    /* Styled text input */
    .text-input{
      display:block;
      width:100%;
      padding:12px 14px;
      border-radius:10px;
      background:var(--glass);
      border: 1px solid rgba(255,255,255,0.03);
      color:var(--white);
      outline:none;
      transition: box-shadow .18s, border-color .18s, transform .08s;
    }
    .text-input:focus{
      border-color: rgba(124,92,255,0.9);
      box-shadow: 0 6px 20px rgba(124,92,255,0.08);
      transform: translateY(-1px);
    }

    /* Custom file input look (label triggers input) */
    .filebox{
      display:flex;
      gap:10px;
      align-items:center;
    }
    /* visually hide native input but keep accessible */
    input[type="file"]{
      position:absolute;
      left:-9999px;
      width:1px; height:1px; overflow:hidden;
    }
    .fake-file{
      display:inline-flex;
      align-items:center;
      gap:10px;
      padding:10px 14px;
      border-radius:10px;
      background: linear-gradient(90deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border: 1px solid rgba(255,255,255,0.03);
      color:var(--white);
      cursor:pointer;
      transition: transform .08s, box-shadow .12s;
    }
    .fake-file:hover{ transform: translateY(-2px); box-shadow: 0 10px 30px rgba(2,6,23,0.6); }
    .fake-file .btn{
      background:linear-gradient(90deg,var(--accent),var(--accent-2));
      padding:8px 12px;
      border-radius:8px;
      color:#051223;
      font-weight:600;
      box-shadow: 0 6px 18px rgba(124,92,255,0.18);
    }
    .small{ font-size:13px; color:var(--muted); margin-top:6px; }

    /* buttons */
    .row{ display:flex; gap:12px; margin-top:18px; align-items:center; }
    .btn-primary{
      padding:11px 16px;
      border-radius:10px;
      border:none;
      cursor:pointer;
      background: linear-gradient(90deg,var(--accent),var(--accent-2));
      color:#031226;
      font-weight:700;
      box-shadow: 0 10px 30px rgba(122,85,255,0.18);
    }
    .btn-ghost{
      padding:10px 14px;
      border-radius:10px;
      background: transparent;
      border:1px solid rgba(255,255,255,0.04);
      color:var(--white);
      cursor:pointer;
    }

    /* small meta text */
    .meta{
      margin-top:12px;
      font-size:13px;
      color:var(--muted);
    }

    /* responsive */
    @media (max-width:880px){
      .card{ grid-template-columns: 1fr; padding:18px; gap:18px; }
      .avatar-wrap{ width:160px; height:160px; }
    }

    /* Decorative footer note */
    .note{ margin-top:18px; font-size:13px; color:var(--muted) }
    /* accessibility focus */
    .fake-file:focus{ outline:3px solid rgba(124,92,255,0.14) }
  </style>
</head>
<body>
  <div class="card" role="region" aria-label="Profil tahrirlash">
    <!-- Left: Avatar preview & actions -->
    <div class="avatar-col" aria-hidden="false">
      <div class="avatar-wrap" id="avatarPreview" aria-hidden="true">
        <!-- Without JS we cannot show selected image live.
             This placeholder shows user's initial (manual edit). -->
        <div class="avatar-placeholder" role="img" aria-label="Profil avatar">
          <span class="initial">A</span>
          <span class="muted">Oldindan ko‘rish</span>
        </div>
      </div>

      <div style="text-align:center">
        <div style="font-weight:700; font-size:18px">Ism Familiya</div>
        <div style="color:var(--muted); font-size:13px; margin-top:6px">Profil rasmini va ismingizni tahrirlash</div>
      </div>

      <div class="avatar-actions" aria-hidden="true">
        <label for="avatarFile" class="fake-file" tabindex="0">
          <span class="btn">Tanlash</span>
          <span style="opacity:.9">Rasm yuklash</span>
        </label>
        <button class="btn-ghost" type="button" title="Rasmni o'chirish">O'chirish</button>
      </div>

      <div class="small">JPG yoki PNG. Minimal tavsiya: 200×200 px. Brauzerda avtomatik o‘lchash uchun JavaScript kerak bo‘ladi.</div>
    </div>

    <!-- Right: Form -->
    <div class="form-col">
      <h1>Profilni tahrirlash</h1>

      <form action="#" method="post" novalidate>
        <div class="field">
          <label for="name">Ismingiz</label>
          <input id="name" name="name" type="text" class="text-input" placeholder="Ismingizni kiriting " value="" required />
          <div class="small">Ismingiz 2 dan 50 gacha belgidan iborat bo‘lsin.</div>
        </div>

        <div class="field">
          <label for="avatarFile">Profil rasmini yuklang</label>

          <!-- Hidden native file input (kept accessible) -->
          <input id="avatarFile" name="image" type="file" accept="image/*" />

          <!-- Visible fake file control (label linked to input) -->
          <div class="filebox" aria-hidden="false">
            <label for="avatarFile" class="fake-file" tabindex="0">
              <span style="display:inline-block">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="vertical-align:middle; margin-right:8px">
                  <path d="M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" stroke="white" stroke-opacity="0.9" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M21 21H3" stroke="white" stroke-opacity="0.9" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
              <span>Faylni tanlang</span>
              <span style="margin-left:auto; font-size:13px; opacity:.9">Hech narsa tanlanmagan</span>
            </label>
          </div>
          <div class="small">Siz tanlagan faylni serverga jo‘natish yoki darhol ko‘rsatish uchun JavaScript qo‘shish kerak.</div>
        </div>

        <div class="row">
          <button type="submit" class="btn-primary">Saqlash</button>
          <button type="button" class="btn-ghost">Bekor qilish</button>
        </div>

        <div class="meta">Eslatma: Bu sahifa faqat frontend — server taraf va live preview yo‘q. Agar xohlasangiz, men unga JavaScript qo‘shib, faylni darhol oldindan ko‘rsatish (preview) va lokal saqlash funksiyasini ham qo‘shib beraman.</div>
      </form>
    </div>
  </div>
</body>
</html>
