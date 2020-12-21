<?php
require 'function.php'; //function php
$id = $_GET['id'];

if(delete($id)>0){ //memastikan apakah function hapus($id) berhasil untuk terhubung ke database
    echo "<script>alert('APAKAH ANDA YAKIN UNTUK MENGHAPUS DATA INI?');alert('data berhasil dihapus');document.location.href='index.php';</script>";
}else{
    echo "<script>alert('Data Tidak berhasil dihapus');document.location.href='index.php';</script>";
}




?>