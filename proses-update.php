<?php
  include 'koneksi.php';
  $id = $_POST['id'];
  $nama   = $_POST['nama'];
  $namalatin   = $_POST['latin'];
  $linkyt   = $_POST['linkyt'];
  $deskripsi     = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','webp');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'assets/img/'.$nama_gambar_baru);
                  
                    $query  = "UPDATE daftar_tanaman SET nama = '$nama', deskripsi = '$deskripsi', gambar = '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($conn, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error());
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='admin.php';</script>";
                    }
              } else {
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png atau webp.');window.location='create.php';</script>";
              }
    } else {
      $query  = "UPDATE daftar_tanaman SET nama = '$nama', deskripsi = '$deskripsi', latin = '$namalatin', linkyt = '$linkyt'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='admin.php';</script>";
      }
    }

 

