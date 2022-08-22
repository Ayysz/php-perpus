<?php 
   

   // Menghitung data member
   function c_mem($conn){
      $sql = "SELECT count(*) FROM member ";
      $result = $conn->query($sql);

      while($row = mysqli_fetch_array($result)) {
          $hasil = $row['count(*)'];
      }
      return $hasil;
   }

   // Menghitung Data buku
   function c_buku($conn){
      $sql = "SELECT count(*) FROM buku ";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)) {
          $hasil = $row['count(*)'];
      }
      return $hasil;
   }

   // Menghitung Data buku pinjam
   function c_pinjam($conn){
      $sql = "SELECT count(*) FROM peminjaman ";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)) {
          $hasil = $row['count(*)'];
      }
      return $hasil;
   }

   // Menghitung Data buku Kembali
   function c_balik($conn){
      $sql = "SELECT count(*) FROM pengembalian ";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)) {
          $hasil = $row['count(*)'];
      }
      return $hasil;
   }
   
   // Menghitung Denda
   function c_denda($conn){
      $sql = "SELECT sum(denda) as total FROM pengembalian ";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)) {
          $hasil = $row['total'];
      }
      return $hasil;
   }
   

   // Function Untuk menampilkan kode buku
    function no_buku($conn){
       $sql = "SELECT max(id_buku) as maks from buku";
       $query = mysqli_query($conn, $sql);
       $data = mysqli_fetch_array($query);
       $no = $data['maks'];

       $urutan = (int) substr($no, 0);
       $urutan++;

       $brg = "P";

       $kode = $brg . sprintf("%04s", $urutan);
       return $kode;
    }
   
   // Function Untuk menampilkan kode peminjaman
       function no_pin($conn){
          $sql = "SELECT max(id_pinjam) as maks from peminjaman";
          $query = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($query);
          $no = $data['maks'];

          $urutan = (int) substr($no, 0);
          $urutan++;

          $kode = sprintf("%05s", $urutan);
          return $kode;
       }

   // Cek Stok
       function cek_stok($conn, $id){
         $sql = "SELECT stok FROM buku WHERE id_buku = $id";
         $q = mysqli_query($conn, $sql);
         $r = mysqli_fetch_assoc($q);
         $stok = $r['stok'];

         return $stok;
       }

   //Cek maks Member
       function limit_mem($conn,$id_mem){
         $SQL = "SELECT maks 
                  FROM member 
                  WHERE id_mem = $id_mem";
         $q = mysqli_query($conn, $SQL);
         $r = mysqli_fetch_assoc($q);
         $maks = $r['maks'];

         return $maks;
       }

   // Mengambil id peminjaman
       function id_pinjam($conn){
         // Mengambil id peminjaman untuk dimasukan ke detail peminjaman
            $sql2 = "SELECT max(id_pinjam) as id FROM peminjaman";
            $query = mysqli_query($conn,$sql2);
            $result = mysqli_fetch_assoc($query);
            $id = $result['id'];

            return $id;
       }

   // Mengambil id anggota
       function id_mem($conn,$id){
         // Mengambil id member untuk mengset maks peminjaman
            $sqli = "SELECT id_mem FROM member WHERE id_mem = $id";
            $query = mysqli_query($conn,$sqli);
            $result = mysqli_fetch_assoc($query);
            $id_mem = $result['id_mem'];

            return $id_mem;
       }

   // maks Member
   function maks_member($conn,$id_pin,$id_mem){
      $sql = "UPDATE member 
               INNER JOIN peminjaman 
               ON peminjaman.id_anggota = member.id_mem
               SET member.maks = ((SELECT maks FROM member WHERE id_mem = $id_mem) +
               (
               SELECT SUM(dtl_peminjaman.qty) as jumlah 
               FROM dtl_peminjaman 
               INNER JOIN peminjaman
                   ON dtl_peminjaman.id_pinjam = peminjaman.id_pinjam
               WHERE peminjaman.id_pinjam = $id_pin
               ))
               WHERE member.id_mem = $id_mem";
      
      if($conn->query($sql) === false){
         $err = trigger_error("Cek Perintah SQL Anda : ".$sql. "<br> [Log] Error : ". $conn->error, E_USER_ERROR );
         echo "<script>alert('[ERROR LOG]: maks member pada proses')'</script>";
      } 
   }

   // Hapus Transaksi peminjaman
      function dlt_tr($conn,$id){
         $sql = "DELETE FROM peminjaman WHERE id_pinjam = $id";

         if($conn->query($sql) === false){
            $err = trigger_error("Cek Perintah SQL Anda : ".$sql. "<br> [Log] Error : ". $conn->error, E_USER_ERROR );
            return false;
         } else {
            return true;
         }

      }

   // Hitung Denda
      function denda($first,$last){
         
         $tanggal_pinjam = date_create($first);
         $tanggal_kembali = date_create($last);
         $selisih = date_diff($tanggal_pinjam,$tanggal_kembali);
         $hari = $selisih->format("%a");
         if ($hari > 10){
            $hari = $hari - 10;
            $denda =  $hari * 2000;
         } else {
            $denda = '0';
         }

         return $denda;
      }

   // Cek qty dtl_peminjaman
      function qty($conn,$id){

         $sql = "SELECT qty FROM dtl_peminjaman WHERE id=$id";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_assoc($query);
         $qty = $result['qty'];

         return $qty;
      }

   // Cek jumlah peminjaman
      function qty_peminjaman($conn,$id){
         $sql = "SELECT sum(dtl_peminjaman.qty) as jumlah 
                  FROM dtl_peminjaman 
                  JOIN peminjaman
                  ON peminjaman.id_pinjam = dtl_peminjaman.id_pinjam
                  WHERE dtl_peminjaman.id_pinjam = $id";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_assoc($query);
         $jumlah = $result['jumlah'];

         return $jumlah;
      }

   // Hapus / kurangin dtl_peminjaman
      function dtl_peminjaman($conn,$id,$id_pin){

         $sql = "DELETE FROM dtl_peminjaman WHERE id = $id";

         $qty = qty($conn,$id);

         // cek apakah jumllah di detail peminjaman lebih dari 1
         if ($qty > 1 ){

            $sql2 = "UPDATE dtl_peminjaman SET qty = qty - 1 WHERE id = $id";
            $q = mysqli_query($conn,$sql2);
            if ($q === true){
               return true;
            } else {
               return false;
            }

         } else {

            $q1 = mysqli_query($conn,$sql);
            if ($q1 === true){
               $jumlah = qty_peminjaman($conn,$id_pin);
               
               // Cek apakah detail peminjaman = 0
               if ($jumlah == null || $jumlah == 0){

                  $sql3 = "DELETE FROM peminjaman WHERE id_pinjam = $id_pin";
                  $q2 = mysqli_query($conn,$sql3);

                  if ($q2 === true){
                     return true;
                  } else {
                     return false;
                  }
               }
               return true;
            } else {
               return false;
            }
         }

      }
 ?>