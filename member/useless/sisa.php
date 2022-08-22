         <!-- 
            
            Jadi Ini Untuk kode kode yang tidak terpakai sebelumnya karna takut saya berubah pikiran jadi ingin menggunakan yang lama

         -->
         
         <!-- Form edit -->
            <form action="proses/edit_mem.php" method="post" id="edit">
                     <?php
                     // $id_user = $row['id_mem'];
                     // $query = "SELECT * FROM member WHERE id_mem='$id_user'";
                     // $result = mysqli_query($conn, $query);
                     // while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                     <!-- <div class="row clearfix">
                        <div class="col-2">
                        <img src="assets/img/card1.jpg" width="180" class="rounded float-right" alt="...">
                        </div>
                     </div> -->
                     <div class="row pb-2">
                        <div class="col-12">
                           <input type="hidden" readonly name="id_mem" class="form-control" id="id_mem" placeholder="Auto Generated" value="<?php echo $no ?>" >
                        </div>
                     </div>
                     <div class="row pb-2">
                        <div class="col-12">
                           <label class="" for="no">Nomor Anggota</label>
                           <input type="text" readonly name="nap" class="form-control no" id="no" placeholder="Auto Generated" value="<?php echo $no_mem; ?>"b >
                        </div>
                     </div>
                     <div class="row pb-2">
                        <div class="col-12">
                           <label class="" for="nama">Nama Anggota</label>
                           <input type="text" readonly name="nama" class="form-control nama" id="nama" value="<?php echo $nama ?>" placeholder="Nama Anggota" >
                        </div>
                     </div>
                     <div class="row pb-2">
                        <div class="col-3">
                           <label for="">Kelas</label>
                           <select class="form-select" disabled name="kelas" id="kelas" aria-label=".form-select-sm example">
                             <option >Kelas</option>
                             <option value="x" >X</option>
                             <option value="xi">XI</option>
                             <option value="xii">XII</option>
                             <option value="xiii">XIII</option>
                          </select>   
                       </div>
                       <div class="col-9">
                        <label for="">Kompetensi Keahlian</label>
                        <select class="form-select jur" disabled name="jurusan" id="jurusan" aria-label=".form-select-sm example">
                          <option selected>Kompetensi Keahlian</option>
                          <option value="TP">Teknik Pemesinan</option>
                          <option value="TKR" >Teknik Kendaraan Ringan</option>
                          <option value="TKJ" >Teknik Komputer Jaringan</option>
                          <option value="DPIB"  >Teknik Gambar Bangunan</option>
                          <option value="BKP" >Teknik Konstruksi Kayu</option>
                          <option value="TFLM" >Teknik Fabrikasi Logam dan Manufakturing</option>
                          <option value="TOI" >Teknik Otomasi Industri</option>
                          <option value="MM">Multimedia</option>
                          <option value="RPL" >Rekayasa Perangkat Lunak</option>
                          <option value="SIJA" >Sistem Informasi Jaringan dan Aplikasi</option>
                       </select>
                    </div>
                 </div>
                 <div class="row pb-2">
                  <div class="col-5">
                     <label class="" for="lahir">Tanggal Lahir</label>
                     <input type="date" name="tg_lahir" disabled maxlength="13" class="form-control" id="lahir" value="<?php echo $lahir ?>" >
                  </div> 
                  <div class="col-7">
                     <span>.....</span>
                     <div class="input-group mb-3">
                        <label class="input-group-text"  for="jk">Jenis Kelamin</label>
                        <select class="form-select" disabled name="jk" id="jk">
                          <option selected>Choose...</option>
                          <option value="laki-laki" >Laki-laki</option>
                          <option value="perempuan" >Perempuan</option>
                       </select>
                    </div>
                 </div>
               </div>
               <div class="row pb-2">
                  <div class="col-5">
                     <label class="" for="telp">Nomor Telpon</label>
                     <input type="text" readonly maxlength="13" class="form-control telp" name="telp" id="telp" value="<?php echo $telp ?>" placeholder="08***********">
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="form-floating">
                       <textarea class="form-control" disabled name="alamat" placeholder="alamat" id="alamate" ><?php echo $alamat ?></textarea>
                       <label for="alamat">Alamat</label>
                    </div>
                 </div>               
               </div>  
               </div>
            </form>


         <!-- table -->
                           <table id="example" class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>NAP</th>
                                       <th>Nama Anggota</th>
                                       <th>Jenis Kelamin</th>
                                       <th>Kelas</th>
                                       <th>Komptensi Keahlian</th>
                                       <th></th>
                                   </tr>
                               </thead>
                                 <?php 
                                    // Menampikan Modal tambah data
                                       include "modal_add.php";
                                   ?> 
                               <tbody>
                                   <?php 
                                       // Menapilkan data 
                                          include "read.php";
                                      
                                    ?>
                               </tbody>
                            </table>

         <?php    // membuat nomor member otomatis [tutor]
   function yo($koneksi) {
      // mengambil data barang dengan kode paling besar
      $query = mysqli_query($koneksi, "SELECT max(id_mem) as kodeTerbesar FROM barang");
      $data = mysqli_fetch_array($query);
      $kodeBarang = $data['kodeTerbesar'];
       
      // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
      // dan diubah ke integer dengan (int)
      $urutan = (int) substr($kodeBarang, 3, 3);
       
      // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
      $urutan++;
       
      // membentuk kode barang baru
      // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
      // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
      // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
      $huruf = "BRG";
      $kodeBarang = $huruf . sprintf("%03s", $urutan);
      echo $kodeBarang;
   } ?>