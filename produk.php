<?php
session_start();
require_once 'function.php';

    if( !isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

$produk = query("SELECT *FROM produk");

if(isset ($_POST["search"])){
    $produk = cari($_POST["keyword"]);
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
    <link rel="stylesheet" href="css/tess.css">
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="produk.php" class="active nav-link">Produk</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="logout.php" class="btn btn-danger ms-2" type="submit">Logout</a>
                </form> 
                   
            </div>
        </div>
    </nav>
    <!-- Section-->
      <main>
        <section class="produk">
            <div class="container">
                <div class="row">
                    <form action="" method="POST">
                    <div class="input-group mb-3 pt-4">
                        <input class="form-control" placeholder="Cari Produk" type="search" name="keyword" autocomplete="off">
                        <button class="btn btn-primary" type="submit" name="search" id="button-addon2"> Cari </button>
                    </div>
                    </form>
                        <div class="col-sm-12 mb-3">
                            <h2 class="section-tittle text-center fw-bold">PRODUK</h2>
                        </div>
                        <?php foreach ($produk as $pdk):?>
                        <div class="card me-5 pt-5 border-4 mb-3" style="width: 20rem;">
                            <td><img src="Admin/img/<?php echo $pdk["foto_barang"]; ?>" width="200px"></td>   
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $pdk['nama_barang'];?></h5>
                                <h5 class="card-harga">RP. <?php echo $pdk['harga_barang'];?></h5>
                                <p class="car-text"><?php echo substr($pdk['deskripsi_barang'], 0, 40);?></p>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?php echo $pdk['id_barang'];?>">Lihat Detail</a>
                                <a href="https://api.whatsapp.com/send?phone=+6281394671261 &text= hai saya tertarik membeli produk <?php echo $pdk['nama_barang'];?>" class="btn btn-success">Beli </a>
                            </div>
                        </div>
                        <?php endforeach;?>
                </div>
            </div>
        </section>
    
        <!-- Modal tambah data -->
        <?php foreach ($produk as $pdk):?>
                    <div class="modal fade" id="detail<?php echo $pdk['id_barang'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="hidden" value="<?php echo $pdk['id'];?>">
                                        </div>
                                        <div class="form-group">
                                             <center><img src="Admin/img/<?php echo $pdk['foto_barang'];?>" width="250px"></center>
                                        </div>
                                        <div class="form-group pt-2">
                                            <p style="font-size: 15px;">Nama Produk : <?php echo $pdk['nama_barang'];?></p>
                                        </div>
                                        <div class="form-group">    
                                            <p style="font-size: 15px;">Harga Produk : Rp. <?php echo $pdk['harga_barang'];?></p>
                                        </div>
                                        <div class="form-group">
                                            <p style="font-size: 15px;">Deskripsi Produk : <br> <?php echo $pdk['deskripsi_barang'];?></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-cancel btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <a href="https://api.whatsapp.com/send?phone=+6281394671261 &text= hai saya tertarik membeli produk <?php echo $pdk['nama_barang'];?>" class="btn btn-cancel btn-success">Beli</a>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
    <?php endforeach;?>
                 <!-- end modal -->
    </main>
    <br>
    <br>
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