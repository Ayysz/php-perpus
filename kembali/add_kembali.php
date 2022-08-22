<?php 
   
   if(isset($_POST['submit'])){

      $id = $_POST['id'];
      $kode = $_POST['code_pinjam'];
      $id_pin = $_POST['id_pin'];
      $judul = $_POST['judul'];
      $anggota = $_POST['nama_mem'];
      $id_mem = $_POST['id_anggota'];
      $t_pinjam = date("Y-m-d", strtotime($_POST['tgl_pinjam']));
      $t_kembali = date("Y-m-d", strtotime($_POST['tgl_kembali']));
      $denda = $_POST['denda'];

      $sql = "INSERT INTO pengembalian
               VALUES(
                  '',
                  '$kode',
                  '$anggota',
                  '$judul',
                  '$t_pinjam',
                  '$t_kembali',
                  '$denda' 
               )";
      if($conn->query($sql) === false){

         trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);

      } else {

         $kurangi = dtl_peminjaman($conn,$id,$id_pin);

         if($kurangi === false){

            echo "<script>alert('Gagal mengurangi/menghapus dtl_peminjaman')</script>";

         } else {

            $sql = "UPDATE member SET maks = maks - 1 WHERE id_mem = $id_mem";

            if($conn->query($sql) === false){

            trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);

            } else {

               echo "<script>alert('Berhasil');window.location='?p=kembali&s=tambah'</script>";
            }

         }


      }

   }

 ?>