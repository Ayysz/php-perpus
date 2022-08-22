<!-- Content Here  -->
   
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link" href="?p=report">Peminjaman</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-danger active" href="?p=report&ac=kembali">Pengembalian</a>
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
         <a href="excel/xls-kembali.php" target="_blank" class="btn btn-outline-success fw-bold">
          <i class="fa-solid fa-file-excel fa-xl"></i>
           Export To Excel
         </a>
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