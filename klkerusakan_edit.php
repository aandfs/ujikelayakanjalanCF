<?php
/* edit data */
require_once "koneksi/init.php";

	if(isset($_POST['submit'])){
		$kdklkerusakan  = $_POST['kdklkerusakan'];
	  $namaklkerusakan = $_POST['namaklkerusakan'];


	  if(!empty(trim($kdklkerusakan)) && !empty(trim($namaklkerusakan))){

	    if(edit_klkerusakan($kdklkerusakan, $namaklkerusakan)){
	        header('Location: klkerusakan.php');
	    }else{
	        $error = 'ada masalah saat update data';
	    }

	  }else{
	    $error =  'judul dan konten wajib diisi';
			header('Location: klkerusakan.php?error=1');
	  }
	}



 ?>
