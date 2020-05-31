<?php
/* edit data */
require_once "koneksi/init.php";

	if(isset($_POST['submit'])){
		$kdrelasi   = htmlspecialchars($_POST['kdrelasi']);
    $kdkerusakan     = htmlspecialchars($_POST['kdkerusakan']);
    $kdpenyebab      = htmlspecialchars($_POST['kdpenyebab']);
		$mb             = htmlspecialchars($_POST['mb']);

	  if(!empty(trim($kdrelasi)) && !empty(trim($mb))){

	    if(edit_relasi($kdrelasi, $kdkerusakan, $kdpenyebab, $mb)){
	        header('Location: relasi.php');
	    }else{
	        $error = 'ada masalah saat update data';
	    }

	  }else{
	    $error =  'judul dan konten wajib diisi';
			header('Location: relasi.php?error=1');
	  }
	}
