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
              <h1 class="display-6 text-center">Peminjaman Pustaka</h1>
            </div>
             <div class="col-12 table-responsive">
               <table class="table table-hover table-bordered table-striped">
                 <thead>
                   <tr>
                     <th>#</th>
                     <th>Nomor Peminjaman</th>
                     <th>Tanggal Pinjam</th>
                     <th>Nomor Anggota</th>
                     <th>Nama Member</th>
                     <th>Jurusan</th>
                     <th>Pustaka</th>
                     <th>Qty.</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php 
                   // Ambil Data dari view r_peminjaman
                   $sql = "SELECT * FROM r_peminjaman";
                   $urut = 1;
                   $q = mysqli_query($conn, $sql);
                   while ($r = mysqli_fetch_array($q)){

                    ?>
                      <tr>
                        <td><?php echo $urut++ ?></td>
                        <td><?php echo $r['no_pinjam'] ?></td>
                        <td><?php echo $r['tgl_pinjam'] ?></td>
                        <td><?php echo $r['no_mem'] ?></td>
                        <td><?php echo $r['nama_mem'] ?></td>
                        <td><?php echo $r['jurusan'] ?></td>
                        <td><?php echo $r['pustaka'] ?></td>
                        <td><?php echo $r['qty'] ?></td>  
                      </tr>
                   <?php } //close bracket while ?>
                 </tbody>
               </table>
             </div>
          </div>
       </div>
     </div>
    </div>

</body>
</html>