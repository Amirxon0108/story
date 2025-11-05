   <?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login-form.php");
    exit;
}
?>
   <!doctype html>
    <html lang="uz">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Parolni almashtirish — Dizayn</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{
        --bg: #0f172a;
        --card: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
        --accent: #7c3aed; /* purple */
        --accent-2: #06b6d4; /* teal */
        --muted: rgba(255,255,255,0.65);
        --glass: rgba(255,255,255,0.04);
        --danger: #ef4444;
        font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
        }
        *{box-sizing:border-box}
        html,body{height:100%}
        body{
        margin:0;
        background: radial-gradient(1000px 600px at 10% 10%, rgba(124,58,237,0.12), transparent 8%),
                    radial-gradient(800px 500px at 90% 90%, rgba(6,182,212,0.06), transparent 8%),
                    var(--bg);
        color:#e6eef8;
        -webkit-font-smoothing:antialiased;
        -moz-osx-font-smoothing:grayscale;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:24px;
        }
        .card{
        width:100%;
        max-width:520px;
        background:var(--card);
        border-radius:14px;
        padding:28px;
        box-shadow: 0 8px 30px rgba(2,6,23,0.6);
        backdrop-filter: blur(8px) saturate(120%);
        border: 1px solid rgba(255,255,255,0.04);
        }
        .header{
        display:flex;align-items:center;gap:16px;margin-bottom:18px;
        }
        .logo{
        width:56px;height:56px;border-radius:12px;display:grid;place-items:center;background:linear-gradient(135deg,var(--accent),var(--accent-2));font-weight:700;font-size:20px;color:white;box-shadow: 0 6px 18px rgba(124,58,237,0.18);
        }
        h1{margin:0;font-size:20px}
        p.lead{margin:6px 0 0;color:var(--muted);font-size:13px}

        form{margin-top:8px}
        .field{margin-bottom:14px}
        label{display:block;font-size:13px;color:var(--muted);margin-bottom:8px}
        input[type="password"]{width:100%;padding:12px 14px;border-radius:10px;border:1px solid rgba(255,255,255,0.04);background:transparent;color:inherit;font-size:15px;outline:none;transition:box-shadow .15s ease, border-color .15s ease}
        input[type="password"]:focus{box-shadow:0 6px 20px rgba(124,58,237,0.08);border-color:rgba(124,58,237,0.35)}

        .row{display:flex;gap:12px}
        .col{flex:1}

        .controls{display:flex;align-items:center;gap:12px;justify-content:space-between;margin-top:8px}
        button.primary{
        background:linear-gradient(90deg,var(--accent),var(--accent-2));border:0;padding:10px 14px;border-radius:10px;color:white;font-weight:600;cursor:pointer;box-shadow:0 8px 20px rgba(6,182,212,0.08);
        }
        button.ghost{background:transparent;border:1px solid rgba(255,255,255,0.06);color:var(--muted);padding:10px 12px;border-radius:10px;cursor:pointer}

        .meta{font-size:13px;color:var(--muted);margin-top:12px}

        .toggle-eye{background:transparent;border:0;color:var(--muted);cursor:pointer;padding:6px;border-radius:8px}

        /* password strength */
        .strength{height:9px;background:rgba(255,255,255,0.04);border-radius:8px;overflow:hidden}
        .strength > i{display:block;height:100%;width:0%;background:linear-gradient(90deg,#ef4444,#f59e0b,#10b981);transition:width .3s ease}
        .strength-text{font-size:12px;margin-top:8px;color:var(--muted)}

        .hint{font-size:13px;color:rgba(255,255,255,0.6);margin-top:6px}
        .error{color:var(--danger);font-size:13px;margin-top:6px}

        .footer-note{font-size:12px;color:var(--muted);text-align:center;margin-top:16px}

        @media (max-width:520px){.card{padding:20px}}
    </style>
    </head>
    <body>
    <main class="card" role="main">
        <div class="header">
        <div class="logo">PX</div>
        <div>
            <h1>Parolni almashtirish</h1>
            <p class="lead">Hisobingiz xavfsizligini saqlash uchun kuchli va noyob parol tanlang.</p>
        </div>
        </div>

        <form  action="password.php" method="POST">
        <div class="field">
            <label for="current">Joriy parol</label>
            <div style="position:relative;display:flex;align-items:center;">
            <input name="password" id="current" type="password" autocomplete="current-password" placeholder="Joriy parolingizni kiriting" required />
            <button type="button" class="toggle-eye" data-target="current" aria-label="show/hide">👁️</button>
            </div>
        </div>

        <div class="field">
            <label for="newpwd">Yangi parol</label>
            <div style="position:relative;display:flex;align-items:center;">
            <input name="newpassword" id="newpwd" type="password" autocomplete="new-password" placeholder="Yangi parol" required minlength="8" />
            <button type="button" class="toggle-eye" data-target="newpwd" aria-label="show/hide">👁️</button>
            </div>
            <div class="hint">Parol kamida 8 ta belgidan iborat bo'lsin — katta harf, kichik harf, raqam va maxsus belgi maslahat beriladi.</div>
            <div style="margin-top:10px">
            <div class="strength" aria-hidden="true"><i id="strengthBar"></i></div>
            <div class="strength-text" id="strengthText">Kuch: —</div>
            

            <?php if(isset($_GET['msg'])): ?>
      <div class="msg <?= $_GET['type'] ?? 'success' ?>">
        <?= htmlspecialchars($_GET['msg']) ?>
      </div>
    <?php endif; ?>
            </div>
        </div>

        <div class="field">
            <label for="confirm">Parolni tasdiqlang</label>
            <div style="position:relative;display:flex;align-items:center;">
            <input name="confirmnewpassword" id="confirm" type="password" autocomplete="new-password" placeholder="Yangi parolni qayta kiriting" required />
            <button type="button" class="toggle-eye" data-target="confirm" aria-label="show/hide">👁️</button>
            </div>
            <div id="matchMsg" class="error" style="display:none">Parollar mos emas</div>
        </div>

        <div class="controls">
            <div style="display:flex;gap:8px;align-items:center">
            <input id="rememberCheck" type="checkbox" />
            <label for="rememberCheck" style="color:var(--muted);font-size:13px">Mening barcha qurilmalarimdan chiqib ketilsin</label>
            </div>
            <div style="display:flex;gap:8px">
            <button type="button" class="ghost" id="cancel">Bekor qilish</button>
            <button type="submit" class="primary">Parolni yangilash</button>
            </div>
        </div>

        <div id="formError" class="error" style="display:none"></div>
        <div id="formSuccess" class="meta" style="display:none;color:lightgreen"></div>
        </form>

        <p class="footer-note">Agar siz parolni unutgan bo'lsangiz — <a href="#" style="color:inherit;text-decoration:underline;">Tiklash sahifasiga o'ting</a>.</p>
    </main>

    <script>
    // Utility functions
    const el = id => document.getElementById(id);
    const qs = sel => document.querySelector(sel);

    // Show/hide toggles
    document.querySelectorAll('.toggle-eye').forEach(btn => {
        btn.addEventListener('click', () => {
        const target = el(btn.dataset.target);
        if(!target) return;
        if(target.type === 'password') { target.type = 'text'; btn.textContent = '🙈'; }
        else { target.type = 'password'; btn.textContent = '👁️'; }
        });
    });

    
    </script>
    </body>
    </html>
