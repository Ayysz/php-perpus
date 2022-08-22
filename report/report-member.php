<!-- Content Here  -->
   
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link" href="?p=report">Peminjaman</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?p=report&ac=kembali">Pengembalian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-danger active" href="?p=report&ac=member">Member</a>
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
         <a href="excel/xls-member.php" target="_blank" class="btn btn-outline-success fw-bold">
          <i class="fa-solid fa-file-excel fa-xl"></i>
           Export To Excel
         </a>
         <div class="row">
            <div class="col-12">
              <h4 class="display-6 text-center">Member Perpustakaan</h4>
            </div>
             <div class="col-12 table-responsive">
               <table class="table table-hover table-striped table-bordered">
                    <caption>List Member Perpustakaan</caption>
                      <thead>
                         <tr>
                            <th width='1'>#</th>
                            <th>NAP</th>
                            <th>Nama Member</th>
                            <th width="140">Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Tanggal Lahir</th>
                         </tr>
                      </thead>
                    <tbody>
                      <?php 
                         
                         include "config/koneksi.php";

                         $urut = 1;
                         $sql = "SELECT * FROM r_member";
                         $hasil = $conn->query($sql);

                         if ($hasil === false){
                              trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
                            } else {
                              while ($r = $hasil -> fetch_array()){
                       ?>
                       <tr>
                          <td><?php echo $urut++ ?></td>
                          <td><?php echo $r['no_mem'] ?></td>
                          <td><?php echo $r['nama_mem'] ?></td>
                          <td><?php echo $r['jk'] ?></td>
                          <td><?php echo $r['kelas'] ?></td>
                          <td><?php echo $r['nama_jurusan'] ?></td>
                          <td><?php echo $r['alamat'] ?></td>
                          <td><?php echo $r['no_telp'] ?></td>
                          <td><?php echo $r['tgl_lahir'] ?></td>
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