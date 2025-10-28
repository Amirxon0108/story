<?php
require('../../sory/users.php');

$id = $_POST['id'] ?? '';

$recuest="SELECT * FROM posts WHERE id = '$id'";

$edit=$conn->query($recuest);
$conn->close();


?>
<?php require('../header.php'); ?>


                        <?php foreach($edit as $edits):?>
                        <form action="update.php" method="POST">
                        <div class="card-body">
                            <div class="table-responsive">
                                
                               <div class="mb-3">
                                    <label for="name" class="form-label">title</label>
                                    <input type="text"   name="title" class="form-control" id="name" placeholder=""
                 value="<?= htmlspecialchars($edits['title']) ?>" required>
        </div>
                                </div>
                                <div class="mb-3">
                                    <label for="heading" class="form-label">author name</label>
                                    <input type="text"  value=<?= htmlspecialchars($edits['author_name'] )?>  name="author_name" class="form-control" id="heading" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="information" class="form-label">news type</label>
                                     <textarea class="form-control"    name="n_type" rows="3"><?=  htmlspecialchars($edits["n_type"] )?></textarea>
                                </div>
                                <input type="hidden" name="id" value=<?= $edits["id"] ;?>  class="form-control" id="id" placeholder="">
                                <d  iv class="mb-4">
                                    <button type="submit" class="submit-btn">Yuborish</button>
                                </div>
                            </div>
                        </div>
                    </div>
</form>
<?php endforeach ?>
                </div>
                <!-- /.container-fluid -->

            </div>