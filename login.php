<?php
session_start();
   if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
require 'function.php';

if( isset($_POST["login"]) ){

    $user = $_POST["username"];
    $password = $_POST["Password"];

    $result = mysqli_query ($conn, "SELECT *FROM user WHERE username = '$user' AND level = 'biasa'");

    //cek email 
    if ( mysqli_num_rows($result) === 1 ){
        
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //sett session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        } 
    }else if( isset($_POST["login"])){
        $user = $_POST["username"];
        $password = $_POST["Password"];

        $result = mysqli_query ($conn, "SELECT *FROM user WHERE username = '$user' AND level = 'admin'");

        //cek email 
        if ( mysqli_num_rows($result) === 1 ){
            
            //cek password
            $row = mysqli_fetch_assoc($result);
            if ($password == $row["password"]) {

                //sett session
                $_SESSION["login"] = true;

                header("Location: admin/home.php");
                exit;
                }
        }
    }
    $error=true;
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
            
        </div>
    </nav>

        <div class="container login d-flex justify-content-center">
            <div class="bg-login">
                <h1 class="fw-bold text-center">Login</h1>
                <div class="login-method">
                    <form action="" method="post">
                         <?php if( isset ($error) ) : ?>
                           <div class="alert alert-dark" role="alert">Maaf username atau password salah!</div>
                         <?php endif; ?>
                        <div class="textbox">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" placeholder="Username" name="username" require>
                        </div>
                        <div class="textbox">
                            <i class="fa fa-lock password" aria-hidden="true"></i>
                            <input type="password" placeholder="Masukan password" name="Password" require>
                        </div>
                        <br>
                    <button type="submit" class="btn log-sub" name="login">Login</button>
                  </form>
                  <div class="te">
                       <p style="color: white;">Anda belum punya akun? <a href="registrasi.php" style="color: greenyellow;">daftar sekarang
                       </a></p>
                  </div>
                </div>
            </div>
        </div>

    <!-- <div class="login">
        <form action="index.php" method="post">
            <ul>
                <li>
                    <label for="Email">Email : </label>
                    <input type="text" name="email" id="email">
                </li>
                <li>
                    <label for="Password">Password : </label>
                    <input type="text" name="password" id="email">
                </li>
                <li>
                    <button name="login" type="submit">Login</button>
                </li>

            </ul>
        </form>
    </div> -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>