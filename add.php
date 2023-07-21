<?php
  include('koneksi.php');
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="assets/css/add.css">
  </head>
  <body>
    <form method="POST" action="proses-add.php" enctype="multipart/form-data" >
      <section class="base">
        <center>
          <h1>TAMBAH DATA</h1>
        <center>
        <div class="bungkus-inputan">
          <div>
            <label>Nama Tanaman</label>
            <input type="text" name="nama" autofocus="" required="" />
          </div>
          <div>
            <label>Nama Latin</label>
            <input type="text" name="latin"/>
          </div>
          <div>
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
          </div>
          <div>
            <label>Gambar Tanaman</label>
            <input type="file" name="gambar" required="" />
          </div>
          <div>
            <label>Link Youtube</label>
            <input type="text" name="linkyt"/>
          </div>
        </div>
        <div class="tombol-bawah">
          <button type="submit">Simpan Data</button>
          <a href="admin.php">Kembali</a>
        </div>
      </section>
    </form>
  </body>
</html>
