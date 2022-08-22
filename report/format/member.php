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