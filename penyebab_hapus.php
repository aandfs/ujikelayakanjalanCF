<?php
require_once "koneksi/init.php";

if(isset($_GET['kdpenyebab'])){
    if(hapus_penyebab($_GET['kdpenyebab'])){
       header('Location: penyebab.php');
    }
    else echo 'gagal menghapus data';
}
?>
