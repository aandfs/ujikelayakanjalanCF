
<?php
require_once "koneksi/init.php";
include'header.php';
require_once 'koneksi/session.php';



$error = '';
/* menampilkan data*/
$tampil_relasi   = tampilkan_relasi();
$tampil_kerusakan  = tampilkan_kerusakan();
$tampil_penyebab    = tampilkan_penyebab();
$tampil_relasis      = tampilkan_relasis();
/* menambah data data*/
if(isset($_POST['submit'])){
  $kdrelasi         = $_POST['kdrelasi'];
  $kdkerusakan      = $_POST['kdkerusakan'];
  $kdpenyebab       = $_POST['kdpenyebab'];
  $mb               = $_POST['mb'];

  if(!empty(trim($kdrelasi)) && !empty(trim($mb))){

    if(tambah_relasi($kdrelasi, $kdkerusakan, $kdpenyebab, $mb)){
        header('Location: relasi.php');
    }else{
        $error = 'ada masalah saat menambah data';
    }
  }else{
    $error = 1;
  }
}

/* get id edit data*/
if (isset($_GET['error']))
{
   $error=$_GET['error'];
   if ($error=1)
{
   $error=1;
}
}

/* pagination */
$halperpage = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
$total = mysqli_num_rows($tampil_relasi);
$pages = ceil($total/$halperpage);
$query = mysqli_query($link, "SELECT relasi.kdrelasi, relasi.mb, kerusakan.kerusakan, penyebab.penyebab
          FROM relasi
          LEFT JOIN kerusakan ON  kerusakan.kdkerusakan = relasi.kdkerusakan
          LEFT JOIN penyebab ON  penyebab.kdpenyebab = relasi.kdpenyebab
          /*WHERE kerusakan.kdkerusakan = relasi.kdkerusakan*/
          ORDER BY relasi.kdrelasi LIMIT $mulai, $halperpage")or die(mysql_error);
$no = $mulai+1;
$previous_page = $page - 1;
$next_page = $page  + 1;

 ?>
<body>

  <div class="size">

    <h1>Relasi Penyebab</h1>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="3">
              <button type="submit" class="btn btn-sm btn-info pull-left" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i> <b>Tambah Data Relasi</b></button>
          </th>
        </tr>
        <tr>
          <th width="10%">Kode<//th>
          <th width="30%">Kerusakan</th>
          <th width="40%">Penyebab</th>
          <th width="10%">MB</th>
          <th width="10%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while($row = mysqli_fetch_assoc($query)):?>
          <td><?= $row['kdrelasi']; ?></td>
          <td><?= $row['kerusakan']; ?></td>
          <td><?= $row['penyebab']; ?></td>
          <td><?= $row['mb']; ?></td>
          <td>
            <a href="#editrelasi<?php echo $row['kdrelasi']; ?>" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i></a>
            &nbsp;<a href="relasi_hapus.php?kdrelasi=<?= $row['kdrelasi']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
            <?php include('relasi_modal.php'); ?>
          </td>
        </tr>
          <?php endwhile; ?>
        </tbody>
    </table>


        <!-- alert post -->
        <?php if($error == 1): ?>
        <div class="alert alert-danger" role="alert">
          Kode Relasi dan MB Harus Diisi
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
            <?php for ($i=1; $i<=$pages ; $i++){ ?>
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
   include'footer.php';
   ?>


      <!-- modal tambah data -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahkeruskan">Tambah Data Relasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <?php while($row = mysqli_fetch_assoc($tampil_relasis)):?>
                          <label for="kode" class="col-form-label">Kode Penyebab</label>
                          <?php $kodex = $row['kdrelasi'];
                                $nourut = (int) substr($kodex, 1, 3);
                                $nourut++;
                                $kodeawal = "R";
                                $nourutbaru = $kodeawal . sprintf("%03s", $nourut);
                          ?>
                        <input type="text" class="form-control" name="kdrelasi" value="<?=  $nourutbaru; ?>">
                      <?php endwhile; ?>
                        <label for="message-text" class="col-form-label">Kerusakan</label>
                        <select class="form-control" name="kdkerusakan">
                          <?php while($row = mysqli_fetch_assoc($tampil_kerusakan)):?>
                          <option value="<?= $row['kdkerusakan']; ?>"><?= $row['kerusakan']; ?></option>
                          <?php endwhile; ?>
                        </select>
                        <label for="message-text" class="col-form-label">Kondisi Bus</label>
                        <select class="form-control" name="kdpenyebab">
                          <?php while($row = mysqli_fetch_assoc($tampil_penyebab)):?>
                          <option value="<?= $row['kdpenyebab']; ?>"><?= $row['penyebab']; ?></option>
                          <?php endwhile; ?>
                        </select>
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
