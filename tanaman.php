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
                <h2 align="center"> Tentang Kami
                </h2>
                <br>
                <h5 align="center">-----------------------------------<br>KKN 49 Kelompok 72<br>
                    -----------------------------------<br><br>
                    [Gilang Yuda Pratama]
                    <br><br>
                    [Resya Winda Alya Khalisa]
                    <br><br>
                    [Lestari Jaenal]
                    <br><br>
                    [Via Milasari]
                    <br><br>
                    [Jonathan Rezza Nugraha]
                    <br><br>
                    [Nilla Puspita Sari]
                    <br><br>
                    [Cindy Della Ardana]
                    <br><br>
                    [Imam Rohadi]
                    <br>
                </h5>
            </div>
            <div class="about-tengah">
                <h2 align="center">  Toga Center</h2>
                <h4 align="center"> <br>>>>>>>>> Kelompok 72 <<<<<<<< <br><br> Muara Jawa Tengah <br> Made By <br> </h4>
                <h5 align="center"><br>  > Gilang Yuda Pratama <  </h5>
                <br><br><br>
                <div class="sosmed">
                    <ul class="social">
                        <div class="whatsapp">
                            <li><a href="https://wa.me/6282123511416" ><img src="assets/img/whatsapp.png" class="logo"></a></li>
                        </div>
                        <div class="instagram">
                            <li><a href="https://www.instagram.com/" ><img src="assets/img/instagram.png" class="logo"></a></li>
                        </div>
                        <div class="email">
                            <li><a href="https://www.twitter.com/" ><img src="assets/img/email.png" class="logo"></a></li>
                        </div>
                    </ul>
                </div>

                <div class="copyright">
                    <h6 align="center">copyright &copy;2023 kukar72. <br>designed by <span>Gilang Yuda Pratama</span></h6>
                </div>
            </div>  
            <div class="about-kanan">
                <h2 align="center"> Terima Kasih <br>Kepada :</h2>
                <h5 align="Center"> <br><br>1. Kelurahan Muara Jawa Tengah <br><br> 2. PT. Pertamina Hulu Sanga - Sanga <br><br>3. H. Ary <br><br>4. Ibu Darnah Andi Nohe, S.Si., M.Si.</h5>
            </div>
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