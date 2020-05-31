<?php
require_once "koneksi/init.php";
include'header.php';
require_once 'koneksi/session.php';
$errors =0;
$error ='';
if(isset($_POST['submit'])){
  $passlama     = $_POST['passlama'];
  $passbaru       = $_POST['passbaru'];
  $passkonfirmasi   = $_POST['passkonfirmasi'];

  $tampil_pass = tampilkan_password();
  $row = mysqli_fetch_array($tampil_pass);
  if(!empty(trim($passlama)) && !empty(trim($passbaru)) && !empty(trim($passkonfirmasi))){
    if($row['pass']  == $passlama){
      if($passbaru == $passkonfirmasi){
        if(edit_password($passbaru)){
          $errors=2;
        }else{
            $errors =1;
            $error = 'Ada Masalah Saat Ganti Password';
        }
      }else{
        $errors =1;
        $error = 'Password Baru dan Konfirmasi Password Berbeda';
      }
    }else{
      $errors =1;
      $error = 'Password Lama Salah';
    }
  }else{
    $errors =1;
    $error = 'Password Lama, Password Baru, dan Konfirmasi Password Harus Diisi';
  }
}



?>
<body>

  <div class="size">
    <h1>Ganti Password</h1>

    <form action="" method="post">
      <div class="form-group">
        <div class="col-md-4">
          <label for="message-text" class="col-form-label">Password Lama</label>
          <input type="password" class="form-control" name="passlama" value="">
          <label for="message-text" class="col-form-label">Password Baru</label>
          <input type="password" class="form-control" name="passbaru" value="">
          <label for="message-text" class="col-form-label">Konfirmasi Password Baru</label>
          <input type="password" class="form-control" name="passkonfirmasi" value="">
          <br>
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Ubah Password</button>
        </div>
      </div>
    </form>
    <br>

    <!-- alert post -->
    <?php if($errors == 1): ?>
    <div class="alert alert-danger" role="alert" id="sizealert">
        <?php echo $error ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>

    <?php if($errors == 2): ?>
    <div class="alert alert-success" role="alert" id="sizealert">
        Update Password Berhasil
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>
  </div>

  <?php
   include'footer.php';
   ?>
</body>
