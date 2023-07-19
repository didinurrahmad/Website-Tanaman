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
<html>
<head>
    <title>Data Diri</title>
    <style>
        body {
            text-align: left;
        }
        
        .card-image {
            display: flex;
            justify-content: center;
        }
        
        .card-image img {
            width: 100%;
            border-radius: 18px;
            /* border-top-left-radius: 18px; */
        }
    </style>
</head>
<body>
    <div class="bungkus-inputan">
        <div class="card-image">
            <img src="assets/img/<?php echo $result['gambar']; ?>">
        </div>
        <center>
        <div>
            <h2><?php echo $result['nama']; ?></h2>
        </div>
        </center>
        <div>
            <p><?php echo $result['deskripsi']; ?></p>
        </div>
        <div class="tombol-bawah">
            <a href="tanaman.php">Kembali</a>
        </div>
    </div>
</body>
</html>
