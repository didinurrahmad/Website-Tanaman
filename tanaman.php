<?php
   
    require 'koneksi.php';

    if (isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $read_select_sql = "SELECT * FROM daftar_tanaman WHERE nama LIKE '%$keyword%'";
        $result = mysqli_query($conn, $read_select_sql);
    } else {
        $read_sql = "SELECT * FROM daftar_tanaman";
        $result = mysqli_query($conn, $read_sql);
    }

    if (!$result) {
        echo mysqli_error($conn);
    }

    $daftartanaman = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $daftartanaman[] = $row;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tanaman.css">
    <title>Daftar Tanaman</title>
</head>
<body>
    <!-- Navbar -->
    <header>
    <a 
            href="index.php" class="logo">TOGA Center
            <p>Kelurahan Muara Jawa Tengah</p>
        </a>
        <nav>
            <ul class="tombol_header">
                <li><a href="index.php">Beranda</a></li>
                <li><a class="scrll-btn" onclick="contentClick(1)">Tentang</a></li>
            </ul>
        </nav>
        
    </header>
    <br><br>

    <!-- Konten -->
    <div class="content">
        <div class="content-atas">
            <h1 align="center" class="judul"><a href="tanaman.php">Daftar Tanaman</a></h1><br>
            <form action="" method="GET" class="form-srch">
                <div class="form-outline">
                    <input type="text" name="keyword" id="keyword" class="form-control">
                </div>
                <button type="submit" class="button_search" name="search">Cari</button>
            </form>
            <br><br>
        </div>
            
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
                <div class="kartu-satuan">
                    <div class="card">
                        <div class="card-image">
                            <p><img src="assets/img/<?php echo $dtn['gambar']; ?>" style="max-width: auto; max-height: 200px ;"></p>
                        </div>
                    
                        <div class="card-text">
                            <h2 class="name"><?= $dtn["nama"] ?></h2><br>
                            <!-- <h6><?= $dtn["deskripsi"] ?></h6><br> -->
                            
                        </div>
                        
                        <div class="card-action">
                            <div class="act">
                                <a class="tulisan-beli" href="form-detail.php?id=<?=$dtn['id']?>">detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>
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