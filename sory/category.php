<?php
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

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Category Postst Section -->
          <section id="category-postst" class="category-postst section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-5">

                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-post-1.webp" alt="" class="img-fluid">
                    </div>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><a href="blog-details.html">Sorts</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-dot"></i> <a href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022</time></a></li>
                      </ul>
                    </div>

                    <h2 class="title">
                      <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                    </h2>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">

                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-post-2.webp" alt="" class="img-fluid">
                    </div>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><a href="blog-details.html">Fashion</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-dot"></i> <a href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022</time></a></li>
                      </ul>
                    </div>

                    <h2 class="title">
                      <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                    </h2>

                  </article>

                </div><!-- End post list item -->

                <div class="col-lg-6">

                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-post-3.webp" alt="" class="img-fluid">
                    </div>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><a href="blog-details.html">Laws</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-dot"></i> <a href="blog-details.html"><time datetime="2022-01-01">Jul 5, 2022</time></a></li>
                      </ul>
                    </div>

                    <h2 class="title">
                      <a href="blog-details.html">Possimus soluta ut id suscipit soluta</a>
                    </h2>

                  </article>

                </div><!-- End post list item -->

                <div class="col-lg-6">

                  <article>

                    <div class="post-img">
                      <img src="assets/img/blog/blog-post-4.webp" alt="" class="img-fluid">
                    </div>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><a href="blog-details.html">Sorts</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-dot"></i> <a href="blog-details.html"><time datetime="2022-01-01">Mar 17, 2022</time></a></li>
                      </ul>
                    </div>

                    <h2 class="title">
                      <a href="blog-details.html">Non rem rerum nam cum quo minus exercitationem.</a>
                    </h2>

                  </article>

                </div><!-- End post list item -->

              </div><!-- End blog posts list -->

            </div>

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

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                <li><a href="#">General <span>(25)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li>
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-1.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-2.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-3.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-4.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-5.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>

  </main>

  <?php
require 'footer.php'
  ?>