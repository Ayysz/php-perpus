<!-- Content Here  -->
   
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
                                 <img id="img-preview-edit" src="../buku/cover/<?php echo $r['cover'] ?>" width="100" alt="Gambar ">
                              </span>
                          </td>
                       </tr>
                       <?php } } ?>
                    </tbody>
               </table>
             </div>
         </div>


<!-- End Content -->