<?php
require ('header.php');
require ('users.php');
$id = $_GET['id'] ?? '';
$result = $conn->query("SELECT * FROM posts WHERE id = '$id'");
?>

<style>
.blog-card .card {
  transition: all 0.3s ease;
}
.blog-card .card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.blog-card .badge {
  border-radius: 6px;
  font-size: 0.9rem;
}
</style>

<main class="main">

  <!-- Page Title -->
  <div class="page-title">
    <div class="heading text-center">
      <div class="container">
        <h1 class="heading-title">Single Blog</h1>
        <p class="mb-0 text-muted">Post to‘liq ko‘rinishdagi sahifa</p>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li class="current">Single-page</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Page Title -->

  <div class="container my-5">
    <div class="row g-5">

      
      <div class="col-lg-8">
        <article class="blog-card">
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <?php if (!empty($row['image'])): ?>

                <div class="card shadow border-0 rounded-4 overflow-hidden">
                  <div class="position-relative">
                    <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" 
                         alt="<?= htmlspecialchars($row['title']) ?>" 
                         class="img-fluid w-100"
                         style="height: 420px; object-fit: cover;">
                    <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                      <?= htmlspecialchars($row['n_type']) ?>
                    </span>
                  </div>

                  <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                      <img src="../uploads/<?= htmlspecialchars($row['user_img']) ?>" 
                           alt="Author" 
                           class="rounded-circle me-3 shadow-sm"
                           width="60" height="60"
                           style="object-fit: cover;">
                      <div class="author-details">
                        <span class="fw-bold"><?= htmlspecialchars($row['author_name']) ?></span><br>
                        <small class="text-muted">🕓 <?= htmlspecialchars($row['created_at'] ?? '') ?></small>
                      </div>
                    </div>

                    <h3 class="fw-bold mb-3"><?= htmlspecialchars($row['title']) ?></h3>
                    <p class="text-muted" style="line-height: 1.7;">
                      <?= nl2br(htmlspecialchars($row['content'])) ?>
                    </p>

                    <div class="text-muted mt-3">
                      <i class="bi bi-clock"></i>
                      <?= htmlspecialchars($row['r_time']) ?> min read
                    </div>
                  </div>
                </div>

              <?php endif; ?>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="text-center text-muted fs-5">Hozircha postlar mavjud emas.</p>
          <?php endif; ?>
        </article>
      </div>
      <!-- END LEFT SIDE -->

      <!-- RIGHT (SIDEBAR) -->
      <div class="col-lg-4">
        <div class="widgets-container">

          <!-- Search Widget -->
          <div class="search-widget widget-item mb-4">
            <h3 class="widget-title">Search</h3>
            <form action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
              </div>
            </form>
          </div>

          <!-- Categories Widget -->
          <div class="categories-widget widget-item mb-4">
            <h3 class="widget-title">Categories</h3>
            <ul class="list-unstyled mt-3">
              <li><a href="#">General <span>(25)</span></a></li>
              <li><a href="#">Lifestyle <span>(12)</span></a></li>
              <li><a href="#">Travel <span>(5)</span></a></li>
              <li><a href="#">Design <span>(22)</span></a></li>
              <li><a href="#">Creative <span>(8)</span></a></li>
              <li><a href="#">Education <span>(14)</span></a></li>
            </ul>
          </div>

          <!-- Recent Posts Widget -->
          <div class="recent-posts-widget widget-item mb-4">
            <h3 class="widget-title">Recent Posts</h3>
            <div class="d-flex flex-column gap-3 mt-3">
              <div class="d-flex">
                <img src="assets/img/blog/blog-post-square-1.webp" alt="" width="70" class="rounded me-3">
                <div>
                  <h6 class="mb-1"><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h6>
                  <small class="text-muted">Jan 1, 2020</small>
                </div>
              </div>
              <div class="d-flex">
                <img src="assets/img/blog/blog-post-square-2.webp" alt="" width="70" class="rounded me-3">
                <div>
                  <h6 class="mb-1"><a href="blog-details.html">Quidem autem et impedit</a></h6>
                  <small class="text-muted">Jan 1, 2020</small>
                </div>
              </div>
              <div class="d-flex">
                <img src="assets/img/blog/blog-post-square-3.webp" alt="" width="70" class="rounded me-3">
                <div>
                  <h6 class="mb-1"><a href="blog-details.html">Ut maxime similique occaecati</a></h6>
                  <small class="text-muted">Jan 1, 2020</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Tags Widget -->
          <div class="tags-widget widget-item">
            <h3 class="widget-title">Tags</h3>
            <div class="d-flex flex-wrap gap-2 mt-3">
              <a href="#" class="btn btn-outline-primary btn-sm">App</a>
              <a href="#" class="btn btn-outline-primary btn-sm">Design</a>
              <a href="#" class="btn btn-outline-primary btn-sm">IT</a>
              <a href="#" class="btn btn-outline-primary btn-sm">Business</a>
              <a href="#" class="btn btn-outline-primary btn-sm">Marketing</a>
              <a href="#" class="btn btn-outline-primary btn-sm">Tips</a>
            </div>
          </div>

        </div>
      </div>
      <!-- END SIDEBAR -->

    </div>
  </div>
</main>

<?php require 'footer.php'; ?>
