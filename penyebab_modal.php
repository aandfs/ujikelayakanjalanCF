
      <!-- modal edit data -->
            <div class="modal fade" id="editpenyebab<?php echo $row['kdpenyebab']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Penyebab Kerusakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <?php
                    /* edit data */
                    $edit=mysqli_query($link,"select * from penyebab where kdpenyebab ='".$row['kdpenyebab']."'");
          					$erow=mysqli_fetch_array($edit);

                    ?>
                    <form method="post" action="penyebab_edit.php?<?php echo $erow['penyebab']; ?>">
                      <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Penyebab</label>
                        <input type="text" class="form-control" name="kdpenyebab" value="<?php echo $erow['kdpenyebab']; ?>" readonly>
                        <label for="message-text" class="col-form-label">Penyebab Kerusakan</label>
                        <input type="text" class="form-control" name="penyebab" value="<?php echo $erow['penyebab']; ?>">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
