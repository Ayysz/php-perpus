<?php 
   
   include "config/koneksi.php";

   $urut = 1;
   $sql = "SELECT peminjaman.*, member.nama_mem , member.no_mem, sum(dtl_peminjaman.qty) as jumlah
                  FROM peminjaman 
                  JOIN member
                  ON peminjaman.id_anggota = member.id_mem
                  JOIN dtl_peminjaman
                  ON dtl_peminjaman.id_pinjam = peminjaman.id_pinjam
                  GROUP BY dtl_peminjaman.id_pinjam
                  ";
   $hasil = $conn->query($sql);

   if ($hasil === false){
        trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
      } else {
        while ($data = $hasil -> fetch_array()){
         $id = $data['id_pinjam'];
         $no_pinjam = $data['no_pinjam'];
         $t_pinjam = $data['tgl_pinjam'];
         $no_anggota = $data['no_mem'];
         $nama = $data['nama_mem'];
         $jumlah = $data['jumlah'];
 ?>
 <tr>
    <td> <?php echo $urut++ ?> </td>
    <td> <?php echo $no_pinjam ?> </td>
    <td> <?php echo $t_pinjam ?> </td>
    <td> <?php echo $no_anggota ?> </td>
    <td> <?php echo $nama ?> </td>
    <td> <?php echo $jumlah ?> pustaka </td>
    <td>
      <span class="tt" title="Detail Peminjaman <?php echo $id ?>" data-bs-placement="bottom">
         <a class="btn btn-outline-info" href="?p=pinjam&ac=show&id=<?php echo $id ?>">
            <i class="fa-solid fa-barcode fa-xl"></i>
         </a>
      </span>
   </td>

 </tr>
 <?php } } ?>