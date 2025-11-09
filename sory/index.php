<?php

  $title = 'Bosh sahifa';
  require 'header.php';
  require 'users.php';

$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");
$res = $conn->query("SELECT * FROM posts WHERE id IN (30,31,32,33,34)");

  $results=$conn->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1");
  $resultb=$conn->query("SELECT * FROM posts WHERE n_type = 'biznes' ORDER BY id DESC LIMIT 1");
  $resultt=$conn->query("SELECT * FROM posts WHERE n_type = 'Technalogy' ORDER BY id DESC LIMIT 1");
  $resulti=$conn->query("SELECT * FROM posts WHERE n_type = 'Iqtisodiyot' ORDER BY id DESC LIMIT 1");
  $resultj=$conn->query("SELECT * FROM posts WHERE n_type = 'Jahon' ORDER BY id DESC LIMIT 1");
  $resultta=$conn->query("SELECT * FROM posts WHERE n_type = 'Talim' ORDER BY id DESC LIMIT  1");
?>
<style>
h1 a {
  color: #ffffff; /* asosiy rang oq */
  text-decoration: none;
  transition: color 0.3s; /* rang yumshoq o'zgarishi */
}

h1 a:hover {
  color: #007bff; /* hover rang ko‘k */
}
</style>
  <main class="main">

    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section">

      <div class="container-fluid p-0" data-aos="fade">

        <div class="blog-hero-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 1000,
              "effect": "fade",
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

      
          <div class="swiper-wrapper">
           
              <?php if($res && $res->num_rows > 0) :?>
                  <?php while ($row = $res->fetch_assoc()):?>
                  <?php if (!empty($row['image'])):?>
                     <div class="swiper-slide">
              <div class="blog-hero-item">
                <img src="../uploads/<?= $row['image'] ?>" alt="Blog Hero Image" class="img-fluid">
                <div class="blog-hero-content">
                  
                 
                  <span class="category"><?= htmlspecialchars($row['n_type'])?></span>
                 <h1>
  <a href="single-blog.php?id=<?= $row['id'] ?>">
    <?= htmlspecialchars(substr($row['title'],0,100)) ?>
  </a>
