<?php 
   

   include '../config/koneksi.php';
   include '../config/css.php';
   include '../config/js.php';

   $id   = $_GET['id'];

   $sqll = "SELECT cover FROM buku WHERE id_buku = '$id'";
   $query = mysqli_query($conn, $sqll);
   $data = mysqli_fetch_array($query);

      //cek gambar apakah ada di dir untuk dihapus
      if(is_file("cover/".$data['cover'])) // Jika foto ada
      unlink("cover/".$data['cover']);
      
      // Delete Data
      $sql  = "DELETE FROM buku where id_buku = '$id'";
      $q    = mysqli_query($conn,$sql);

      if($q){
         echo "<script>alert('Data Berhasil Dihapus');window.location='../index.php?p=buku&s=hapus'</script>";
      } else {
         trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
      }

   
   
 ?>