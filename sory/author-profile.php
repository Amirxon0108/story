<?php
$author = 'Muallif haqida';
require 'header.php';
?>

<main class="main">

  <!-- Sahifa sarlavhasi -->
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="heading-title">Muallif profili</h1>
            <p class="mb-0">
              Texnologiya va jamiyat o‘rtasidagi bog‘liqlikni yoritish orqali, 
              men yangi texnologiyalar hayotimizga qanday ta’sir ko‘rsatayotgani 
              haqida yozaman. Quyida mening tajriba va faoliyatim haqida ma’lumot olishingiz mumkin.
            </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Bosh sahifa</a></li>
          <li class="current">Muallif profili</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- /Sahifa sarlavhasi -->

  <!-- Muallif profili bo‘limi -->
  <section id="author-profile" class="author-profile section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="author-profile-1">

        <div class="row">
          <!-- Muallif ma’lumoti -->
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="author-card" data-aos="fade-up">
              <div class="author-image">
                <img src="assets/img/person/person-m-5.webp" alt="Muallif" class="img-fluid rounded">
              </div>

              <div class="author-info">
                <h2>Matchanov Amirxon</h2>
                <p class="designation">Website muallifi</p>

                <div class="author-bio">
                  Men o‘z maqolalarimda texnologiya va jamiyat o‘rtasidagi munosabatni yoritaman, 
                  yangi texnologiyalar bizning kundalik hayotimiz va kelajak imkoniyatlarimizni qanday shakllantirayotganini tahlil qilaman.
                </div>

                <div class="author-stats d-flex justify-content-between text-center my-4">
                  <div class="stat-item">
                    <h4 data-purecounter-start="0" data-purecounter-end="147" data-purecounter-duration="1" class="purecounter"></h4>
                    <p>Maqolalar</p>
                  </div>
                  <div class="stat-item">
                    <h4 data-purecounter-start="0" data-purecounter-end="13" data-purecounter-duration="1" class="purecounter"></h4>
                    <p>Mukofotlar</p>
                  </div>
                  <div class="stat-item">
                    <h4 data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter">K</h4>
                    <p>Obunachilar</p>
                  </div>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Muallif kontenti -->
          <div class="col-lg-8">
            <div class="author-content" data-aos="fade-up" data-aos-delay="200">
              <div class="content-header">
                <h3>Men haqimda</h3>
              </div>
              <div class="content-body">
                <p>
                  Texnologiya jurnalistikasi sohasida o‘n yildan ortiq tajribaga egaman. 
                  Sun’iy intellekt, raqamli xavfsizlik, iste’molchi texnologiyalari va 
                  ularning jamiyatga ta’siri bo‘yicha ko‘plab tahliliy maqolalar yozganman.
                </p>

                <div class="expertise-areas">
                  <h4>Mutaxassislik yo‘nalishlari</h4>
                  <div class="tags">
                    <span>Sun’iy intellekt</span>
                    <span>Kiberxavfsizlik</span>
                    <span>Aqlli uy texnologiyalari</span>
                    <span>Raqamli maxfiylik</span>
                    <span>Iste’molchi elektronikasi</span>
                    <span>Kelajak texnologiyalari</span>
                  </div>
                </div>

                <div class="featured-articles mt-5">
                  <h4>Tanlangan maqolalar</h4>
                  <div class="row g-4">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                      <article class="article-card">
                        <div class="article-img">
                          <img src="assets/img/blog/blog-post-1.webp" alt="Maqola" class="img-fluid">
                        </div>
                        <div class="article-details">
                          <div class="post-category">Texnologiya</div>
                          <h5><a href="#">Sun’iy intellektning kundalik hayotdagi roli</a></h5>
                          <div class="post-meta">
                            <span><i class="bi bi-clock"></i> 15-yanvar, 2024</span>
                            <span><i class="bi bi-chat-dots"></i> 24 ta izoh</span>
                          </div>
                        </div>
                      </article>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                      <article class="article-card">
                        <div class="article-img">
                          <img src="assets/img/blog/blog-post-2.webp" alt="Maqola" class="img-fluid">
                        </div>
                        <div class="article-details">
                          <div class="post-category">Maxfiylik</div>
                          <h5><a href="#">2024-yilda raqamli maxfiylikni tushunish</a></h5>
                          <div class="post-meta">
                            <span><i class="bi bi-clock"></i> 3-fevral, 2024</span>
                            <span><i class="bi bi-chat-dots"></i> 18 ta izoh</span>
                          </div>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- /Muallif profili bo‘limi -->

</main>

<?php
require 'footer.php';
?>
