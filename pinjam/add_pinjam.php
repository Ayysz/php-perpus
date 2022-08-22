<?php 

   if(isset($_POST['submit'])){

      $id_anggota = $_POST['mem'];
      $qty = $_POST['qty'];
      $pustaka = $_POST['pustaka'];
      $tgl_pinjam = $_POST['t_pinjam'];
      $hitung = count($pustaka);
      $limit = limit_mem($conn,$id_anggota);

      if ($limit < 3){

         $sql = "INSERT INTO peminjaman(id_anggota, tgl_pinjam) 
                  VALUES(
                     '$id_anggota',
                     '$tgl_pinjam'
                  )"
                  ;
         if($conn->query($sql) === false){

            echo "<script>alert('[ERROR LOG] : Tambah id peminjaman');'</script>";
            $err = trigger_error("Cek Perintah SQL Anda : ".$sql. "<br> [Log] Error : ". $conn->error, E_USER_ERROR );
         } else {

            $id_pinjam = id_pinjam($conn);
            // $id_mem = id_mem($conn,$id_anggota);

            // Loop untuk multiple insert detail peminjaman
            for ($x = 0; $x < $hitung; $x++){

               $sql3 = "INSERT INTO dtl_peminjaman (id_pinjam, id_pustaka, qty)
                        VALUES
                        (
                        '$id_pinjam',
                        '$pustaka[$x]',
                        '$qty[$x]'
                        )";

               // Cek Stok
                  $stok = cek_stok($conn,$pustaka[$x]);
                  if ($stok > 0 ){

                      if($conn->query($sql3) === false){
                        
                           $err = trigger_error("Cek Perintah SQL Anda : ".$sql3. "<br> [Log] Error : ". $conn->error, E_USER_ERROR );
                           echo "<script>console.log('".$err."')</script>";
                        } else {
                           maks_member($conn,$id_pinjam,$id_anggota);
                           echo "<script>console.log('Berhasil menambah peminjaman!')</script>";
                        }
                  } else {
                     $_SESSION['err'] = "Stok Buku Kosong";

                     // Hapus Transaksi Peminjaman
                     $apus_tr = dlt_tr($conn, $id_pinjam);
                     if($apus_tr == true){
                        echo "<script>alert('Transaksi Peminjaman Dihapus')</script>";
                     } else{
                        echo "<script>alert('Transaksi Peminjaman Gagal Dihapus')</script>";
                     }
                     
                     echo "<script>alert('error Stok Buku');history.back();</script>";

                  }

            } //end loop

            echo "<script>alert('Berhasil menambah transaksi pinjam');window.location='?p=pinjam&s=tambah'</script>";

         } 
      
      } //close if limit
      else {
         $_SESSION['err'] = "Limit Peminjaman Telah Mencapai Batas";
         echo "<script>alert('error limit pinjam');history.back();</script>";
      }

   } //close isset submit


 ?>