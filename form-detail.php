<?php
    if(isset($_GET['id'])){
        $id_barang   =$_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query = mysqli_query($conn, "SELECT * FROM daftar_tanaman WHERE id ='$id_barang'");
    $result = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/detail.css">
    <title>Detail Tanaman</title>
</head>
<body>
<header>
    <a 
        href="index.php" class="logo">TOGA Center
        <p>Kelurahan Muara Jawa Tengah</p>
    </a>
    <nav>
        <ul class="tombol_header">
            <li><a href="tanaman.php">Tanaman</a></li>
            <li><a class="scrll-btn" onclick="contentClick(1)">Tentang</a></li>
        </ul>
    </nav>
</header>
<div class="bungkus-inputan">
        <center>
        <div class="judul-tanaman">
            <h3><?php echo $result['nama']; ?></h3>
        </div>
    </center>
    <div class="card-image">
        <img src="assets/img/<?php echo $result['gambar']; ?>">
    </div>
    <div class="text">
        <p><?php echo $result['deskripsi']; ?></p>
        </div>
        <div class="tombol-bawah">
            <a href="tanaman.php">Link Youtube</a>
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