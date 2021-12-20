<?php
require 'function.php';

if( isset($_POST["Register"])){

    if( Registrasi ($_POST) > 0){
        echo "<script>
        alert('user berhasil ditambahkan')
                </script>";
    } else{
        echo mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoKita</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Css -->
    <link rel="stylesheet" href="css/tess.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/282f37c3b4.js" crossorigin="anonymous"></script>
</head>

<body class="body-img">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fs-3 fw-bold" href="index.php">TokoKita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Product
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">All Product</a></li>
                            <li><a class="dropdown-item" href="#">New Product</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
<div class="container login d-flex justify-content-center">
            <div class="bg-login">
                <h1 class="fw-bold text-center">Registrasi</h1>
                <div class="login-method">
                    <form action="" method="post">
                        <div class="textbox">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" placeholder=" Masukan username" name="username" require>
                        </div>
                        <div class="textbox">
                            <i class="fa fa-lock password" aria-hidden="true"></i>
                            <input type="password" placeholder="Masukan password" name="Password" require>
                        </div>
                        <div class="textbox">
                            <i class="fa fa-lock password" aria-hidden="true"></i>
                            <input type="password" placeholder="Masukan password" name="Password2" require>
                        </div>
                        <br>
                    <button type="submit" class="btn log-sub" name="Register">Daftar</button>
                    <p style="color:white">sudah punya akun? <a style="color:greenyellow;" href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
<!-- <section>
    <div class="regis justify-content-center container d-flex pb-4">
        <form action="login.php" method="POST">
             <div class="textbox"></div>
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="Email">
                <br>
                <i class="fa fa-lock password" aria-hidden="true"></i> 
                <input type="password" name="Password" id="Password">
                <br>
                <i class="fa fa-lock password" aria-hidden="true"></i>
                <input type="password" name="Password2" id="Password">
                <br>
                <button type="submit" name="Register">Register</button>
            </div>
        </form>
     </div>
</section> -->
</body>
</html>