
      <!-- modal edit data -->
            <div class="modal fade" id="editklkerusakan<?php echo $row['kdklkerusakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelompok Kerusakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <?php
                    /* edit data */
                    $edit=mysqli_query($link,"select * from klkerusakan where kdklkerusakan='".$row['kdklkerusakan']."'");
          					$erow=mysqli_fetch_array($edit);

                    ?>
                    <form method="post" action="klkerusakan_edit.php?<?php echo $erow['kdklkerusakan']; ?>">
                      <div class="form-group">
                        <label for="kode" class="col-form-label">Kode</label>
                        <input type="text" class="form-control" name="kdklkerusakan" value="<?php echo $erow['kdklkerusakan']; ?>" readonly>
                        <label for="message-text" class="col-form-label">Kelompok Kerusakan</label>
                        <input type="text" class="form-control" name="namaklkerusakan" value="<?php echo $erow['namaklkerusakan']; ?>">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
