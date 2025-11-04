
<?php


require('../sory/users.php');
$soni=1;
$page= isset($_GET['page']) ? (int)$_GET['page']:1;
$start=$soni*($page-1);

$query="SELECT COUNT(*) as total FROM contact";

$n=$conn->query($query)->fetch_assoc();

$totalPages = ceil($n['total'] / $soni);
$links= "";
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $page) {
        $links .= "<li class='active'><a href='contact.php?page=$i'>$i</a></li>";
    } else {
        $links .= "<li  ><a href='contact.php?page=$i'>$i</a></li>";
    }
}
$result = $conn->query("SELECT * FROM contact ORDER BY id DESC LIMIT $start, $soni ");
              


   

?>  

<?php

require('header.php')

?>

    
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                         <?php if (!empty($_SESSION['delete'])): ?>
  <div class="alert alert-success text-center">
    <?= $_SESSION['delete']; ?>
  </div>
  <?php unset($_SESSION['delete']); ?>
<?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        <tr>
                                            <th>id</th>
                                            <th>title</th>
                                            <th>message</th>
                                             
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       <tr>
                                            <th>id</th>
                                            <th>title</th>
                                            <th>message</th>
                                             
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php foreach($result as $rec): ?>
                                        
                                        <tr>
                                            <td><?= $rec['id'] ?></td>
                                            <td><?= $rec['email'] ?></td>
                                              <td><?= $rec['message'] ?></td>
                                          <td class="action-buttons">
  <form action="contact/view.php" method="POST" style="display:inline-block;">
    <input type="hidden" name="id" value="<?= htmlspecialchars($rec['id']) ?>">
    <button class="btn-edit" title="Tahrirlash">
      <i class="fas fa-edit"></i> Edit
    </button>
  </form>

  <form action="contact/delete.php" method="POST" style="display:inline-block;">
    <input type="hidden" name="id" value="<?= htmlspecialchars($rec['id']) ?>">

    <button class="btn-delete" title="O‘chirish">
      <i class="fas fa-trash"></i> Delete
    </button>
  </form>
</td>


              </tr> 
        
      <?php endforeach; ?>
      
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
<!-- Pagination 2 Section -->
          <section id="pagination-2" class="pagination-2 section">

            <div class="container">
              <div class="d-flex justify-content-center">
               <ul class="pagination">
    <li>
        <a href="category.php?page=<?= ($page > 1) ? $page - 1 : 1 ?>">
            <i class="bi bi-chevron-left"></i>
        </a>
    </li>

    <?= $links ?>

    <li>
        <a href="category.php?page=<?= ($page < $totalPages) ? $page + 1 : $totalPages ?>">
            <i class="bi bi-chevron-right"></i>
        </a>
    </li>
</ul>
              </div>
            </div>

          </section><!-- /Pagination 2 Section -->  
                </div>
                <!-- /.container-fluid -->
 
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>