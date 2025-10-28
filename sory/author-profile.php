<?php
$author = 'Muallif haqida';
require 'header.php';
?>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Author Profile</h1>
              <p class="mb-0">
                Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo
                odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum
                debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat
                ipsum dolorem.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Author Profile</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Author Profile Section -->
    <section id="author-profile" class="author-profile section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="author-profile-1">

          <div class="row">
            <!-- Author Info -->
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="author-card" data-aos="fade-up">
                <div class="author-image">
                  <img src="assets/img/person/person-m-5.webp" alt="Author" class="img-fluid rounded">
                </div>

                <div class="author-info">
                  <h2>Kevin Anderson</h2>
                  <p class="designation">Senior Technology Writer</p>

                  <div class="author-bio">
                    Through my articles, I explore the intersection of technology and society, focusing on how emerging tech shapes our daily lives and future possibilities.
                  </div>

                  <div class="author-stats d-flex justify-content-between text-center my-4">
                    <div class="stat-item">
                      <h4 data-purecounter-start="0" data-purecounter-end="147" data-purecounter-duration="1" class="purecounter"></h4>
                      <p>Articles</p>
                    </div>
                    <div class="stat-item">
                      <h4 data-purecounter-start="0" data-purecounter-end="13" data-purecounter-duration="1" class="purecounter"></h4>
                      <p>Awards</p>
                    </div>
                    <div class="stat-item">
                      <h4 data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter">K</h4>
                      <p>Followers</p>
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

            <!-- Author Content -->
            <div class="col-lg-8">
              <div class="author-content" data-aos="fade-up" data-aos-delay="200">
                <div class="content-header">
                  <h3>About Me</h3>
                </div>
                <div class="content-body">
                  <p>With over a decade of experience in technology journalism, I've had the privilege of witnessing and documenting the rapid evolution of our digital landscape. My work spans from in-depth analysis of artificial intelligence and its implications to hands-on reviews of the latest consumer technology.</p>

                  <div class="expertise-areas">
                    <h4>Areas of Expertise</h4>
                    <div class="tags">
                      <span>Artificial Intelligence</span>
                      <span>Cybersecurity</span>
                      <span>Smart Home Technology</span>
                      <span>Digital Privacy</span>
                      <span>Consumer Electronics</span>
                      <span>Future Tech Trends</span>
                    </div>
                  </div>

                  <div class="featured-articles mt-5">
                    <h4>Featured Articles</h4>
                    <div class="row g-4">
                      <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <article class="article-card">
                          <div class="article-img">
                            <img src="assets/img/blog/blog-post-1.webp" alt="Article" class="img-fluid">
                          </div>
                          <div class="article-details">
                            <div class="post-category">Technology</div>
                            <h5><a href="#">The Future of AI in Everyday Computing</a></h5>
                            <div class="post-meta">
                              <span><i class="bi bi-clock"></i> Jan 15, 2024</span>
                              <span><i class="bi bi-chat-dots"></i> 24 Comments</span>
                            </div>
                          </div>
                        </article>
                      </div>

                      <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <article class="article-card">
                          <div class="article-img">
                            <img src="assets/img/blog/blog-post-2.webp" alt="Article" class="img-fluid">
                          </div>
                          <div class="article-details">
                            <div class="post-category">Privacy</div>
                            <h5><a href="#">Understanding Digital Privacy in 2024</a></h5>
                            <div class="post-meta">
                              <span><i class="bi bi-clock"></i> Feb 3, 2024</span>
                              <span><i class="bi bi-chat-dots"></i> 18 Comments</span>
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

    </section><!-- /Author Profile Section -->

  </main>

   <?php
require 'footer.php'
  ?>