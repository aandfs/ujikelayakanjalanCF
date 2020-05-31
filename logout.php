<?php
require_once "koneksi/init.php";

unset($_SESSION['user']);
session_destroy();

header("Location: login.php");

 ?>
