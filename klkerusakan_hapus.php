<?php
require_once "koneksi/init.php";

if(isset($_GET['kdklkerusakan'])){
    if(hapus_klkerusakan($_GET['kdklkerusakan'])){
       header('Location: klkerusakan.php');
    }
    else echo 'gagal menghapus data';
}
?>
