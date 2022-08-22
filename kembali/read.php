<?php 
   
   include "config/koneksi.php";

   $urut = 1;
   $sql = "SELECT * FROM pengembalian";
   $hasil = $conn->query($sql);

   if ($hasil === false){
        trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
      } else {
        while ($data = $hasil -> fetch_array()){
         // $id = $data['id_pinjam'];
         $no_pinjam = $data['no_pinjam'];
         $anggota = $data['nama_anggota'];
         $pustaka = $data['pustaka'];
         $pinjam = $data['tanggal_pinjam'];
         $kembali = $data['tanggal_kembali'];
         $denda = $data['denda'];
         $number = number_format($denda,2,',','.');
         $format = sprintf("Rp %s",$number);
 ?>
 <tr>
    <td> <?php echo $urut++ ?> </td>
    <td> <?php echo $no_pinjam ?> </td>
    <td> <?php echo $anggota ?> </td>
    <td> <?php echo $pustaka ?> </td>
    <td> <?php echo $pinjam ?> </td>
    <td> <?php echo $kembali ?> </td>
    <td> <?php echo $format ?></td>
 </tr>
 <?php } } ?>