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
    mysqli_query($conn, "INSERT INTO user VALUES ('','$user', '$password', 'biasa')");

    return mysqli_affected_rows($conn);
}

// Admin login


?>