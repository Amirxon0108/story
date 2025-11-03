<?php
require 'users.php';
$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");

require 'header.php'
?>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Blog Category</h1>
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Category</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    

        <section id="category-postst" class="category-postst section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">

      <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <?php if (!empty($row['image'])): ?>
            <div class="col-lg-6">
              <article>

                <!-- Post image -->
                <div class="post-img">
                  <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" 
                       alt="<?= htmlspecialchars($row['title']) ?>" 
                       class="img-fluid" loading="lazy">
                </div>

                <!-- Post meta -->
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center">
                      <a href="category.php?n_type=<?= urlencode($row['n_type']) ?>">
                        <?= htmlspecialchars($row['n_type']) ?>
                      </a>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="bi bi-dot"></i>
                      <a href="single-blog.php?id=<?= $row['id'] ?>">
                        <time datetime="<?= htmlspecialchars($row['created_at']) ?>">
                          <?= htmlspecialchars($row['created_at']) ?>
                        </time>
                      </a>
                    </li>
                  </ul>
                </div>

                <!-- Post title -->
                <h2 class="title">
                  <a href="single-blog.php?id=<?= $row['id'] ?>">
                    <?= htmlspecialchars(substr($row['title'], 0, 80)) ?>...
                  </a>
                </h2>

                <!-- Author info -->
                <div class="author-info d-flex align-items-center mt-3">
                  <img src="../uploads/<?= htmlspecialchars($row['user_img']) ?>" 
                       alt="Author" class="rounded-circle" width="40" height="40">
                  <div class="ms-2">
                    <span class="fw-bold"><?= htmlspecialchars($row['author_name']) ?></span><br>
                    <small class="text-muted"><?= htmlspecialchars($row['r_time']) ?> min read</small>
                  </div>
                </div>

              </article>
            </div><!-- End post list item -->
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-center">Hozircha postlar mavjud emas.</p>
      <?php endif; ?>

    </div>
  </div>
</section>



             

              

          </section><!-- /Category Postst Section -->

          <!-- Pagination 2 Section -->
          <section id="pagination-2" class="pagination-2 section">

            <div class="container">
              <div class="d-flex justify-content-center">
                <ul>
                  <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#" class="active">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li>...</li>
                  <li><a href="#">10</a></li>
                  <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
              </div>
            </div>

          </section><!-- /Pagination 2 Section -->

        </div>

       

          </div>

        </div>

      </div>
    </div>

  </main>

  <?php
require 'footer.php'
  ?>