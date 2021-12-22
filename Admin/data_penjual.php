<?php
require '../function.php';




//Tambah Data
if(isset ($_POST["submit"])){

  if(tambahPenjual($_POST) > 0){  
      echo "<script> alert('Data berhasil ditambahkan');
        document.location.href = 'data_penjual.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal ditambahkan');
      document.location.href = 'data_penjual.php';
      </script>";
      
  }

}

//edit data
if(isset($_POST["edit"])){
    if( ubahPenjual($_POST) > 0){
        echo "<script> alert('Data berhasil diperbarui');
        document.location.href = 'data_penjual.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal diperbarui');
      document.location.href = 'data_penjual.php';
      </script>";
        }
    }

//pagination
$batas = 1;
$jumlahData = count(query("SELECT *FROM penjual"));
$jumlahHalaman = ceil($jumlahData / $batas);
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awaldata =($batas * $halaman) - $batas;	
$previous = $halaman - 1;
$next = $halaman + 1;

$penjual = query("SELECT *FROM penjual LIMIT $awaldata, $batas"); 


//cari data
if(isset ($_POST["search"])){
    $penjual = cariPenjual($_POST["keyword"]);
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
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="produk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="data_penjual.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Penjual
                        </a>
                       <a class="nav-link" href="../logout.php">
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
                    <h1>Data Penjual</h1>
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                    </button>
                     <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 float-end" action="" method="POST"> 
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari" aria-label="Cari" autocomplete="off" name="keyword"
                                aria-describedby="btnNavbarSearch">
                            <button class="btn btn-primary" type="submit" name="search"><i
                                    class="fas fa-search"></i></button>  
                        </div>
                      </form>
                        <table class="table table-dark table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penjual</th>
                                    <th>Alamat Penjual</th>
                                    <th>Nomor Handphone</th>
                                    <th>Deskripsi Penjual</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($penjual as $pjl): ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $pjl["nama_penjual"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $pjl["alamat_penjual"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $pjl["no_penjual"]; ?>
                                    </td>
                                    <td width="400px">
                                        <?php echo $pjl["deskripsi_penjual"]; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editdata<?php echo $pjl['id']; ?>"
                                        >Ubah</a>
                                        <a href="hapus_penjual.php?id=<?php echo $pjl["id"]; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                           <ul class="pagination justify-content-center">
                                <?php if($halaman > 1) : ?>
                                <li class="page-item"><a class="page-link" <?php echo "href='?halaman=$previous'"?>>Previous</a></li>
                                <?php endif;?>
                                <?php 
                                for($x=1; $x<=$jumlahHalaman; $x++): 
                                    ?>
                                <?php if($x == $halaman): ?>   
                                <li class="page-item"><a class="page-link" style="color: red;" href="?halaman=<?php echo $x ?>"
                                ><?php echo $x; ?></a></li>
                                <?php else :?>
                                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"
                                ><?php echo $x; ?></a></li>
                                <?php endif;?>
                                <?php endfor;?>
                                <?php if($halaman < $jumlahHalaman ) :?>
                                <li class="page-item"><a class="page-link"<?php if($halaman < $jumlahHalaman) { echo "href='?halaman=$next'"; } ?>>Next</a></li>
                                <?php endif;?>
                            </ul>
                        </nav>
                </div>

                 <!-- Modal tambah data -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" for="id" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_penjual" class="form-label">Nama Penjual</label>
                                            <input type="text" name="nama_penjual" id="nama_penjual" for="nama_penjual" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_penjual" class="form-label">Alamat Penjual</label>
                                            <input type="text" name="alamat_penjual" id="alamat_penjual" for="alamat_penjual" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_penjual" class="form-label">Nomor Handphone</label>
                                            <input type="number" name="no_penjual" id="no_penjual" for="no_penjual" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_penjual" class="form-label">Deskripsi Penjual</label>
                                            <input type="text" name="deskripsi_penjual" id="deskripsi_penjual" for="deskripsi_penjual" class="form-control" required>
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
                    <?php foreach($penjual as $pjl): ?>
                    <div class="modal fade" id="editdata<?php echo $pjl['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="hidden" name="id" id="id" for="id" class="form-control" value="<?php echo $pjl['id']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_penjual" class="form-label">Nama Penjual</label>
                                            <input type="text" name="nama_penjual" id="nama_penjual" for="nama_penjual" class="form-control" value="<?php echo $pjl['nama_penjual'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_penjual" class="form-label">Alamat Penjual</label>
                                            <input type="text" name="alamat_penjual" id="alamat_penjual" for="alamat_penjual" class="form-control" value="<?php echo $pjl['alamat_penjual'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_penjual" class="form-label">Nomor Handphone</label>
                                            <input type="number" name="no_penjual" id="no_penjual" for="no_penjual" value="<?php echo $pjl['no_penjual'];?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_penjual" class="form-label">Deskripsi Penjual</label>
                                            <input type="teks" name="deskripsi_penjual" id="deskripsi_penjual" for="deskripsi_penjual" class="form-control" value="<?php echo $pjl['deskripsi_penjual'];?>" required>
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
                    <?php endforeach; ?>
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
    <script src="js/datatables-simple-demo.js"></script>

</body>
</html>