
      <!-- modal edit data -->
            <div class="modal fade" id="editkerusakan<?php echo $row['kdkerusakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kerusakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <?php
                    /* edit data */
                    $edit=mysqli_query($link,"SELECT kerusakan.kdkerusakan, kerusakan.kerusakan, klkerusakan.namaklkerusakan, kerusakan.kdklkerusakan, kerusakan.mb
                              FROM kerusakan
                              LEFT JOIN klkerusakan
                              ON  kerusakan.kdklkerusakan = klkerusakan.kdklkerusakan
                              WHERE kerusakan.kdkerusakan='".$row['kdkerusakan']."'");
                    $klkerusakans  = tampilkan();
                    $erow=mysqli_fetch_array($edit);
                    ?>

                    <form method="post" action="kerusakan_edit.php?<?php echo $erow['kdkerusakan']; ?>">
                      <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Kerusakan</label>
                        <input type="text" class="form-control" name="kdkerusakan" value="<?php echo $erow['kdkerusakan']; ?>" readonly>
                        <label for="message-text" class="col-form-label">Kelompok Kerusakan</label>
                        <select class="form-control" name="kdklkerusakan">
                          <?php while($eerow = mysqli_fetch_assoc($klkerusakans)):?>
                          <option value="<?= $eerow['kdklkerusakan']; ?>" <?php if ($erow['kdklkerusakan'] == $eerow['kdklkerusakan']  ) echo 'selected' ; ?>><?= $eerow['namaklkerusakan']; ?></option>
                          <?php endwhile; ?>
                        </select>
                        <label for="message-text" class="col-form-label">Kerusakan</label>
                        <input type="text" class="form-control" name="kerusakan" value="<?php echo $erow['kerusakan']; ?>">
                        <label for="message-text" class="col-form-label">MB</label>
                        <input type="text" class="form-control" name="mb" value="<?php echo $erow['mb']; ?>">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
