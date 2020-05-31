<?php

function hasil1($laland){
  $query  = "SELECT * FROM kerusakan WHERE kdkerusakan ='$laland' ";
  return result($query);
}

function tampilkan_password(){
  $query  = "SELECT * FROM login WHERE user ='admin'";
  return result($query);
}

function tampilkan(){
  $query  = "SELECT * FROM klkerusakan";
  return result($query);
}

function tampilkans(){
  $query  = "SELECT * FROM klkerusakan ORDER BY kdklkerusakan  DESC LIMIT 1";
  return result($query);
}

function tampilkan_kerusakan(){
  $query  = "SELECT kerusakan.kdkerusakan, kerusakan.kerusakan, kerusakan.mb, klkerusakan.namaklkerusakan
            FROM kerusakan
            LEFT JOIN klkerusakan
            ON  kerusakan.kdklkerusakan = klkerusakan.kdklkerusakan
            ORDER BY kerusakan.kdkerusakan;";
  return result($query);
}

function tampilkan_kerusakans(){
  $query  = "SELECT kerusakan.kdkerusakan, kerusakan.kerusakan, kerusakan.mb, klkerusakan.namaklkerusakan
            FROM kerusakan
            LEFT JOIN klkerusakan
            ON  kerusakan.kdklkerusakan = klkerusakan.kdklkerusakan
            ORDER BY kerusakan.kdkerusakan DESC LIMIT 1;";
  return result($query);
}

function tampilkan_kerusakan2(){
  $query  = "SELECT kerusakan.kdkerusakan, kerusakan.kerusakan, kerusakan.mb, klkerusakan.namaklkerusakan
            FROM kerusakan
            LEFT JOIN klkerusakan
            ON  kerusakan.kdklkerusakan = klkerusakan.kdklkerusakan
            ORDER BY kerusakan.kdklkerusakan, kerusakan.kdkerusakan ASC;";
  return result($query);
}



function tampilkan_penyebab(){
  $query  = "SELECT * FROM penyebab";
  return result($query);
}


function tampilkan_penyebabs(){
  $query  = "SELECT * FROM penyebab ORDER BY kdpenyebab  DESC LIMIT 1";
  return result($query);
}


function tampilkan_relasi(){
  $query  = "SELECT relasi.kdrelasi, relasi.mb, kerusakan.kerusakan, penyebab.penyebab
            FROM relasi
            LEFT JOIN kerusakan ON  kerusakan.kdkerusakan = relasi.kdkerusakan
            LEFT JOIN penyebab ON  penyebab.kdpenyebab = relasi.kdpenyebab
            /*WHERE kerusakan.kdkerusakan = relasi.kdkerusakan*/
            ORDER BY relasi.kdrelasi;";
  return result($query);
}

function tampilkan_relasis(){
  $query  = "SELECT relasi.kdrelasi, relasi.mb, kerusakan.kerusakan, penyebab.penyebab
            FROM relasi
            LEFT JOIN kerusakan ON  kerusakan.kdkerusakan = relasi.kdkerusakan
            LEFT JOIN penyebab ON  penyebab.kdpenyebab = relasi.kdpenyebab
            /*WHERE kerusakan.kdkerusakan = relasi.kdkerusakan*/
            ORDER BY relasi.kdrelasi  DESC LIMIT 1;";
  return result($query);
}

function tampilkan_relasicari($kdkerusakan){
  $query  = "SELECT relasi.kdrelasi, relasi.mb, kerusakan.kerusakan, penyebab.penyebab
            FROM relasi
            LEFT JOIN kerusakan ON  kerusakan.kdkerusakan = relasi.kdkerusakan
            LEFT JOIN penyebab ON  penyebab.kdpenyebab = relasi.kdpenyebab
            /*WHERE kerusakan.kdkerusakan = relasi.kdkerusakan*/
            WHERE relasi.kdkerusakan='$kdkerusakan' ORDER BY relasi.mb DESC;";
  return result($query);
}


function result($query){
  global $link;
  if($result = mysqli_query($link, $query) or die('gagal menampilkan data')){
    return $result;
  }
}

