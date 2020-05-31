<?php
require_once "koneksi/init.php";
include'header.php';

if(isset($_SESSION['user'])){
    header('Location: index.php');
}else{

$error = '';

if(isset($_POST['submit'])){
  $user  = $_POST['user'];
  $pass  = $_POST['pass'];

  if(!empty(trim($user)) && !empty(trim($pass))){

    if(cek_data($user, $pass)){
        $_SESSION['user'] = $user;
        header('Location: index.php');
    }else{
        $error = 'ada masalah saat login';
    }

  }else{
    $error = 'nama dan password wajib diisi';
  }
}

?>
<?php } ?>
