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
        <a class="nav-link" href="?p=report&ac=member">Member</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-danger active" href="?p=report&ac=pustaka">Pustaka</a>
      </li>

    </ul>
  </div>

  <!-- Main -->
  <div class="card-body text-start" id="report">
    <div class="container-fluid">
     <div class="card">
       <div class="card-header">
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
         <a onclick="GeneratePdf2();" class="btn btn-outline-danger fw-bold mx-2">
          <i class="fa-solid fa-file-pdf fa-xl"></i>
           Export To PDF
          </a>
         <a href="excel/xls-buku.php" target="_blank" class="btn btn-outline-success fw-bold">
          <i class="fa-solid fa-file-excel fa-xl"></i>
           Export To Excel
         </a>
         <div class="row">
            <div class="col-12">
              <h4 class="display-6 text-center">Pustaka Perpustakaan</h4>
            </div>
             <div class="col-12 table-responsive">
               <table class="table table-hover table-striped table-bordered">
                    <caption>List Pustaka Perpustakaan</caption>
                      <thead>
                         <tr>
                            <th width='1'>#</th>
                            <th>Kode Pustaka</th>
                            <th>Judul</th>
                            <th>Jenis </th>
                            <th>Nomor Rak</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Tanggal_Masuk</th>
                            <th>Stok </th>
                            <th>Cover</th>
                         </tr>
                      </thead>
                    <tbody>
                      <?php 
                         
                         include "config/koneksi.php";

                         $urut = 1;
                         $sql = "SELECT * FROM r_buku";
                         $hasil = $conn->query($sql);

                         if ($hasil === false){
                              trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
                            } else {
                              while ($r = $hasil -> fetch_array()){
                       ?>
                       <tr>
                          <td><?php echo $urut++ ?></td>
                          <td><?php echo $r['kode_buk'] ?></td>
                          <td><?php echo $r['judul'] ?></td>
                          <td><?php echo $r['kategori'] ?></td>
                          <td><?php echo $r['rak'] ?></td>
                          <td><?php echo $r['pengarang'] ?></td>
                          <td><?php echo $r['penerbit'] ?></td>
                          <td><?php echo $r['thn_terbit'] ?></td>
                          <td><?php echo $r['tgl_masuk'] ?></td>
                          <td><?php echo $r['stok'] ?></td>
                          <td>
                            <span class="tt" data-bs-placement="left" title="<?php echo $r['cover'] ?>">
                                 <img id="img-preview-edit" src="buku/cover/<?php echo $r['cover'] ?>" width="100" alt="Gambar ">
                              </span>
                          </td>
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
    </div>
  </div>
 <!-- End Main  -->
</div>


<!-- End Content -->