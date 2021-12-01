<?php
require '../function.php';

$conn = mysqli_connect('localhost', 'root', '', 'tokokita');

$id = $_GET["id"];


if( hapus($id) > 0){
      echo "<script> alert('Data berhasil dihapus');
        document.location.href = 'produk.php';
      </script>";
 }else{
       echo "<script> alert('Data gagal dihapus');
        document.location.href = 'produk.php';
      </script>";
 }

?>