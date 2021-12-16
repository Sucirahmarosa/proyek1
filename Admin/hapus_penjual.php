<?php
require '../function.php';

$conn = mysqli_connect('localhost', 'root', '', 'tokokita');

$id = $_GET["id"];


if( hapusPenjual($id) > 0){
      echo "<script> alert('Data berhasil dihapus');
        document.location.href = 'data_penjual.php';
      </script>";
 }else{
       echo "<script> alert('Data gagal dihapus');
        document.location.href = 'data_penjual.php';
      </script>";
 }

?>