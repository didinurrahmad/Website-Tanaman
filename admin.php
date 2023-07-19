<?php
  include('koneksi.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Menu</title>
    <link rel="stylesheet" href="assets/css/admin.css">
  </head>
  <body>
    <!-- Header -->
    <header>
      <a href="#" class="banner1">Tanaman</a>
      <nav>
          <ul class="tombol_header">
              <li><a href="index.php">Beranda</a></li>
              <li><a class="scrll-btn" onclick="contentClick(1)">Tentang</a></li>
              <li><a href="tanaman.php">Tanaman</a></li>
          </ul>
      </nav>
      
           
    </header>
    <!-- Konten -->
    <div class="content">
      <br><br><br>
      <div class="content-atas">
        <h1 align="center" class="judul">Halaman Maintenance Admin</h1><br>
        <form action="" method="GET" class="form-srch">
          <div class="form-outline">
            <input type="text" name="keyword" id="keyword" class="form-control">
          </div>
          <button type="submit" class="button_search" name="search">Cari</button>
        </form>
        <br><br>
      </div>
    
      <div class="content-tengah">
        <div class="create-btn">
          <form action="add.php" method="post">
              <button type="submit" name="create">+ &nbsp; Tambah data</button>
          </form>
        </div>
        <div class="bungkus-table">
            <table width="100%">
            <thead>
              <tr>
                <th width="50px">Id</th>
                <th width="145px">Action</th>
                <th>Nama</th>
                <th width="200px">Dekripsi</th>
                <th>Gambar</th>
              </tr>
            </thead>
            <tbody>
              <?php
        if(isset($_GET['search'])){
            $keyword = $_GET['keyword'];
            $result = mysqli_query($conn, "SELECT * FROM daftar_tanaman WHERE nama LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'");
        }else {
            $result = mysqli_query($conn, "SELECT * FROM daftar_tanaman");
        }
        $daftartanaman=[];
        while ($row = mysqli_fetch_assoc($result)){
            $daftartanaman[]=$row;
        }
        
        ?>
        <div class="kartu"> 
            <?php $i = 1 ?>
            <?php foreach ($daftartanaman as $dtn) : ?>
               <tr>
                <td align="center"><?php echo $i; ?></td>
                <td>
                  <div class="bungkus-aksi">
                    <a class="aksi" id="edit-btn" href="update.php?id=<?php echo $dtn['id']; ?>">Edit</a>
                    <a class="aksi" id="del-btn" href="delete.php?id=<?php echo $dtn['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                  </div>
                </td>
                <td ><div class="merek"><?php echo $dtn['nama']; ?></div></td>
                <td align="center"><?php echo $dtn['deskripsi']; ?></td>
                <td style="text-align: center;"><img src="assets/img/<?php echo $dtn['gambar']; ?>" style="height: 75px;"></td>
              </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer id="bawah1">
        <div class="isi-footer">
            <div class="about-kiri">
                <h2 align="left"> Tentang Kami</h2><br>
                <h5 align="left"> Jl. Joyomulyo RT. 30 No. 31 <br><br> Samarinda <br><br> Kalimantan Timur <br><br> Indonesia </h5>
                <h5 align="left"> <br><br> Contact Us: <br><br> dicup.store@gmail.com </h5><br>
            </div>
            <div class="about-tengah">
                <h1 align="center"> <br><br> DICUP STORE</h1><br>
                <h5 align="center"> >>>>>>>> Kelompok 15 <<<<<<<< <br><br> Informatika C 2020 <br><br> Made By </h5>
                <h6 align="center"> <br> > Didi Nur Rahmad < <br><br> > Yusuf Adhy Iswanto <</h6><br>
            </div>
            <div class="about-kanan">
                <h2 align="right"> Visi dan Misi</h2><br>
                <h5 align="right"> DICUP STORE <br><br> Selalu Mendampingi <br> di setiap Kesuksesan Anda <br> " Sebagai Toko Laptop <br> Dengan Kualitas Barang <br> Dan Pelayanan TERBAIK " </h5>
                <h5 align="right"> <br><br> Pengen Beli Laptop? <br><br> DICUP STORE Solusinya!</h6><br>
            </div>
        </div>
        
        <div class="sosmed">
            <ul class="social">
                <li><a href="https://wa.me/6282123511416" ><img src="assets/img/whatsapp.png" class="logo"></a></li>
                <li><a href="https://www.facebook.com/" ><img src="assets/img/facebook.png" class="logo"></a></li>
                <li><a href="https://www.instagram.com/" ><img src="assets/img/instagram.png" class="logo"></a></li>
                <li><a href="https://www.twitter.com/" ><img src="assets/img/twitter.png" class="logo"></a></li>
            </ul>
        </div>

        <div class="copyright">
            <h6 align="center">copyright &copy;2020 DicupStore. designed by <span>Didi & Ucup</span></h6>
        </div>
    </footer>
    <script>
        function contentClick(value){
            console.log(value)
            const component = document.getElementById(`bawah${value}`);
            component.scrollIntoView();
        }
    </script>
  </body>
</html>
