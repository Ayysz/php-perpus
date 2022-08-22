<?php 
  
  include '../../config/koneksi.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Report Peminjaman</title>
  <!-- <link rel="stylesheet" href="../../assets/css/style.css"> -->
   <!-- Boostrap Link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- Font Awesome Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid">
     <div class="card">
       <!-- <div class="card-header py-3">
         <div class="row">
           <div class="col-sm-12">
             <img src="../../assets/img/gl.png" class="float-start" alt="Perpus aing" width="120">
             <div class="text-center">
               <h5 class="display-5">Gotham City Public Library</h5>
               <h6>Gotham city </h6>
               <h6>Phone +182*****</h6>
             </div>
           </div>
         </div>
       </div> -->
       <div class="card-body">
         <div class="row">
            <div class="col-12">
              <h4 class="display-6 text-center">Pengembalian Pustaka</h4>
            </div>
             <div class="col-12 table-responsive">
               <table class="table table-hover table-striped table-bordered">
                 <caption>List Data Pengembalian Pustka Perpustakaan</caption>
                    <thead>
                      <tr>
                        <th rowspan="2" >#</th>
                        <th rowspan="2" >Nomor Peminjaman</th>
                        <th rowspan="2" >Nama Anggota</th>
                        <th rowspan="2" >Judul Pustaka</th>
                        <th colspan="2" class="text-center ">Tanggal</th>
                        <th rowspan="2" >Denda</th>
                      </tr>
                      <tr>
                        <th>Peminjaman</th>
                        <th>Pengembalian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
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
                    </tbody>
               </table>
             </div>
         </div>
       </div>
     </div>
    </div>

</body>
</html>