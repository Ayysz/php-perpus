<!-- Modal View -->
<form method="post">
            <div class="modal fade text-start" id="view<?php echo $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                 <div class="modal-content">
                  <div class="modal-header alert-dark">
                     <h4 class="modal-title" id="exampleModalLabel">
                        <i class="fa-solid fa-user-pen fa-2x"></i> Detail Member
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="row pb-2">
                           <div class="col-12">
                              <label  for="no">Nomor Anggota</label>
                              <input type="text" readonly name="nap" class="form-control" id="no" placeholder="Auto Generated" value="<?php echo $nap ?>">
                           </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-12">
                              <label class="" for="nama">Nama Anggota</label>
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anggota" value="<?php echo $nama ?>">
                           </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-3">
                              <label for="">Kelas</label>
                              <select class="form-select" name="kelas" aria-label=".form-select-sm example">
                                  <option >Kelas</option>
                                  <option value="x" <?php echo ($kelas=='x')? 'selected': ''; ?> >X</option>
                                  <option value="xi" <?php echo ($kelas=='xi')? 'selected': ''; ?> >XI</option>
                                  <option value="xii" <?php echo ($kelas=='xii')? 'selected': ''; ?> >XII</option>
                                  <option value="xiii" <?php echo ($kelas=='xiii')? 'selected': ''; ?> >XIII</option>
                              </select>   
                         </div>
                         <div class="col-9">
                           <label for="">Kompetensi Keahlian</label>
                           <select class="form-select" name="jurusan" aria-label=".form-select-sm example">
                            <option value="<?php echo $id_jur ?>" selected><?php echo $jur ?> </option>
                            <option >Kompetensi Keahlian</option>
                                    <?php 
                                       // Select option Sederhana
                                          $sql = "SELECT * FROM jurusan";
                                          $q = mysqli_query($conn, $sql);
                                          while($r = mysqli_fetch_array($q)){
                                             echo "<option value=".$r['id_jurusan']." >".$r['nama_jurusan']."</option>";
                                          }
                                    ?>
                           </select>
                        </div>
                        </div>
                         <div class="row">
                           <div class="col-12">
                              <span>Jenis Kelamin</span>
                              <div class="input-group mb-3">
                                 <select class="form-select form-select" name="jk" aria-label=".form-select-sm example">
                                   <option selected>---Pilih Jenis Kelamin---</option>
                                    <option value="perempuan"  <?php echo ($jk=='perempuan')? 'selected' : '' ; ?> >Perempuan <strong>&#9792;</strong></option>
                                    <option value="laki-laki" <?php echo ($jk=='laki-laki')? 'selected' : '' ; ?> >Laki-laki <strong>&#9794;</strong></option>
                                 </select>
                            </div>
                         </div>
                        </div>
                        <div class="row pb-2">
                           <div class="col-6">
                              <label class="" for="telp">Nomor Telpon</label>
                              <input type="text" maxlength="13" class="form-control" name="telp" id="telp" placeholder="08***********" value="<?php echo $telp ?>">
                           </div>
                              <div class="col-6">
                              <label class="" for="lahir">Tanggal Lahir</label>
                              <input type="date" name="tgl_lahir" maxlength="13" class="form-control" id="lahir" value="<?php echo $lahir ?>">
                           </div> 
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                              <textarea name="alamat" placeholder="Jl.haji makmur no.12" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $alamat ?></textarea>
                            </div>              
                        </div>
                     </div>
                  <div class="modal-footer">
                     <input type="hidden" name="id_mem" value="<?php echo $id ?>">
                    <a data-id="<?php echo $id ?>" id="apus" class="btn btn-danger" ><i class="fa-solid fa-trash"></i> Hapus </a>
                   <button class="btn btn-success" name="upd"><i class="fa-solid fa-floppy-disk"></i> Simpan Data </button>
                  </div>
                  </div>
               </div>
            </div>
</form>
          <!-- End View -->
<?php include 'edit_mem.php' ?>