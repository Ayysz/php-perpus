<!-- Content Here -->
   
  <!-- START PHP -->
    <?php 

    $id = $_GET['id'];
    $today = date("d-m-Y");
    // $today = "14-04-2022"; 

    // Menampilkan Member
      $sql = "SELECT dtl_peminjaman.*, buku.judul, member.*, jurusan.nama_jurusan, peminjaman.tgl_pinjam, peminjaman.no_pinjam, peminjaman.id_anggota
                FROM dtl_peminjaman
                JOIN peminjaman
                ON peminjaman.id_pinjam = dtl_peminjaman.id_pinjam
                JOIN member
                ON member.id_mem = peminjaman.id_anggota
                JOIN buku
                ON buku.id_buku = dtl_peminjaman.id_pustaka
                JOIN jurusan
                ON jurusan.id_jurusan = member.jurusan
                WHERE dtl_peminjaman.id = $id";
      
      $q = mysqli_query($conn,$sql);
              
      $data = array();
      while ($row = mysqli_fetch_assoc($q)){
        $data[] = $row;
      }
     ?>
  <!-- END PHP -->

   <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
      <nav aria-label="breadcrumb" class="mx-2">
         <h1>Return Books</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
          <li class="breadcrumb-item"><a href="?p=kembali">Return</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a>add</a></li>

        </ol>
      </nav>

      <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="?p=kembali">Show Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="true">Add Data</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">

                <h3 class="display-6">Detail Transaksi Pengembalian <?php echo $id ?> </h3><hr>

                <div class="row">
                  <!-- Kiri -->
                  <div class="col-4">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title my-1">Detail Member</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-secondary">
                    <?php foreach($data as $mem): ?>
                      <tr>
                        <th>Nomor Member</th>
                        <td>:</td>
                        <td><?php echo $mem['no_mem'] ?></td>
                      </tr>
                      <tr>
                        <th>Nama Member</th>
                        <td>:</td>
                        <td><?php echo ucwords($mem['nama_mem']) ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin </th>
                        <td>:</td>
                        <td><?php echo ucfirst($mem['jk']) ?></td>
                      </tr>
                      <tr>
                        <th>Kelas </th>
                        <td>:</td>
                        <td><?php echo strtoupper($mem['kelas']) ?></td>
                      </tr>
                      <tr>
                        <th>Jurusan </th>
                        <td>:</td>
                        <td><?php echo $mem['nama_jurusan'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                    </table>
                    </div>
                    </div>
                  </div>

                  <!-- Kanan -->
                  <div class="col-8">
                    <div class="card">
                      <div class="card-header">  
                        <h5 class="card-title my-1">Detail Pengembalian</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST">
                          <?php foreach($data as $d): ?>
                            <div class="row mb-3">
                              <label for="no_pinjam" class="col-sm-3">Nomor Peminjaman</label>
                              <div class="col-sm-9">
                                <input type="text" name="code_pinjam" id="no_pinjam" class="form-control" value="<?php echo $d['no_pinjam'] ?>" readonly>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="judul" class="col-sm-3">Judul Pustaka</label>
                              <div class="col-sm-9">
                                <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $d['judul'] ?>" readonly>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="t_pinjam" class="col-sm-3">Tanggal Peminjaman</label>
                              <div class="col-sm-9">
                                <input type="text" name="tgl_pinjam" id="t_pinjam" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['tgl_pinjam'])) ?>" readonly>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="t_kembali" class="col-sm-3">Tanggal Pengembalian</label>
                              <div class="col-sm-9">
                                <input type="text" name="tgl_kembali" id="t_kembali" class="form-control" value="<?php echo $today ?>" readonly>
                              </div>
                            </div>
                            <!-- Hitung Denda -->
                            <?php 
                              $denda = denda(date('d-m-Y', strtotime($d['tgl_pinjam'])),$today);
                              $number = number_format($denda,2,',','.');
                              $format = sprintf("Rp %s",$number);
                            ?>
                            <div class="row mb-3">
                              <label for="denda" class="col-sm-3">Denda</label>
                              <div class="col-sm-9">
                                <input type="text" name="denda_tampilan" id="denda" class="form-control" value="<?php echo $format ?>" readonly>
                                <input type="hidden" name="denda" id="denda" class="form-control" value="<?php echo $denda ?>" readonly>
                              </div>
                            </div>
                            <!-- Hidden input untuk tambahan saat pengembalian -->
                              <input type="hidden" name="id_pin" value="<?php echo $d['id_pinjam'] ?>">
                              <input type="hidden" name="id_anggota" value="<?php echo $d['id_anggota'] ?>">
                              <input type="hidden" name="nama_mem" value="<?php echo $d['nama_mem'] ?>">
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                          <?php endforeach; ?>
                          <div class="row">
                            <div class="col offset-3">
                              <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>

<!-- End Content -->

<?php include "add_kembali.php" ?>
