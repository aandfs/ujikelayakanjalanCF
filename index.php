<?php

require_once "koneksi/init.php";
include'header.php';

$error = '';
/* menampilkan data*/
$tampil_kerusakan2   = tampilkan_kerusakan2();
$tampil_tampilkan    = tampilkan();
$tesaja = false;


?>

<body>
    <div class="size">
      <h1>Uji Kelayakan Jalan</h1>
      <form action="hasil.php" method="post">
        <table class="table table-bordered table-hover">
          <thead>
            <?php while($row = mysqli_fetch_assoc($tampil_kerusakan2)):?>
              <?php if($tesaja != $row['namaklkerusakan']): ?>
                <tr>
                  <th colspan="3"><?= $row['namaklkerusakan']; ?></th>
                </tr>
              <?php endif; ?>
          </thead>
          <tbody>
              <tr>
                <td><?= $row['kdkerusakan']; ?></td>
                <td><input id="ikondisi<?php echo $row['kdkerusakan']; ?>" name="ikondisi[]" type="checkbox" value="<?php echo $row['kdkerusakan']; ?>"></td>
                <td><?= $row['kerusakan']; ?></td>
                <?php $tesaja = $row['namaklkerusakan']; ?>
              </tr>
          </tbody>
          <?php endwhile; ?>
        </table>
        <button type="submit" class="btn btn-primary" name="button">Proses</button>
      </form>
    </div>



  <?php
  include'footer.php';
  ?>

</body>
