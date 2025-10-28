<?php
require('header.php');
include("../sory/users.php");

?>
    
                <!-- End of Topbar -->

       
<div class="container-fluid py-4">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-center">📝 Yangi maqola qo‘shish</h1>

  <div class="card shadow-lg p-4 mb-4">
    <form action="posts/add_posts.php" method="POST" enctype="multipart/form-data">
      
      <div class="mb-3">
        <label for="n_type" class="form-label fw-bold">Maqola turi</label>
        <input type="text" class="form-control" id="n_type" name="n_type" placeholder="Masalan: Texnologiya" required>
      </div>

      <div class="mb-3">
        <label for="author_name" class="form-label fw-bold">Xabar egasi</label>
        <textarea class="form-control" id="author_name" name="author_name" rows="2" placeholder="Muallif ismi" required></textarea>
      </div>

      <div class="mb-3">
        <label for="user_img" class="form-label fw-bold">Profile rasm yuklash</label>
        <input type="file" class="form-control" id="user_img" name="user_img" accept="image/*" required>
      </div>

      <div class="mb-3">
        <label for="title" class="form-label fw-bold">Sarlavha</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Maqola sarlavhasi" required>
      </div>

      <div class="mb-3">
        <label for="content" class="form-label fw-bold">Matn</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Maqola matnini kiriting..." required></textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label fw-bold">Rasm yuklash</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required >
      </div>

      <div class="mb-3">
        <label for="r_time" class="form-label fw-bold">O‘qish vaqti (minutlarda)</label>
        <input type="number" class="form-control" id="r_time" name="r_time" min="1" placeholder="Masalan: 5" required>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
          <i class="fas fa-plus-circle me-2"></i>Qo‘shish
        </button>
      </div>

    </form>
  </div>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>