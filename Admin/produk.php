<?php
require '../function.php';

$result = query("SELECT *FROM produk");



if(isset ($_POST["submit"])){

  if(tambah($_POST) > 0){  
      echo "<script> alert('Data berhasil ditambahkan');
        document.location.href = 'produk.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal ditambahkan');
      document.location.href = 'produk.php';
      </script>";
      
  }

//cek tambah berhasil tidak 

}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="home.php">TokoKita</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="home.php?halaman=home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="produk.php?halaman=produk">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="pelanggan.php?=pelanggan">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Pelanggan
                        </a>
                        <a class="nav-link" href="logout.php?=logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end nav -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1>Produk</h1>
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                    </button>
                        <table class="table table-dark table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($result as $pdk): ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $pdk["nama_barang"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $pdk["harga_barang"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $pdk["jumlah_barang"]; ?>
                                    </td>
                                    <td><img src="img/" <?php echo $pdk["foto_barang"]; ?>></td>
                                    <td>
                                        <?php echo $pdk["deskripsi_barang"]; ?>
                                    </td>
                                    <td>
                                        <a href="#editdata<?php echo $pdk["id_barang"]; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editdata"
                                        >Ubah</a>
                                        <a href="hapus.php?id=<?php echo $pdk["id_barang"]; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>

                 <!-- Modal tambah data -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                            <input type="text" name="nama_barang" id="nama_barang" for="nama_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang" class="form-label">Harga Barang</label>
                                            <input type="numbers" name="harga_barang" id="harga_barang" for="harga_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                            <input type="number" name="jumlah_barang" id="jumlah_barang" for="jumlah_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_barang" class="form-label">Foto Barang</label>
                                            <input type="file" name="foto_barang" id="foto_barang" for="foto_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                            <input type="teks" name="deskripsi_barang" id="deskripsi_barang" for="deskripsi_barang" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="submit" name="submit" class="btn btn-success" value="tambah">
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                 <!-- end modal -->

                       <!-- Modal edit data -->
                    <div class="modal fade" id="editdata <?php echo $pdk["id_barang"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../function.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                            <input type="text" name="nama_barang" id="nama_barang" for="nama_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang" class="form-label">Harga Barang</label>
                                            <input type="numbers" name="harga_barang" id="harga_barang" for="harga_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                            <input type="number" name="jumlah_barang" id="jumlah_barang" for="jumlah_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_barang" class="form-label">Foto Barang</label>
                                            <input type="file" name="foto_barang" id="foto_barang" for="foto_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                            <input type="teks" name="deskripsi_barang" id="deskripsi_barang" for="deskripsi_barang" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="submit" name="edit" class="btn btn-success" value="edit">
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
            </main>

            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- endfooter -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <scrip src="js/datatables-simple-demo.js"></script>


</body>
</html>