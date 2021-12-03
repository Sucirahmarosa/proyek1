<?php

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "tokokita");

//ambil data
function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;   
    }
    return $rows;
}



//Registrasi.php
function Registrasi ($data){
    global $conn;
    $user = strtolower (stripslashes($data ["username"]));
    $password = mysqli_real_escape_string($conn, $data["Password"]);
    $password2 = mysqli_real_escape_string($conn, $data["Password2"]);

    //cek username ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$user'");
    if( mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Email sudah terdaftar, silahkan gunakan email lain')
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai !');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES (null,'$user', '$password', 'biasa')");

    return mysqli_affected_rows($conn);
}

//tambah data 
function tambah($data){
    global $conn;

    //ambil data
    $nama = htmlspecialchars($data["nama_barang"]); 
    $harga  = htmlspecialchars($data["harga_barang"]);
    $jumlah =htmlspecialchars($data["jumlah_barang"]);
    $foto =htmlspecialchars($data["foto_barang"]);
    $deskripsi =htmlspecialchars($data["deskripsi_barang"]);

    //query insert
    $query = "INSERT INTO produk
              VALUES
              (null , '$nama', '$harga', '$jumlah', '$foto', '$deskripsi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//hapus data
function hapus ($id) {
    global $conn;
    $query = "DELETE FROM produk WHERE id_barang = $id";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
}



//update data 
function ubah ($data){
    global $conn;
    
    //ambil data
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_barang"]); 
    $harga  = htmlspecialchars($data["harga_barang"]);
    $jumlah =htmlspecialchars($data["jumlah_barang"]);
    $foto =htmlspecialchars($data["foto_barang"]);
    $deskripsi =htmlspecialchars($data["deskripsi_barang"]);


    $query = "UPDATE produk SET
                nama_barang = '$nama', 
                harga_barang = '$harga',
                jumlah_barang = '$jumlah',
                foto_barang = '$foto',
                deskripsi_barang = '$deskripsi'
                WHERE id_barang = '$id'";
     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>