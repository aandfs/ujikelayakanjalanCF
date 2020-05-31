<?php
require_once "koneksi/init.php";

if(isset($_GET['kdkerusakan'])){
    if(hapus_kerusakan($_GET['kdkerusakan'])){
       header('Location: kerusakan.php');
    }
    else echo 'gagal menghapus data';
}
?>
