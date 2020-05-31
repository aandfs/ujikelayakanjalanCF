
      <!-- modal edit data -->
            <div class="modal fade" id="editrelasi<?php echo $row['kdrelasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Relasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <?php
                    /* edit data */
                    $edit=mysqli_query($link,"SELECT relasi.kdrelasi, relasi.mb, kerusakan.kerusakan, penyebab.penyebab, relasi.kdkerusakan, relasi.kdpenyebab
                              FROM relasi
                              LEFT JOIN kerusakan ON  kerusakan.kdkerusakan = relasi.kdkerusakan
                              LEFT JOIN penyebab ON  penyebab.kdpenyebab = relasi.kdpenyebab
                              WHERE relasi.kdrelasi='".$row['kdrelasi']."'");
                    $relasis  = tampilkan_kerusakan();
                    $relasiss  = tampilkan_penyebab();
                    $erow=mysqli_fetch_array($edit);
                    ?>

                    <form method="post" action="relasi_edit.php?<?php echo $erow['kdrelasi']; ?>">
                      <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Relasi</label>
                        <input type="text" class="form-control" name="kdrelasi" value="<?php echo $erow['kdrelasi']; ?>" readonly>
                        <label for="message-text" class="col-form-label">Kerusakan</label>
                        <select class="form-control" name="kdkerusakan">
                          <?php while($eerow = mysqli_fetch_assoc($relasis)):?>
                          <option value="<?= $eerow['kdkerusakan']; ?>" <?php if ($erow['kdkerusakan'] == $eerow['kdkerusakan']  ) echo 'selected' ; ?>><?= $eerow['kerusakan']; ?></option>
                          <?php endwhile; ?>
                        </select>
                        <label for="message-text" class="col-form-label">Penyebab</label>
                        <select class="form-control" name="kdpenyebab">
                          <?php while($eerow = mysqli_fetch_assoc($relasiss)):?>
                          <option value="<?= $eerow['kdpenyebab']; ?>" <?php if ($erow['kdpenyebab'] == $eerow['kdpenyebab']  ) echo 'selected' ; ?>><?= $eerow['penyebab']; ?></option>
                          <?php endwhile; ?>
                        </select>
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
