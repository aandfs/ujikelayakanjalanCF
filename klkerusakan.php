<?php
require_once "koneksi/init.php";
include 'header.php';
require_once 'koneksi/session.php';

$error = '';
/* menampilkan data*/
$klkerusakan = tampilkan();
$klkerusakans = tampilkans();

/* menambah data data*/
if (isset($_POST['submit'])) {
  $kdklkerusakan     = htmlspecialchars($_POST['kdklkerusakan']);
  $namaklkerusakan = htmlspecialchars($_POST['namaklkerusakan']);

  if (!empty(trim($kdklkerusakan)) && !empty(trim($namaklkerusakan))) {

    if (tambah_klkerusakan($kdklkerusakan, $namaklkerusakan)) {
      header('Location: klkerusakan.php');
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
$total = mysqli_num_rows($klkerusakan);
$pages = ceil($total / $halperpage);
$query = mysqli_query($link, "SELECT * FROM klkerusakan
          ORDER BY kdklkerusakan LIMIT $mulai, $halperpage");
$no = $mulai + 1;
$previous_page = $page - 1;
$next_page = $page  + 1;


?>

<body>

  <div class="size">

    <h1>Kelompok Kerusakan</h1>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="3">
            <button type="submit" class="btn btn-sm btn-info pull-left" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i> <b>Tambah Data Kelompok Kerusakan</b></button>
          </th>
        </tr>
        <tr>
          <th width="10%">Kode</th>
          <th width="80%">Kelompok Kerusakan</th>
          <th width="10%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
          <tr>
            <td><?= $row['kdklkerusakan']; ?></td>
            <td><?= $row['namaklkerusakan']; ?></td>
            <td>
              <a href="#editklkerusakan<?php echo $row['kdklkerusakan']; ?>" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i></a>
              &nbsp;<a href="klkerusakan_hapus.php?kdklkerusakan=<?= $row['kdklkerusakan']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
              <?php include('klkerusakan_modal.php'); ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

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

    <!-- alert post -->
    <?php if ($error == 1) : ?>
      <div class="alert alert-danger" role="alert">
        Kode Kelompok Kerusakan dan Kelompok Kerusakan Harus Diisi
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

  </div>

  <?php
  include 'footer.php';
  ?>

  <!-- modal tambah data -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelompok Kerusakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <?php while ($row = mysqli_fetch_assoc($klkerusakans)) : ?>
                <label for="kode" class="col-form-label">Kode</label>
                <?php $kodex = $row['kdklkerusakan'];
                $nourut = (int) substr($kodex, 1, 3);
                $nourut++;
                $kodeawal = "K";
                $nourutbaru = $kodeawal . sprintf("%03s", $nourut);
                ?>
                <input type="text" class="form-control" name="kdklkerusakan" value="<?= $nourutbaru; ?>">
              <?php endwhile; ?>
              <label for="message-text" class="col-form-label">Kelompok Kerusakan</label>
              <input type="text" class="form-control" name="namaklkerusakan">
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