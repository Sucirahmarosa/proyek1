<?php
include_once '../function.php';

$result = query("SELECT *FROM produk");

?>
        
    <h1>Produk</h1>
    <table class="table table-dark table-bordered justify-content-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach($result as $pdk): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $pdk["nama_barang"]; ?></td>
                <td><?php echo $pdk["harga_barang"]; ?></td>
                <td><?php echo $pdk["jumlah_barang"]; ?></td>
                <td><img src="img/"<?php echo $pdk["foto_barang"]; ?>></td>
                <td>
                    <a href="ubah.php">Ubah</a>
                    <a href="hapus.php">Hapus</a>
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>
        </tbody>
    </table>
