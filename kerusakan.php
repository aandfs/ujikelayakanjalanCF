<?php
require_once "koneksi/init.php";
include 'header.php';
require_once 'koneksi/session.php';


$error = '';
/* menampilkan data*/
$klkerusakan  = tampilkan();
$kerusakans    = tampilkan_kerusakan();
$tampil_kerusakans = tampilkan_kerusakans();

/* menambah data data*/
if (isset($_POST['submit'])) {
  $kdkerusakan     = htmlspecialchars($_POST['kdkerusakan']);
  $kerusakan       = htmlspecialchars($_POST['kerusakan']);
  $kdklkerusakan   = htmlspecialchars($_POST['kdklkerusakan']);
  $mb   = $_POST['mb'];

  if (!empty(trim($kerusakan)) && !empty(trim($mb))) {

    if (tambah_kerusakan($kdkerusakan, $kerusakan, $kdklkerusakan, $mb)) {
      header('Location: kerusakan.php');
    } else {
      $error = 'ada masalah saat menambah data';
    }
  } else {
    $error = 1;
  }
}

/* get id edit data*/
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  if ($error = 1) {
    $error = 1;
  }
}

/* pagination */
$halperpage = 10;
$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$mulai = ($page > 1) ? ($page * $halperpage) - $halperpage : 0;
$total = mysqli_num_rows($kerusakans);
$pages = ceil($total / $halperpage);
$query = mysqli_query($link, "SELECT kerusakan.kdkerusakan, kerusakan.kerusakan, kerusakan.mb, klkerusakan.namaklkerusakan
          FROM kerusakan
          LEFT JOIN klkerusakan
          ON  kerusakan.kdklkerusakan = klkerusakan.kdklkerusakan
          ORDER BY kerusakan.kdkerusakan LIMIT $mulai, $halperpage");
$no = $mulai + 1;
$previous_page = $page - 1;
$next_page = $page  + 1;



?>

<body>

  <div class="size">

    <h1>Kerusakan</h1>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="6">
            <button type="submit" class="btn btn-sm btn-info pull-left" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i> <b>Tambah Data Kerusakan</b></button>
          </th>
        </tr>
        <tr>
          <th width="10%">Kode</th>
          <th width="40%">Kerusakan</th>
          <th width="30%">Kelompok Kerusakan</th>
          <th width="10%">MB</th>
          <th width="10%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while ($row = mysqli_fetch_assoc($query)) : ?>
            <td><?= $row['kdkerusakan']; ?></td>
            <td><?= $row['kerusakan']; ?></td>
            <td><?= $row['namaklkerusakan']; ?></td>
            <td><?= $row['mb']; ?></td>
            <td>
              <a href="#editkerusakan<?php echo $row['kdkerusakan']; ?>" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i></a>
              &nbsp;<a href="kerusakan_hapus.php?kdkerusakan=<?= $row['kdkerusakan']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
              <?php include('kerusakan_modal.php'); ?>
            </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>

    <!-- alert post -->
    <?php if ($error == 1) : ?>
      <div class="alert alert-danger" role="alert">
        Kerusakan dan MB Harus Diisi
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>


    <!-- pagination -->
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="?halaman=<?php echo $previous_page; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <?php for ($i = 1; $i <= $pages; $i++) { ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>

  </div>

  <?php
  include 'footer.php';
  ?>

  <!-- modal tambah data -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahkeruskan">Tambah Data Kerusakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <?php while ($row = mysqli_fetch_assoc($tampil_kerusakans)) : ?>
                <label for="kode" class="col-form-label">Kode Kerusakan</label>
                <?php $kodex = $row['kdkerusakan'];
                $nourut = (int) substr($kodex, 1, 3);
                $nourut++;
                $kodeawal = "L";
                $nourutbaru = $kodeawal . sprintf("%03s", $nourut);
                ?>
                <input type="text" class="form-control" name="kdkerusakan" value="<?= $nourutbaru; ?>">
              <?php endwhile; ?>
              <label for="message-text" class="col-form-label">Kelompok Kerusakan</label>
              <select class="form-control" name="kdklkerusakan">
                <?php while ($row = mysqli_fetch_assoc($klkerusakan)) : ?>
                  <option value="<?= $row['kdklkerusakan']; ?>"><?= $row['namaklkerusakan']; ?></option>
                <?php endwhile; ?>
              </select>
              <label for="message-text" class="col-form-label">Kerusakan</label>
              <input type="text" class="form-control" name="kerusakan">
              <label for="message-text" class="col-form-label">MB</label>
              <input type="text" class="form-control" name="mb">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</body>