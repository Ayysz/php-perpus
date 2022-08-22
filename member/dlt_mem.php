<?php 
   

   include '../config/koneksi.php';
   include '../config/css.php';
   include '../config/js.php';

   $id   = $_GET['id'];
   $sql  = "DELETE FROM member where id_mem = '$id'";
   $q    = mysqli_query($conn,$sql);

   if($q){
      echo "<script>alert('Data Berhasil Dihapus');window.location='../index.php?p=member&s=hapus'</script>";
   }

 ?>