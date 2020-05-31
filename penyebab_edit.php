<?php
/* edit data */
require_once "koneksi/init.php";

	if(isset($_POST['submit'])){
    $kdpenyebab    = htmlspecialchars($_POST['kdpenyebab']);
    $penyebab     = htmlspecialchars($_POST['penyebab']);

	  if(!empty(trim($kdpenyebab)) && !empty(trim($penyebab))){

	    if(edit_penyebab($kdpenyebab, $penyebab)){
	        header('Location: penyebab.php');
	    }else{
	        $error = 'ada masalah saat update data';
	    }

	  }else{
	    $error =  'judul dan konten wajib diisi';
			header('Location: penyebab.php?error=1');
	  }
	}