</h1> <div class="meta">
                    <span class="author">BY <a href="author-profile.php"><?= htmlspecialchars($row['author_name'])?></a></span>
                    <span class="date"><?= date('j M , Y' ,strtotime($row['created_at'])) ?></span>
                    <span class="read-time"><i class="bi bi-clock"></i> <?= htmlspecialchars($row['r_time'])?>  daqiqa o‘qiladi</span>
                    <span class="views"><i class="bi bi-eye"></i> <?= htmlspecialchars($row['views'])?></span>
                  </div>
                  <a href="single-blog.php?id=<?= $row['id'] ?>" class="read-more">Continue Reading <i class="bi bi-arrow-right"></i></a>
                </div>
              </div></div>
               <?php endif; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">Hozircha postlar mavjud emas.</p>
  <?php endif; ?>
            </div><!-- End slide item -->

          </div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
           <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Blog Hero Section -->

    <!-- Featured Posts Section -->
    <section id="featured-posts" class="featured-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="description-title">Eng so'ngi malumotlar</span>
        <h2>Eng so'ngi malumotlar </h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="blog-posts-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 4500
              },
              "slidesPerView": 1,
              "spaceBetween": 40,
              "centeredSlides": true,
              "breakpoints": {
                "768": {
                  "slidesPerView": 1.5,
                  "spaceBetween": 30
                },
                "1200": {
                  "slidesPerView": 2.2,
                  "spaceBetween": 40
                }
              },
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
              }
            }
          </script>

         <div class="swiper-wrapper">
  <?php if ($result && $result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
      <?php if (!empty($row['image'])): ?>
        <div class="swiper-slide">
          <article class="blog-card">
            <div class="blog-image position-relative">  
              <img src="../uploads/<?= htmlspecialchars($row['image']) ?>  " 
                   alt="<?= htmlspecialchars($row['title']) ?>  "
                   loading="lazy"  >
              <div class="category-badge"><?= htmlspecialchars($row['n_type'])?></div>
            </div>

            <div class="blog-content">
              <div class="author-info">
                <img src="../uploads/<?= htmlspecialchars($row['user_img']) ?>" alt="Author" class="author-avatar">
                <div class="author-details">
                  <span class="author-name"><?= htmlspecialchars($row['author_name']) ?></span> 
                      <span class="views"><i class="bi bi-eye"></i> <?= $row['views'] ?> marta ko'rilgan </span>  <span class="publish-date">🕓 <?= date('j M, Y', strtotime($row['created_at'])) ?></span>
                </div>
              </div>

              <h3> <a href="single-blog.php?id=<?= $row['id'] ?>"> <?= htmlspecialchars(substr($row['title'],0,80)) ?>...</a></h3>
              <p><?= (htmlspecialchars(substr($row['content'],0,100))) ?>...</p>

              <div class="blog-footer">
                <div class="reading-time">
                  <i class="bi bi-clock"></i>
                  <span><i></i><?= htmlspecialchars($row['r_time'])?> daqiqa o‘qiladi</span>
                </div>
                <form action="category.php" method="POST">
                  <a href="single-blog.php?id=<?= $row['id'] ?>" class="btn-read-more">
  <span>Davomini o'qing</span>
  <i class="bi bi-arrow-right"></i>
</a>
                 </form>
              </div>
            </div>
          </article>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">Hozircha postlar mavjud emas.</p>
  <?php endif; ?>
</div>
<!-- End slide item -->

          
          </div>

          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Featured Posts Section -->

    <!-- Category Section Section -->
    <section id="category-section" class="category-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="description-title">Bo‘lim Kategoriyasi</span>
        <h2>Bo‘lim Kategoriyasi</h2>
        <p>Ushbu bo‘limda siz uchun eng so‘nggi va dolzarb ma’lumotlar jamlangan  </p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Main Featured Post -->
        <div class="row gy-4 mb-5">
          <div class="col-lg-8">
            <article class="hero-post" data-aos="zoom-out" data-aos-delay="200">
              <div class="post-img">
                <img src="assets/img/blog/blog-post-5.webp" alt="" class="img-fluid" loading="lazy">
              </div>
              <div class="post-content">
                <div class="author-info">
                  <img src="assets/img/person/person-m-8.webp" alt="" class="author-avatar">
                  <div class="author-details">
                    <span class="author-name">Michael R.</span>
                    <span class="post-date">15 March 2024</span>
                  </div>
                </div>
                <h2 class="post-title">
                  <a href="blog-details.php">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore</a>
                </h2>
                <p class="post-excerpt">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <div class="post-stats">
                  <span class="read-time"><i class="bi bi-clock"></i> 5 min read</span>
                  <span class="comments"><i class="bi bi-chat-dots"></i> 12 comments</span>
                </div>
              </div>
            </article>
          </div>

          <div class="col-lg-4">
            <div class="sidebar-posts">
              <article class="sidebar-post" data-aos="fade-left" data-aos-delay="300">
                <div class="post-img">
                  <img src="../uploads/texnalogiya.jpg" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="post-content">
                  <span class="post-category">Texnalogiya</span>
                  <h4 class="title">
                    <a href="tex.php">Eng so'ngi texnalogik yangiliklar </a>
                  </h4>
                  <div class="post-meta">
                    <span class="post-date">news24</span>
                  </div>
                </div>
              </article>

              <article class="sidebar-post" data-aos="fade-left" data-aos-delay="400">
                <div class="post-img">
                  <img src="../uploads/iqtisodiyot.webp" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="post-content">
                  <span class="post-category">Iqtisodiyot</span>
                  <h4 class="title">
                    <a href="iqtisodiyot.php">Jahon va O'zbekiston iqtisodiyotidagi yangiliklar</a>
                  </h4>
                  <div class="post-meta">
                    <span class="post-date">news24</span>
                  </div>
                </div>
              </article>

              <article class="sidebar-post" data-aos="fade-left" data-aos-delay="500">
                <div class="post-img">
                  <img src="../uploads/JahonLogo.png" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="post-content">
                  <span class="post-category">Jahon</span>
                  <h4 class="title">
                    <a href="jahon.php">Jahoda sodir bo'layotgan yangiliklar</a>
                  </h4>
                  <div class="post-meta">
                    <span class="post-date">news24</span>
                  </div>
                </div>
              </article>

              <article class="sidebar-post" data-aos="fade-left" data-aos-delay="600">
                <div class="post-img">
                  <img src="../uploads/biznes.jpg" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="post-content">
                  <span class="post-category">Biznes</span>
                  <h4 class="title">
                    <a href="biznes.php">Biznesga doir yangiliklar</a>
                  </h4>
                  <div class="post-meta">
                    <span class="post-date">news24</span>
                  </div>
                </div>
              </article>

               <article class="sidebar-post" data-aos="fade-left" data-aos-delay="600">
                <div class="post-img">
                  <img src="../uploads/talim.png" alt="" class="img-fluid" loading="lazy">
                </div>
                <div class="post-content">
                  <span class="post-category">Ta'lim</span>
                  <h4 class="title">
                    <a href="talim.php">Ta'limdagi bo'layotkan o'zgarishlar va yangiliklar</a>
                  </h4>
                  <div class="post-meta">
                    <span class="post-date">news24</span>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>

        
     

    </section><!-- /Category Section Section -->

    <!-- Latest Posts Section -->
    <section id="latest-posts" class="latest-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="description-title">Eng so'ngi yangiliklar</span>
        <h2>Eng so'ngi yangiliklar</h2>
        <p>Eng so'ngi yangiliklarni news24 bilan har huni o'qib boring. Eng yangi va Eng ishonchli yangiliklar sayti !</p>
      </div><!-- End Section Title -->

     <div class="container" data-aos="fade-up" data-aos-delay="100">

  <!-- Featured Post -->
  <?php if($results && $results->num_rows>0): ?>
    <?php $row = $results->fetch_assoc(); ?>
    <?php if(!empty($row['image'])): ?>
      <div class="row gy-4 align-items-stretch">

        <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="150">
          <article class="featured-post position-relative h-100">
            <figure class="featured-media m-0">
              <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" alt="Featured post image" class="img-fluid w-100" loading="lazy">
            </figure>

            <div class="featured-content">
              <div class="date-badge">
                <span class="day"><?= date('j', strtotime($row['created_at'])) ?></span>
                <span class="mon"><?= date('M', strtotime($row['created_at'])) ?></span>
              </div>

              <span class="cat-badge inverse"><?= htmlspecialchars($row['n_type']) ?></span>

              <h3 class="title"><?= htmlspecialchars($row['title']) ?></h3>
              <p class="excerpt d-none d-md-block"><?= htmlspecialchars(substr($row['content'], 0, 150)) ?></p>

              <div class="meta d-flex align-items-center gap-3">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i><span class="ps-2"><?= htmlspecialchars($row['author_name']) ?></span>
                </div>
                <span class="sep">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i><span class="ps-2">news24</span>
                </div>
              </div>

              <a href="single-blog.php?id=<?= $row['id'] ?>" class="readmore stretched-link">
                <span>davomini o'qish</span><i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </article>
        </div>
  <?php endif; ?>
  <?php endif; ?>
  <!-- End Featured Post -->

  <!-- Right Column -->
  <div class="col-lg-5">
    <div class="row gy-4">

      <!-- Iqtisodiyot Post -->
      <div class="col-12" data-aos="fade-left" data-aos-delay="200">
        <?php if($resulti && $resulti->num_rows>0): ?>
          <?php $row = $resulti->fetch_assoc(); ?>
          <?php if(!empty($row['image'])): ?>
            <article class="compact-post h-100">
              <div class="thumb">
                <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="img-fluid" alt="Post thumbnail" loading="lazy">
              </div>
              <div class="content">
                <div class="meta">
                  <span class="date"><?= date('j M', strtotime($row['created_at'])) ?></span>
                  <span class="dot">•</span>
                  <span class="category"><?= htmlspecialchars($row['n_type']) ?></span>
                </div>
                <h4 class="title"><?= htmlspecialchars($row['title']) ?></h4>
                <a href="single-blog.php?id=<?= $row['id'] ?>" class="readmore"><span>Davomini o'qish</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </article>
          <?php endif; ?>
        <?php else: ?>
          <p class="text-center">Hozircha postlar mavjud emas.</p>
        <?php endif; ?>
      </div>

      <!-- Biznes Post -->
      <div class="col-12" data-aos="fade-left" data-aos-delay="200">
        <?php if($resultb && $resultb->num_rows>0): ?>
          <?php $row = $resultb->fetch_assoc(); ?>
          <?php if(!empty($row['image'])): ?>
            <article class="compact-post h-100">
              <div class="thumb">
                <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="img-fluid" alt="Post thumbnail" loading="lazy">
              </div>
              <div class="content">
                <div class="meta">
                  <span class="date"><?= date('j M', strtotime($row['created_at'])) ?></span>
                  <span class="dot">•</span>
                  <span class="category"><?= htmlspecialchars($row['n_type']) ?></span>
                </div>
                <h4 class="title"><?= htmlspecialchars($row['title']) ?></h4>
                <a href="single-blog.php?id=<?= $row['id'] ?>" class="readmore"><span>Davomini o'qish</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </article>
          <?php endif; ?>
        <?php else: ?>
          <p class="text-center">Hozircha postlar mavjud emas.</p>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <!-- End Right Column -->

  <!-- Grid Posts -->
  <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <?php if($resultt && $resultt->num_rows>0): ?>
      <?php $row = $resultt->fetch_assoc(); ?>
      <?php if(!empty($row['image'])): ?>
        <article class="card-post h-100">
          <div class="post-img position-relative overflow-hidden">
            <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="img-fluid w-100" alt="Post image" loading="lazy">
          </div>
          <div class="content">
            <div class="meta d-flex align-items-center flex-wrap gap-2">
              <span class="cat-badge"><?= htmlspecialchars($row['n_type']) ?></span>
              <div class="d-flex align-items-center ms-auto">
                <i class="bi bi-person"></i><span class="ps-2"><?= htmlspecialchars($row['author_name']) ?></span>
              </div>
            </div>
            <h3 class="title"><?= htmlspecialchars($row['title']) ?></h3>
            <a href="single-blog.php?id=<?= $row['id'] ?>" class="readmore"><span>Davomini o'qish</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </article>
      <?php endif; ?>
    <?php else: ?>
      <p class="text-center">Hozircha postlar mavjud emas.</p>
    <?php endif; ?>
  </div>

  <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <?php if($resultj && $resultj->num_rows>0): ?>
      <?php $row = $resultj->fetch_assoc(); ?>
      <?php if(!empty($row['image'])): ?>
        <article class="card-post h-100">
          <div class="post-img position-relative overflow-hidden">
            <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="img-fluid w-100" alt="Post image" loading="lazy">
          </div>
          <div class="content">
            <div class="meta d-flex align-items-center flex-wrap gap-2">
              <span class="cat-badge"><?= htmlspecialchars($row['n_type']) ?></span>
              <div class="d-flex align-items-center ms-auto">
                <i class="bi bi-person"></i><span class="ps-2"><?= htmlspecialchars($row['author_name']) ?></span>
              </div>
            </div>
            <h3 class="title"><?= htmlspecialchars($row['title']) ?></h3>
            <a href="single-blog.php?id=<?= $row['id'] ?>" class="readmore"><span>Davomini o'qish</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </article>
      <?php endif; ?>
    <?php else: ?>
      <p class="text-center">Hozircha postlar mavjud emas.</p>
    <?php endif; ?>
  </div>

  <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <?php if($resultta && $resultta->num_rows>0): ?>
      <?php $row = $resultta->fetch_assoc(); ?>
      <?php if(!empty($row['image'])): ?>
        <article class="card-post h-100">
          <div class="post-img position-relative overflow-hidden">
            <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="img-fluid w-100" alt="Post image" loading="lazy">
          </div>
          <div class="content">
            <div class="meta d-flex align-items-center flex-wrap gap-2">
              <span class="cat-badge"><?= htmlspecialchars($row['n_type']) ?></span>
              <div class="d-flex align-items-center ms-auto">
                <i class="bi bi-person"></i><span class="ps-2"><?= htmlspecialchars($row['author_name']) ?></span>
              </div>
            </div>
            <h3 class="title"><?= htmlspecialchars($row['title']) ?></h3>
            <a href="single-blog.php?id=<?= $row['id'] ?>" class="readmore"><span>Davomini o'qish</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </article>
      <?php endif; ?>
    <?php else: ?>
      <p class="text-center">Hozircha postlar mavjud emas.</p>
    <?php endif; ?>
  </div>

</div>

    </section><!-- /Latest Posts Section -->

  </main>

  <?php
require 'footer.php';
  ?>