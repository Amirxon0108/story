<?php
require ('header.php');
?>
<main class="main">

  <!-- Sahifa sarlavhasi -->
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="heading-title">Aloqa</h1>
            <p class="mb-0">
              Biz bilan bog‘laning. Savolingiz, taklifingiz yoki fikringiz bo‘lsa — bemalol yozing.
              Sizga imkon qadar tez javob beramiz.
            </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Bosh sahifa</a></li>
          <li class="current">Aloqa</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- /Sahifa sarlavhasi -->

  <!-- Aloqa bo‘limi -->
  <section id="contact" class="contact section">

    <div class="container">
      <div class="contact-wrapper">
        <div class="contact-info-panel">
          <div class="contact-info-header">
            <h3>Aloqa ma’lumotlari</h3>
            <p>Biz bilan bog‘lanish uchun quyidagi manzillar yoki raqamlardan foydalaning.</p>
          </div>

          <div class="contact-info-cards">
            <div class="info-card">
              <div class="icon-container">
                <i class="bi bi-pin-map-fill"></i>
              </div>
              <div class="card-content">
                <h4>Manzilimiz</h4>
                <p>4952 Hilltop Dr, Anytown, CA 90210</p>
              </div>
            </div>

            <div class="info-card">
              <div class="icon-container">
                <i class="bi bi-envelope-open"></i>
              </div>
              <div class="card-content">
                <h4>Elektron pochta</h4>
                <p>info@example.com</p>
              </div>
            </div>

            <div class="info-card">
              <div class="icon-container">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div class="card-content">
                <h4>Telefon raqam</h4>
                <p>+1 (555) 123-4567</p>
              </div>
            </div>

            <div class="info-card">
              <div class="icon-container">
                <i class="bi bi-clock-history"></i>
              </div>
              <div class="card-content">
                <h4>Ish vaqti</h4>
                <p>Dushanba - Shanba: 9:00 — 19:00</p>
              </div>
            </div>
          </div>

          <div class="social-links-panel">
            <h5>Bizni kuzating</h5>
            <div class="social-icons">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
        </div>

        <div class="contact-form-panel">
          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
              width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="form-container">
            <h3>Bizga xabar yuboring</h3>
            <p>Quyidagi forma orqali bizga murojaat yuborishingiz mumkin.  
              Sizga imkon qadar tez orada javob beramiz.</p>

            <?php
            if(!empty($_SESSION['contact_success'])){
              echo '<div class="alert alert-success">' . $_SESSION['contact_success'] . '</div>';
              unset($_SESSION['contact_success']);
            };
            if(!empty($_SESSION['contact_errors'])){
              echo '<div class="alert alert-danger">' . $_SESSION['contact_errors'] . '</div>';
              unset($_SESSION['contact_errors']);
            }
            ?>

            <form action="contact-form.php" method="POST" class="php-email-form">

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="emailInput" name="email" placeholder="Elektron pochta" required="">
                <label for="emailInput">Elektron pochta manzilingiz</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="subjectInput" name="message" placeholder="Xabar" required="">
                <label for="subjectInput">Xabaringiz</label>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn-submit">Xabarni yuborish <i class="bi bi-send-fill ms-2"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Aloqa bo‘limi -->

</main>

<?php
require 'footer.php';
?>
