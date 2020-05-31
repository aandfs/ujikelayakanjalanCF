<?php
/* edit data */
require_once "koneksi/init.php";

if (isset($_POST['submit'])) {
	$kdklkerusakan   = htmlspecialchars($_POST['kdklkerusakan']);
	$kdkerusakan     = htmlspecialchars($_POST['kdkerusakan']);
	$kerusakan       = htmlspecialchars($_POST['kerusakan']);
	$mb   = htmlspecialchars($_POST['mb']);

	if (!empty(trim($kerusakan)) && !empty(trim($mb))) {

		if (edit_kerusakan($kdkerusakan, $kerusakan, $kdklkerusakan, $mb)) {
			header('Location: kerusakan.php');
		} else {
			$error = 'ada masalah saat update data';
		}
	} else {
		$error =  'judul dan konten wajib diisi';
		header('Location: kerusakan.php?error=1');
	}
}
