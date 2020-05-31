
<?php
require_once "koneksi/init.php";
include'header.php';
require_once 'koneksi/session.php';


/* menampilkan data*/
$tampil_penyebab    = tampilkan_penyebab();
$tampil_penyebabs    = tampilkan_penyebabs();

/* menambah data data*/
$error = '';
if(isset($_POST['submit'])){
  $kdpenyebab   = $_POST['kdpenyebab'];
  $penyebab       = $_POST['penyebab'];

  if(!empty(trim($kdpenyebab)) && !empty(trim($penyebab))){
    if(tambah_penyebab($kdpenyebab, $penyebab)){
        header('Location: penyebab.php');
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
$total = mysqli_num_rows($tampil_penyebab);
$pages = ceil($total/$halperpage);
$query = mysqli_query($link, "SELECT * FROM penyebab LIMIT $mulai, $halperpage")or die(mysql_error);
$no = $mulai+1;
$previous_page = $page - 1;
$next_page = $page  + 1;

 ?>
<body>

  <div class="size">

    <h1>Penyebab Kerusakan</h1>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="3">
              <button type="submit" class="btn btn-sm btn-info pull-left" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i> <b>Tambah Data Penyebab Kerusakan</b></button>
          </th>
        </tr>
        <tr>
          <th width="10%">No.<//th>
          <th width="80%">Penyebab</th>
          <th width="10%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while($row = mysqli_fetch_assoc($query)):?>
          <td><?= $row['kdpenyebab']; ?></td>
          <td><?= $row['penyebab']; ?></td>
          <td>
            <a href="#editpenyebab<?php echo $row['kdpenyebab']; ?>" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-whatever="@getbootstrap"><i class="fa fa-edit"></i></a>
            &nbsp;<a href="penyebab_hapus.php?kdpenyebab=<?= $row['kdpenyebab']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
            <?php include('penyebab_modal.php'); ?>
          </td>
        </tr>
          <?php endwhile; ?>
        </tbody>
    </table>


    <!-- alert post -->
    <?php if($error == 1): ?>
    <div class="alert alert-danger" role="alert">
      Kode Penyebab dan Penyebab Harus Diisi
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
                    <h5 class="modal-title" id="tambahkeruskan">Tambah Data Penyebab Kerusakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <?php while($row = mysqli_fetch_assoc($tampil_penyebabs)):?>
                          <label for="kode" class="col-form-label">Kode Penyebab</label>
                          <?php $kodex = $row['kdpenyebab'];
                                $nourut = (int) substr($kodex, 1, 3);
                                $nourut++;
                                $kodeawal = "P";
                                $nourutbaru = $kodeawal . sprintf("%03s", $nourut);
                          ?>
                          <input type="text" class="form-control" name="kdpenyebab" value="<?=  $nourutbaru; ?>">
                        <?php endwhile; ?>
                        <label for="message-text" class="col-form-label">Penyebab</label>
                        <input type="text" class="form-control" name="penyebab">
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
