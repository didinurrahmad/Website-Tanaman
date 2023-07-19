<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Dasboard</title>
</head>
<body>
    
    <header>
        <a href="index.php" class="logo">Tanaman</a>
        <nav>
            <ul class="tombol_header">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tanaman.php">Tanaman</a></li>
            </ul>
        </nav>
        
    </header>
    
    <section class="main">
        <div class="container">
            <div class="main-content">
                <div class="text">
                    <h1>
                        Hallo, 
                        <br> Ini Adalah Website 
                        <br> Nama-Nama Tanaman 
                        <br> yang Kami Buat
                    </h1>
                    <p>
                        Kami menyediakan banyak jenis tanaman yang bisa kalian lihat <br>
                    </p>
                    <form action="tanaman.php" method="post">
                        <button type="submit" name="get-started">Yuk Lihat</button>
                    </form>
                </div>
            </div>
            <div class="banner-logo">
                <img src="assets/img/logo.png" alt="" width=350px height=350px>
            </div>
        </div>
    </section>
</body>
</html>