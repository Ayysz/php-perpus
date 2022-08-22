
<?php 
  
  require "config/koneksi.php";
   // require "config/proses.php";

   if(isset($_POST['upd'])){

      $id         = $_POST['id_buku'];
      $judul      = $_POST['judul'];
      $jenis      = $_POST['jenis'];
      $rak        = $_POST['rak'];
      $penerbit   = $_POST['penerbit'];
      $th_terbit  = $_POST['th_terbit'];
      $pengarang  = $_POST['pengarang'];
      $stok       = $_POST['stok'];
      $masuk      = date('Y-m-d',strtotime($_POST['masuk']));

      // ambil data file yang diupload
      $file        = $_FILES['cover']['tmp_name'];
      $nama_file   = $_FILES['cover']['name'];
      $destinasi = "buku/cover/" . $nama_file;

      if(empty($nama_file)&&empty($file)){

         $sql = "UPDATE buku SET
            judul = '$judul',
            jenis = '$jenis',
            rak = '$rak',
            pengarang ='$pengarang',
            penerbit = '$penerbit',
            thn_terbit ='$th_terbit',
            tgl_masuk = '$masuk',
            stok ='$stok'
            where id_buku = '$id'
         ";
         // cover ='$nama_file'

         // mysqli_query($conn, $sql);
          if($conn->query($sql) === false){

            trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
          } else {

            echo "<script>alert('Berhasil');window.location='?p=buku&s=edit'</script>";
          }

      } else{
       //Jika User Memasukan Foto

         if(move_uploaded_file($file, $destinasi)){ //Cek Apakah Gambar Berhasil Diupload

            // Untuk Menghapus Foto Lama
            $sqll = "SELECT cover FROM buku WHERE id_buku = '$id'";
            $query = mysqli_query($conn, $sqll);
            $data = mysqli_fetch_array($query);
            $coverLama = $data['cover'];

            //cek gambar apakah ada di dir untuk dihapus
            if(is_file("buku/cover/".$coverLama)){
               unlink("buku/cover/".$coverLama);
            }

            $sql = "UPDATE buku SET
               judul = '$judul',
               jenis = '$jenis',
               rak = '$rak',
               pengarang ='$pengarang',
               penerbit = '$penerbit',
               thn_terbit ='$th_terbit',
               tgl_masuk = '$masuk',
               stok ='$stok',
               cover ='$nama_file'
                where id_buku = '$id'
            ";

            // mysqli_query($conn, $sql);
             if($conn->query($sql) === false){

               trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
             } else {

               echo "<script>alert('Berhasil');window.location='?p=buku&s=edit'</script>";
             }
         }
      
      }


   }

 ?>