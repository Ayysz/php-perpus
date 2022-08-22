<?php 
   
   include "config/koneksi.php";

   $urut = 1;
   $sql = "SELECT buku.*, kategori.kategori, kategori.id_kategori
                  FROM buku
                  JOIN kategori
                  ON buku.jenis = kategori.id_kategori"
                  ;
   $hasil = $conn->query($sql);

   if ($hasil === false){
        trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
      } else {
        while ($data = $hasil -> fetch_array()){
          $id = $data['id_buku'];
          $kode = $data['kode_buk'];
          $judul = $data['judul'];
          $id_tipe = $data['id_kategori'];
          $tipe = $data['kategori'];
          $rak = $data['rak'];
          $pengarang = $data['pengarang'];
          $penerbit = $data['penerbit'];
          $t_terbit = $data['thn_terbit'];
          $masuk = $data['tgl_masuk'];
          $gambar = $data['cover'];
          $stok = $data['stok'];
 ?>
 <tr>
    <td> <?php echo $urut++ ?> </td>
    <td> <?php echo $kode ?> </td>
    <td> <?php echo $judul ?> </td>
    <td> <?php echo $tipe ?> </td>
    <td> <?php echo "Rak - ".$rak ?> </td>
    <td> <?php echo $masuk ?> </td>
    <td> <?php echo ($stok == 0 ) ? '<strong>Habis</strong>' : $stok." pcs"; ?></td>
    <td class="text-center"> 

      <!-- Triger Modal View -->
      <span class="tt" title="Untuk Melihat Data Buku Lebih Lengkap" data-bs-placement="bottom">
      <a class="shadow btn btn-secondary" data-bs-toggle="modal" data-bs-target="#view<?php echo $id ?>"><i class="fa-solid fa-circle-info"></i> Detail... </a>
      </span>
      <?php include 'modal_edit.php' ?>

    </td>
 </tr>
 <?php } } ?>