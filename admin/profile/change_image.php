<!doctype html>
<html lang="uz">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profilni yangilash — Parol va Rasm</title>
  <style>
    :root{
      --bg:#ffffff; /* oq fon */
      --card:#f9f9f9; /* karta fon */
      --muted:#6b7280; /* kulrang matn */
      --accent:#111827; /* qora accent */
      --success:#10b981;
      --danger:#ef4444;
      --glass: rgba(0,0,0,0.03);
      --radius:12px;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      background: linear-gradient(180deg,#ffffff 0%, #e5e7eb 100%);
      color:#111827; -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale;
      display:flex; align-items:center; justify-content:center; padding:32px;
    }
    .container{
      width:100%; max-width:580px; background:var(--card);
      border-radius:var(--radius); box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow:hidden; display:grid;;
    }
    .left{
      padding:28px; background:#ffffff; border-right:1px solid rgba(0,0,0,0.05);
      display:flex; flex-direction:column; gap:18px;
    }
    .brand{display:flex; gap:12px; align-items:center}
    .logo{width:44px; height:44px; border-radius:10px; background:var(--accent); color:#ffffff; display:flex; align-items:center; justify-content:center; font-weight:700}
    h2{margin:0; font-size:20px; color:#111827}
    p.lead{margin:0; color:var(--muted)}

    .avatar-wrap{display:flex; gap:14px; align-items:center}
    .avatar{
      width:108px; height:108px; border-radius:14px; background:#f3f4f6; border:2px solid rgba(0,0,0,0.05); display:flex; align-items:center; justify-content:center; overflow:hidden;
    }
    .avatar img{width:100%; height:100%; object-fit:cover}
    .uploader{display:flex; flex-direction:column; gap:6px}
    .btn{display:inline-flex; gap:8px; align-items:center; padding:10px 14px; border-radius:10px; background:var(--accent); color:#ffffff; font-weight:600; cursor:pointer; border:none}
    .btn.ghost{background:transparent; color:var(--muted); border:1px solid rgba(0,0,0,0.05)}

   
   
   
 
    .note{font-size:13px; color:var(--muted); padding:10px; background:rgba(0,0,0,0.03); border-radius:8px}

    
    @media (max-width:880px){
      .container{grid-template-columns:1fr; padding:18px}
      .left{order:2}
      .right{order:1}
    }
    
  </style>

<div class="container" role="region" aria-label="Profilni tahrirlash">
   
  <div class="left">
      <div class="brand">
        <div class="logo">PF</div>
        <div>
          <h2>Profilni yangilash</h2>
          <p class="lead">Parolingiz va profil rasmingizni xavfsiz va tez yangilang</p>
        </div>
      </div>

      <div class="avatar-wrap">
        <div class="avatar" id="avatarPreview">
          <!-- default avatar SVG -->
          <svg width="72" height="72" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="6" fill="#06202f"></rect>
            <path d="M12 12c1.657 0 3-1.344 3-3s-1.343-3-3-3-3 1.344-3 3 1.343 3 3 3zm0 2c-3 0-5.5 1.5-5.5 3.5V20h11v-2.5C17.5 15.5 15 14 12 14z" fill="#9fbbe6"/>
          </svg>
        </div>

        <div class="uploader">
          <label for="avatarInput" class="btn">Rasm yuklash</label>
          <input type="file" id="avatarInput" accept="image/*">
          <button type="button" class="btn ghost" id="removeAvatar">Rasmni olib tashlash</button>
          <div class="hint">Yaxshi o'lcham: <strong>200x200</strong>. Maks 2MB.</div>
        </div>
      </div>

      <div class="note">
        <strong>Maslahat:</strong> Profil rasmingiz aniqlikni oshirish uchun JPEG yoki PNG formatda bo'lsin. Parolni yangilaganda kuchli parol tanlang: kamida 8 belgidan iborat, raqam, katta harf va belgi bo'lsin.
      </div>

      <div style="margin-top:auto">
        <div class="hint">So'ngi yangilanish: <strong id="lastUpdate">—</strong></div>
      </div>
      <button class="toggle-theme-btn" id="themeBtn">Oq / Qora</button>
    </div>
    
    
    <script>
    const themeBtn = document.getElementById('themeBtn');
themeBtn.addEventListener('click', ()=>{
themeBtn.classList.toggle('white');
document.body.style.background = themeBtn.classList.contains('white') ? '#ffffff' : '#111827';
document.body.style.color = themeBtn.classList.contains('white') ? '#111827' : '#ffffff';
});
</script>