function escape($data){
  global $link;
  return mysqli_real_escape_string($link, $data);
}


function tambah_klkerusakan($kdklkerusakan, $namaklkerusakan){
  $kdklkerusakan = escape($kdklkerusakan); $namaklkerusakan = escape($namaklkerusakan);

  $query = "INSERT INTO klkerusakan (kdklkerusakan, namaklkerusakan) VALUES ('$kdklkerusakan', '$namaklkerusakan')";
  return run($query);
}

function tambah_kerusakan($kdkerusakan, $kerusakan, $kdklkerusakan, $mb){
  $kerusakan = escape($kerusakan); $mb = escape($mb);

  $query = "INSERT INTO kerusakan (kdkerusakan, kerusakan, kdklkerusakan, mb) VALUES ('$kdkerusakan', '$kerusakan', '$kdklkerusakan', '$mb')";
  return run($query);
}

function tambah_penyebab($kdpenyebab, $penyebab){
  $kdpenyebab = escape($kdpenyebab); $penyebab = escape($penyebab);

  $query = "INSERT INTO penyebab (kdpenyebab, penyebab) VALUES ('$kdpenyebab', '$penyebab')";
  return run($query);
}

function tambah_relasi($kdrelasi, $kdkerusakan, $kdpenyebab, $mb){
  $kdrelasi = escape($kdrelasi); $mb = escape($mb);

  $query = "INSERT INTO relasi (kdrelasi, kdkerusakan, kdpenyebab, mb) VALUES ('$kdrelasi' ,'$kdkerusakan', '$kdpenyebab', '$mb')";
  return run($query);
}


function run($query){
  global $link;

  if(mysqli_query($link, $query)) return true;
  else return false;
}

function edit_klkerusakan($kdklkerusakan, $namaklkerusakan){
  $query = "UPDATE klkerusakan SET kdklkerusakan='$kdklkerusakan', namaklkerusakan='$namaklkerusakan'
            WHERE kdklkerusakan='$kdklkerusakan'";
  return run($query);
}

function edit_kerusakan($kdkerusakan, $kerusakan, $kdklkerusakan, $mb){
  $query = "UPDATE kerusakan SET kdkerusakan='$kdkerusakan', kerusakan='$kerusakan', kdklkerusakan='$kdklkerusakan', mb='$mb'
            WHERE kdkerusakan='$kdkerusakan'";
  return run($query);
}

function edit_penyebab($kdpenyebab, $penyebab){
  $query = "UPDATE penyebab SET kdpenyebab='$kdpenyebab', penyebab='$penyebab'
            WHERE kdpenyebab='$kdpenyebab'";
  return run($query);
}

function edit_relasi($kdrelasi, $kdkerusakan, $kdpenyebab, $mb){
  $query = "UPDATE relasi SET kdrelasi='$kdrelasi', kdkerusakan='$kdkerusakan', kdpenyebab='$kdpenyebab', mb='$mb'
            WHERE kdrelasi='$kdrelasi'";
  return run($query);
}

function edit_password($passbaru){
  $query = "UPDATE login SET pass='$passbaru' WHERE user='admin'";
  return run($query);
}


function hapus_klkerusakan($kdklkerusakan){
  $query = "DELETE FROM klkerusakan WHERE kdklkerusakan='$kdklkerusakan'";
  return run($query);
}

function hapus_kerusakan($kdkerusakan){
  $query = "DELETE FROM kerusakan WHERE kdkerusakan='$kdkerusakan'";
  return run($query);
}

function hapus_penyebab($kdpenyebab){
  $query = "DELETE FROM penyebab WHERE kdpenyebab='$kdpenyebab'";
  return run($query);
}

function hapus_relasi($kdrelasi){
  $query = "DELETE FROM relasi WHERE kdrelasi='$kdrelasi'";
  return run($query);
}

function cek_data($user, $pass){
 $user = escape($user);
 $pass = escape($pass);

 $query = "SELECT * FROM login WHERE user='$user' AND pass='$pass'";
 global $link;

 if($result= mysqli_query($link, $query)){
   if(mysqli_num_rows($result) != 0)return true;
   else return false;
 }
}

 ?>
