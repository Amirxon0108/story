<?php
require 'users.php';
require 'header.php';
$soni = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = $soni * ($page - 1);


$query = "SELECT COUNT(*) as total FROM posts";
$n = $conn->query($query)->fetch_assoc();

$totalPages = ceil($n['total'] / $soni);


$links = "";
for ($i = 1; $i <= $totalPages; $i++) {
    $active = ($i == $page) ? "active" : "";
    $links .= "<li class='$active'><a href='iqtisodiyot.php?page=$i'>$i</a></li>";
}

$result=$conn->query("SELECT * FROM posts WHERE n_type = 'Iqtisodiyot' ORDER BY id DESC LIMIT $start, $soni");

?>
<style>
.post-img {
  width: 100%;
  height: 200px;
  overflow: hidden;
  border-radius: 10px;
}

.post-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}


.post-img img:hover {
  transform: scale(1.05);
}

.category-badge {
  font-size: 0.9rem;
  font-weight: 600;
}


</style>

<main class="main">

  <!-- Page Title -->
  <div class="page-title">
    <div class="heading">
      <div class="container text-center">
        <h1 class="heading-title">Eng So‘ngi Yangiliklar</h1>
        <p class="mb-0">Saytimizdagi eng so‘nggi texnologik yangiliklar bilan tanishing.</p>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Biznesga doir yangiliklar</a></li>
          <li class="current">Yangiliklar</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Page Title -->

 <!-- Category Section -->
<section id="category-postst" class="category-postst section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <?php if ($result && $result->num_rows > 0): ?>
      <!-- faqat 1 marta row ochamiz -->
      <div class="row gy-4 row-cols-2 row-cols-md-2 row-cols-lg-3">

        <?php while ($row = $result->fetch_assoc()): ?>
          <?php if (!empty($row['image'])): ?>
            <div class="col d-flex align-items-stretch">
              <article class="post-card">

                <!-- Post image -->
                <div class="post-img position-relative">
                  <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" 
                       alt="<?= htmlspecialchars($row['title']) ?>" 
                       class="img-fluid" loading="lazy">

                  <div class="category-badge position-absolute top-0 start-0 bg-primary text-white px-2 py-1 rounded-end">
                    <?= htmlspecialchars($row['n_type']) ?>
                  </div>
                </div>

                <!-- Post meta -->
                <div class="meta-top mt-2">
                  <ul class="list-inline mb-1">
                    <li class="list-inline-item">
                 <span class="views"><i class="bi bi-eye"></i> <?= $row['views'] ?> ko'rish</span>
                    </li>
                    <li class="list-inline-item">
                      <i class="bi bi-dot"></i>
                      <time datetime="<?= date('j M,Y',strtotime($row['created_at'])) ?>">
                        <?= date('j M , Y',strtotime($row['created_at'])) ?>
                      </time>
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
                   <a href="author-profile.php"> <span class="fw-bold"><?= htmlspecialchars($row['author_name']) ?></span><br></a> 
                    <small class="text-muted"><?= htmlspecialchars($row['r_time']) ?> min o‘qish</small>
                  </div>
                </div>

              </article>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>

      </div> <!-- row tugadi -->
    <?php else: ?>
      <p class="text-center">Hozircha postlar mavjud emas.</p>
    <?php endif; ?>

  </div>
</section>


  <!-- Pagination Section -->
  <section id="pagination-2" class="pagination-2 section">
    <div class="container">
      <div class="d-flex justify-content-center">
        <ul class="pagination">
          <li><a href="iqtisodiyot.php?page=<?= ($page > 1) ? $page - 1 : 1 ?>"><i class="bi bi-chevron-left"></i></a></li>
          <?= $links ?>
          <li><a href="iqtisodiyot.php?page=<?= ($page < $totalPages) ? $page + 1 : $totalPages ?>"><i class="bi bi-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>
  </section>

</main>

<?php require 'footer.php'; ?>
