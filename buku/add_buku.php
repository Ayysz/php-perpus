<?php 
   
   require "../config/koneksi.php";
   // require "config/proses.php";

   if(isset($_POST['tambah'])){

      $no_buk     = $_POST['noBuk'];
      $judul      = $_POST['judul'];
      $jenis      = $_POST['jenis'];
      $rak        = $_POST['rak'];
      $penerbit   = $_POST['penerbit'];
      $th_terbit  = $_POST['th_terbit'];
      $pengarang  = $_POST['pengarang'];
      $stok       = $_POST['stok'];
      $masuk      = date('Y-m-d',strtotime($_POST['masuk']));

      // ambil data gambar
      // $file       = $_FILES['cover'] ['tmp_name'];
      // $nama_file  = $_FILES['cover'] ['name'];
      // $destinasi  = "cover/". $nama_file;

      // ambil data file yang diupload
      $file        = $_FILES['cover']['tmp_name'];
      $nama_file   = $_FILES['cover']['name'];
      $destinasi = "cover/" . $nama_file;

      $sql = "INSERT INTO buku(
         kode_buk,
         judul,
         jenis,
         rak,
         pengarang,
         penerbit,
         thn_terbit,
         tgl_masuk,
         stok,
         cover
         )
         VALUES(
         '$no_buk',
         '$judul',
         '$jenis',
         '$rak',
         '$pengarang',
         '$penerbit',
         '$th_terbit',
         '$masuk',
         '$stok',
         '$nama_file'
          )
      ";


      // mysqli_query($conn, $sql);
       if($conn->query($sql) === false){

         trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);

       } else {

         // Pindahkan File Gambar ke folder cover
         move_uploaded_file($file, $destinasi);

         echo "<script>alert('Berhasil');window.location='../?p=buku'</script>";
       }


   }
   
 ?>