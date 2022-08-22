<?php 
   
   include "config/koneksi.php";

   $urut = 1;
   $sql = "SELECT member.*, jurusan.* 
                    FROM member
                    INNER JOIN jurusan
                    ON member.jurusan = jurusan.id_jurusan
                      ";
   $hasil = $conn->query($sql);

   if ($hasil === false){
        trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
      } else {
        while ($data = $hasil -> fetch_array()){
          $id = $data['id_mem'];
          $nap = $data['no_mem'];
          $nama = $data['nama_mem'];
          $kelas = $data['kelas'];
          $id_jur = $data['id_jurusan'];
          $jur = $data['nama_jurusan'];
          $sm_jur = $data['singkatan_jurusan'];
          $jk = $data['jk'];
          $alamat = $data['alamat'];
          $telp = $data['no_telp'];
          $lahir = $data['tgl_lahir'];
          $maks = $data['maks'];
 ?>
 <tr>
    <td> <?php echo $urut++ ?> </td>
    <td> <?php echo $nap ?> </td>
    <td> <?php echo $nama ?> </td>
    <td> <?php echo $jk ?> </td>
    <td> <?php echo $kelas ?> </td>
    <td> <?php echo $sm_jur ?> </td>
    <td class="text-center"> 

      <!-- Triger Modal View -->
      <span class="tt" title="Untuk Melihat Data Siswa lebih lengkap" data-bs-placement="bottom">
      <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#view<?php echo $id ?>"><i class="fa-solid fa-circle-info"></i> Detail... </a>
      </span>
      <?php include 'modal_edit.php' ?>

    </td>
 </tr>
 <?php } } ?>