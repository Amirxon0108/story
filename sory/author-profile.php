<?php
$author = 'Muallif haqida';
require 'header.php';
require 'users.php';

$num = "SELECT COUNT(*) as total FROM posts";
$total_v=$conn->query($num)->fetch_assoc();

$selected1=$conn->query("SELECT * FROM posts WHERE id=35");
$selected2=$conn->query("SELECT * FROM posts WHERE id=36");
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
                <img src="assets/img/person/director.jpg" alt="Muallif" class="img-fluid rounded">
              </div>

              <div class="author-info">
                <h2>Matchanov Amirxon</h2>
                <p class="designation">Website muallifi</p>

                <div class="author-bio">
               Maqolalarimda texnologiya va jamiyat o‘rtasidagi bog‘liqlikni yoritaman. Yangi texnologiyalarning kundalik hayotga va kelajak rivojiga ta’siri haqida qisqa, aniq va tahliliy fikrlar beraman.</div>

                <div class="author-stats d-flex justify-content-between text-center my-4">
                  <div class="stat-item">
                    <h4 data-purecounter-start="0" data-purecounter-end="<?= $total_v['total']?>" data-purecounter-duration="1" class="purecounter"></h4>
                    <p>Maqolalar</p>
                  </div>
                  <div class="stat-item">
                    <h4 data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></h4>
                    <p>Mukofotlar</p>
                  </div>
                  <div class="stat-item">
                    <h4 data-purecounter-start="0" data-purecounter-end="5452" data-purecounter-duration="1" class="purecounter">K</h4>
                    <p>Obunachilar</p>
                  </div>
                </div>

                <div class="social-links">
                      <a href="https://t.me/Amirdevv  "><i class="bi bi-telegram  "></i></a>
             <a href="https://instagram.com/amirkhan_e17"><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
                <a href="https://www.youtube.com/amirdevv "><i class="bi bi-youtube"></i></a>
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
                 Dasturlash sohasida 2 yildan ortiq tajribaga egaman. Asosiy e’tiborim — sun’iy intellekt, raqamli xavfsizlik, web-texnologiyalar va ular jamiyat hayotiga ko‘rsatayotgan ta’sirni chuqur tahlil qilish. Yaratgan loyihalarim va yozgan maqolalarimda texnologiyalarning kundalik hayotimizni qanday o‘zgartirayotgani, yangi imkoniyatlar yaratishi va kelajakni shakllantirishdagi roli haqida fikr yuritaman. Murakkab texnik jarayonlarni sodda, tushunarli va asosli tarzda izohlash — mening ustunligim.</p>

                <div class="expertise-areas">
                  <h4>Mutaxassislik yo‘nalishlari</h4>
                  <div class="tags">
                    <span>  Web-texnologiyalar </span>
                
                    <span> Sun’iy intellekt</span>
                    <span>Raqamli maxfiylik</span>
                 
                    <span>Kelajak texnologiyalari</span>
                  </div>
                </div>

                <div class="featured-articles mt-5">
                  <h4>Tanlangan maqolalar</h4>
                  <div class="row g-4">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <?php if ($selected1 && $selected1->num_rows >0): ?>
                      <?php while($ro = $selected1->fetch_assoc()):?>
                      <?php if(!empty($ro['image'])):?>
                    <article class="article-card">
                        <div class="article-img">
                          <img src="../uploads/<?= $ro['image']?>" alt="Maqola" class="img-fluid">
                        </div>
                        <div class="article-details">
                          <div class="post-category"><?=$ro['n_type']?></div>
                          <h5><a href="#"><?= $ro['title'] ?></a></h5>
                          <div class="post-meta">
                            <span><i class="bi bi-clock"></i><?= date(' j M, Y', strtotime($ro['created_at']))?></span>
                            <span><i class="bi bi-chat-dots"></i> 24 ta izoh</span>
                          </div>
                        </div>
                      </article>
                       <?php endif; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">Hozircha postlar mavjud emas.</p>
  <?php endif; ?>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                      
                   <?php if ($selected2 && $selected2->num_rows >0): ?>
                      <?php while($ro = $selected2->fetch_assoc()):?>
                      <?php if(!empty($ro['image'])):?>
                    <article class="article-card">
                        <div class="article-img">
                          <img src="../uploads/<?= $ro['image']?>" alt="Maqola" class="img-fluid">
                        </div>
                        <div class="article-details">
                          <div class="post-category"><?=$ro['n_type']?></div>
                          <h5><a href="#"><?= $ro['title'] ?></a></h5>
                          <div class="post-meta">
                            <span><i class="bi bi-clock"></i><?= date(' j M, Y', strtotime($ro['created_at']))?></span>
                            <span><i class="bi bi-chat-dots"></i> 24 ta izoh</span>
                          </div>
                        </div>
                      </article>
                       <?php endif; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">Hozircha postlar mavjud emas.</p>
  <?php endif; ?>
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
