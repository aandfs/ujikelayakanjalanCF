<?php
/* edit data */
require_once "koneksi/init.php";

	if(isset($_POST['submit'])){
		$kdklkerusakan   = $_POST['kdklkerusakan'];
    $kdkerusakan     = $_POST['kdkerusakan'];
    $kerusakan       = $_POST['kerusakan'];
		$mb   = $_POST['mb'];

	  if(!empty(trim($kerusakan)) && !empty(trim($mb))){

	    if(edit_kerusakan($kdkerusakan, $kerusakan, $kdklkerusakan, $mb)){
	        header('Location: kerusakan.php');
	    }else{
	        $error = 'ada masalah saat update data';
	    }

	  }else{
	    $error =  'judul dan konten wajib diisi';
			header('Location: kerusakan.php?error=1');
	  }
	}



 ?>
