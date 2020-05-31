<?php
require_once "koneksi/init.php";

if(isset($_GET['kdrelasi'])){
    if(hapus_relasi($_GET['kdrelasi'])){
       header('Location: relasi.php');
    }
    else echo 'gagal menghapus data';
}
?>
