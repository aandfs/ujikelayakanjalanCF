<?php
require_once "koneksi/init.php";
include 'header.php';

if (isset($_SESSION['user'])) {
  header('Location: index.php');
} else {

  $error = 0;

  if (isset($_POST['submit'])) {
    $user  = htmlspecialchars($_POST['user']);
    $pass  = htmlspecialchars($_POST['pass']);

    if (!empty(trim($user)) && !empty(trim($pass))) {

      if (cek_data($user, $pass)) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
      } else {
        $error = 1;
      }
    } else {
      $error = 2;
    }
  }

?>

  <body>

    <div class="size">
      <h1>Login</h1>

      <form action="" method="post">
        <div class="form-group">
          <div class="col-md-4">
            <label for="message-text" class="col-form-label">Username</label>
            <input type="text" class="form-control" name="user" value="">
            <label for="message-text" class="col-form-label">Password</label>
            <input type="password" class="form-control" name="pass" value="">
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
          </div>
        </div>
      </form>
      <br>

      <?php if ($error == 1) : ?>
        <!-- alert post -->
        <div class="alert alert-danger" role="alert" id="sizealert">
          Username dan Password Salah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php elseif ($error == 2) : ?>
        <div class="alert alert-danger" role="alert" id="sizealert">
          Username dan Password Wajib Diisi
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

    <?php } ?>
    </div>

    <?php
    include 'footer.php';
    ?>
  </body>