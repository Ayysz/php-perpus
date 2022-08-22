<!-- Content Here  -->
   
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link bg-danger active" href="?p=report">Peminjaman</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?p=report&ac=kembali">Pengembalian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?p=report&ac=member">Member</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?p=report&ac=pustaka">Pustaka</a>
      </li>

    </ul>
  </div>

 <!-- Main -->
  <div class="card-body text-start" id="report">
    <div class="container-fluid">
     <div class="card">
       <div class="card-header py-3">
         <div class="row">
           <div class="col-sm-2 float-left">
             <img src="assets/img/gl.png" alt="Perpus aing" width="120">
           </div>
           <div class="col-sm-10 float-left">
             <h2 class="display-5">Gotham City Public Library</h2>
             <h6>Gotham city </h6>
             <h6>Phone +182*****</h6>
           </div>
         </div>
       </div>
       <div class="card-body">
         <a onclick="GeneratePdf();" class="btn btn-outline-danger fw-bold mx-2">
          <i class="fa-solid fa-file-pdf fa-xl"></i>
           Export To PDF
          </a>
         <a href="excel/xls-pinjam.php" target="_blank" class="btn btn-outline-success fw-bold">
          <i class="fa-solid fa-file-excel fa-xl"></i>
           Export To Excel
         </a>
         <div class="row">
            <div class="col-12">
              <h4 class="display-6 text-center">Peminjaman Pustaka</h4>
            </div>
             <div class="col-12 table-responsive">
               <table class="table table-hover table-striped table-bordered">
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
  </div>
 <!-- End Main  -->

</div>


<!-- End Content -->