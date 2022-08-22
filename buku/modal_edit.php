<!-- Modal View -->
<form method="post" enctype="multipart/form-data">
            <div class="modal fade text-start" id="view<?php echo $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                 <div class="modal-content">
                  <div class="modal-header alert-dark">
                     <h4 class="modal-title" id="exampleModalLabel">
                        <i class="fa-solid fa-book-open fa-2x"></i> Informasi Detail Pustaka
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                           <div class="col-12">
                              <!-- <a class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#tabel" data-bs-dismiss="modal">Ubah Tampilan</a> -->
                              <span class="tt" data-bs-placement="left" title="Nomor Pustaka Dibuat Otomatis oleh sistem">
                              <label  for="no">Nomor Pustaka</label> </span>
                              <p class="fs-2 fw-bold"><?php echo $kode ?></p>
                           </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-12">
                              <label class="" for="nama">Judul Pustaka</label>
                              <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku" value="<?php echo $judul ?>">
                           </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-4">
                              <label for="">Jenis Pustaka</label>
                              <select class="form-select" name="jenis" aria-label=".form-select-sm example">
                                  <option value="<?php echo $id_tipe ?>" selected><?php echo $tipe ?></option>
                                  <option >-- Jenis Pustaka --</option>
                                  <?php 
                                  // Select option Sederhana
                                    $sql = "SELECT * FROM kategori";
                                    $q = mysqli_query($conn, $sql);
                                    while($r = mysqli_fetch_array($q)){
                                       echo "<option value=".$r['id_kategori']." >".$r['kategori']."</option>";
                                    }
                                   ?>
                              </select>   
                            </div>
                            <div class="col-4">
                              <label for="rak">Nomor rak</label>
                              <select name="rak" id="rak" class="form-select" id="rak">
                                 <option value="<?php echo $rak ?>" selected><?php echo $rak ?></option>
                                 <option value="">-- Pilih Nomor Rak --</option>
                                 <option value="1">Rak 1</option>
                                 <option value="2">Rak 2</option>
                                 <option value="3">Rak 3</option>
                              </select>
                           </div>
                           <div class="col-4">
                              <span class="tt" data-bs-placement="top" data-bs-html="true" title="<em>Maksimal Stok buku</em> <b>99</b>">
                              <label class="" for="stok">Stok Pustaka</label> </span>
                              <input type="text" name="stok" maxlength="2" class="form-control" id="stok" placeholder="Stok Buku" value="<?php echo $stok ?>">
                           </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-6">
                              <label for="penerbit">Penerbit</label>
                              <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit" value="<?php echo $penerbit ?>">
                           </div>
                           <div class="col-6">
                              <label for="th_terbit">Tahun Terbit</label>
                              <select name="th_terbit" id="th_terbit" class="form-select" id="th_terbit">
                                 <option value="<?php echo $t_terbit ?>" selected><?php echo $t_terbit ?></option>
                                 <option value="">-- Pilih Tahun --</option>
                                    <?php 
                                    // menampilkan tahun terbit dari tahun 1981- hingga tahun sekarang
                                    $tahun = date('Y');

                                    for ($i = $tahun - 31; $i <= $tahun ; $i++) { ?>
                                       <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-6">
                              <label for="pengarang">Pengarang</label>
                              <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang" value="<?php echo $pengarang ?>">
                           </div>
                            <div class="col-6 ">
                               <label  for="masuk">Tanggal Masuk</label>
                               <input type="date" name="masuk" class="form-control" id="masuk" value="<?php echo $masuk ?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                           <div class="col-12">
                              <label for="formFile" class="form-label" style="margin-bottom: -10px;">Lampirkan Cover Buku</label>
                              <input type="file" accept="image/*" onchange="previewImgedit(e);" name="cover" class="form-control" >
                           </div>       
                        </div>
                        <div class="row">
                           <div class="col-12" width="500">
                              <span class="tt" data-bs-placement="left" title="<?php echo $gambar ?>">
                                 <img id="img-preview-edit" src="buku/cover/<?php echo $gambar ?>" width="120" alt="Gambar ">
                              </span>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <input type="hidden" name="id_buku" value="<?php echo $id ?>">
                    <a data-id="<?php echo $id ?>" id="apusBuku" class="btn btn-danger" ><i class="fa-solid fa-trash"></i> Hapus </a>
                   <button class="btn btn-success" name="upd"><i class="fa-solid fa-floppy-disk"></i> Simpan Data </button>
                  </div>
                  </div>
               </div>
            </div>
</form>
 <!-- End View -->


<?php include 'edit_buku.php' ?>