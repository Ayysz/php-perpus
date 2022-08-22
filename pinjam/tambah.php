<!-- Content Here -->
   
  <!-- START PHP -->
    <?php 



     ?>
  <!-- END PHP -->

   <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
      <nav aria-label="breadcrumb" class="mx-2">
         <h1>Borrowing Books</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
          <li class="breadcrumb-item"><a href="?p=pinjam">Borrow</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a>Tambah</a></li>

        </ol>
      </nav>

      <!-- Alert Info peminjaman -->
      <div class="alert alert-info" role="alert">
        <small>
          <li>Waktu Peminjaman Pustaka Maksimal 10 Hari</li>
          <li>Denda Keterlambatan 2000/hari (2rb/hari)</li>
          <li>Maksimal Peminjaman Setiap Anggota adalah 3 Pustaka</li>
        </small>
      </div>

      <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="?p=pinjam">Show Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="?p=pinjam&ac=tambah">Tambah Data</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">

                     <h3 class="display-6">Transaksi Peminjaman Buku</h3><hr>

                    <form action="" method="POST">
                        
                        <!-- Error Message -->
                        <?php if(!empty($_SESSION['err'])){ ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                          <i class="fa-solid fa-circle-info"></i>
                            <?php 
                              echo $_SESSION['err'];
                            ?> 
                          <buton type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></buton>
                        </div>
                        <?php unset($_SESSION['err']); } //close if emptry session ?>

                        <div class="row mb-3">
                         <label for="t_pinjam" class="col-sm-2 col-form-label">Kode Peminjaman</label>
                         <div class="col-5">
                           <input type="text" class="form-control" name="no_pin" readonly value="<?php echo $kode_pinjol ?>" >
                         </div>
                       </div>
                       <div class="row mb-3">
                         <label for="t_pinjam" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                         <div class="col-5">
                           <input type="text" class="form-control" id="t_pinjam" name="t_pinjam" value="<?php echo $date ?>" >
                         </div>
                         <div class="col-1">
                          <span class="tt" title="Untuk ubah tipe" data-bs-placement="top">
                           <span id="myButton" class="btn btn-info"><i class="fa-solid fa-circle-notch"></i></span>
                           </span>
                         </div>
                       </div>
                       <div class="row mb-3">
                         <label for="" class="col-sm-2 col-form-label">Nama Member</label>
                        <div class="col-5">
                          <select class="form-select" name="mem" aria-label=".form-select-sm example">
                              <option value="" >Nama Member</option>
                              <?php 
                              // Select option Sederhana
                                $sql = "SELECT * FROM member";
                                $q = mysqli_query($conn, $sql);
                                while($r = mysqli_fetch_array($q)){
                                   echo "<option value=".$r['id_mem']." >".$r['no_mem']." -- ".$r['nama_mem']."</option>";
                                }
                               ?>
                          </select>  
                          </div> 
                       </div>

                       <div class="main-container">
                        <div class="buku">
                         <div class="row mb-3">
                             <label for="" class="col-sm-2 col-form-label">Pustaka [1]</label>
                            <div class="col-5">
                             <div class="input-group">
                                <select class="form-select" name="pustaka[]" id="pustaka" aria-label=".form-select-sm example">
                                    <option value="" >Pilih Pustaka</option>
                                    <?php 
                                    // Select option Sederhana
                                      $sql = "SELECT * FROM buku";
                                      $q = mysqli_query($conn, $sql);
                                      while($r = mysqli_fetch_array($q)){
                                         echo "<option value=".$r['id_buku']." >".$r['judul']."</option>";
                                      }
                                     ?>
                                </select>
                                <input type="number" class="form-control" name="qty[]" value="1">
                                <span class="input-group-text">Qty</span>
                              </div> 
                              </div>
                              <div class="col-1">
                              <span class="tt" title="Tambah Data" data-bs-placement="top">
                               <span id="nambahin" class="btn btn-info"><i class="fa-solid fa-plus"></i></span>
                               </span>
                             </div>
                         </div>
                        </div>
                       </div>

                       <button type="submit" name="submit" class="btn btn-success offset-2">Submit</button>
                     </form>
                    
                  </div>
              </div>
          </div>

<!-- End Content -->

<?php include 'add_pinjam.php' ?>