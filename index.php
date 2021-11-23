<?php
session_start();
require 'function.php';

    if( !isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TokoKita</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Css -->
    <link rel="stylesheet" href="css/cssku.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/282f37c3b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fs-3 fw-bold" href="#">TokoKita</a>
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
                <div class="nav-icon">
                    <a href="daftar-order.php">
                        <i class="fas fa-list-ul nav-icon me-2"></i>
                        <span class="badge nav-badges rounded-pill bg-danger"></span>
                        <span class="visually-hidden">unseen order</span>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="cart.php">
                        <i class="fas fa-shopping-cart nav-icon me-5"></i>
                        <span class="badge bg-danger me-1 rounded-pill"></span>
                        <span class="visually-hidden">unseen cart</span>
                    </a>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <button class="btn btn-primary ms-2" type="subit">logout</button>
                </form> 
            </div>
        </div>
    </nav>
    <!-- slide -->
    <div class="container mt-3">
        <div class="row slideku">
            <div class="col-8 h-100">
                <div id="carouselExampleIndicators" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="assets/img/Gambar 2.jpg" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/Gambar.jpg" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/TokoKita.png" class="d-block w-100 h-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-4 h-100">
                <div class="h-50">
                    <img class="h-100 w-100" src="assets/img/TokoKita.png" alt="TokoKita">
                </div>
                <div class="h-50 pt-3">
                    <img class="w-100 h-100" src="assets/img/Gambar 3.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- endslide -->
    <!-- Section-->
    <main>
        <section class="produk">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-tittle text-center fw-bold pt-5">Profil</h2>
                    </div>
                        <div class= "col-sm-6">
                            <p>Halo selamat datang di TokoKita, toko yang menawarkan banyak produk e,emtronik dari yang baru sampai
                            dengan produk lama namun layak guna. TokoKita merupakan website milik salah satu Toko elektronik
                            yang berada dikawasan Bandung. Tujuan dibangunnya sebuah website ini adalah untuk memudahkan pembeli memesan 
                            dan melihat seluruh produk yang kami jual.
                            </p>
                        </div>
                        <div class= "col-sm-6">
                            <p>Halo selamat datang di TokoKita, toko yang menawarkan banyak produk e,emtronik dari yang baru sampai
                            dengan produk lama namun layak guna. TokoKita merupakan website milik salah satu Toko elektronik
                            yang berada dikawasan Bandung. Tujuan dibangunnya sebuah website ini adalah untuk memudahkan pembeli memesan 
                            dan melihat seluruh produk yang kami jual.
                            </p>
                        </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>