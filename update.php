<?php
  include 'koneksi.php';
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM daftar_tanaman WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='admin.php';</script>";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="assets/css/update.css">
  </head>
  <body>
    <br><br><br><br>
    <form method="POST" action="proses-update.php" enctype="multipart/form-data" >
      <section class="base">
        <center>
          <h1>EDIT DATA</h1>
          <h4><br><br> &quot;<?php echo $data['nama']; ?>&quot;</h3>
        <center>
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Tanaman :</label>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi :</label>
          <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        <div>
          <label>Gambar Tanaman :</label>
          
          <input type="file" name="gambar" />
          <i style="padding-top: 5px; float: left;font-size: 11px;color: red">&#42; Abaikan jika tidak merubah gambar produk</i>
        </div><br>
        <div class="tombol-bawah">
          <a href="admin.php">Kembali</a>
          <button type="submit">Simpan Data</button>
        </div>
      </section>
    </form>
  </body>
</html>
