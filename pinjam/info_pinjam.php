<!-- Content Here -->
   
  <!-- START PHP -->
    <?php 

    $id = $_GET['id'];

    // Menampilkan Member
      $sql = "SELECT peminjaman.*, member.no_mem, member.nama_mem, member.kelas, member.jk, jurusan.nama_jurusan 
              FROM peminjaman 
              JOIN member 
              ON member.id_mem = peminjaman.id_anggota 
              JOIN jurusan 
              ON jurusan.id_jurusan = member.jurusan 
              WHERE peminjaman.id_pinjam = $id";

      $q = mysqli_query($conn,$sql);
              
      $d_mem = array();
      while ($r = mysqli_fetch_assoc($q)){
        $d_mem[] = $r;
      }

    // Menampilkan Detail Peminjaman
      $sql2 = "SELECT dtl_peminjaman.id, peminjaman.tgl_pinjam, dtl_peminjaman.id_pinjam, buku.judul, kategori.kategori, buku.kode_buk, dtl_peminjaman.qty 
                FROM dtl_peminjaman 
                JOIN peminjaman 
                ON peminjaman.id_pinjam = dtl_peminjaman.id_pinjam 
                JOIN buku 
                ON dtl_peminjaman.id_pustaka = buku.id_buku 
                JOIN kategori 
                ON buku.jenis = kategori.id_kategori 
                WHERE peminjaman.id_pinjam = $id";
      
      $q2 = mysqli_query($conn,$sql2);
              
      $data = array();
      $urut = 1;
      while ($row = mysqli_fetch_assoc($q2)){
        $data[] = $row;
      }
     ?>
  <!-- END PHP -->

   <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
      <nav aria-label="breadcrumb" class="mx-2">
         <h1>Borrowing Books</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
          <li class="breadcrumb-item"><a href="?p=pinjam">Borrow</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a>Info </a></li>

        </ol>
      </nav>

      <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="?p=pinjam">Show Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?p=pinjam&ac=tambah">Tambah Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="true">Info Data</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">

                <h3 class="display-6">Detail Transaksi Peminjaman <?php echo $id ?> </h3><hr>

                <div class="row">
                  <!-- Kiri -->
                  <div class="col-4">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title my-1">Detail Member</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-secondary">
                    <?php foreach($d_mem as $mem): ?>
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
                        <h5 class="card-title my-1">Detail Pustaka</h5>
                      </div>
                      <div class="card-body">
                        <table class="table table-hover ">
                          <caption>Detail Pustaka Yang Dipinjam</caption>
                          <thead class="table-active">
                            <tr>
                              <th width='1' rowspan="2" class="align-middle fs-5 border-bottom border-dark">#</th>
                              <th rowspan="2" class="align-middle border-bottom border-dark">Kode Buku</th>
                              <th colspan="2" class="text-center border-bottom border-dark ">Tanggal</th>
                              <th rowspan="2" class="align-middle border-bottom border-dark">Judul Pustaka</th>
                              <th rowspan="2" class="align-middle border-bottom border-dark ">Jenis</th>
                              <th rowspan="2" width="80" class="align-middle border-bottom border-dark">Qty</th>
                              <th rowspan="2" class="align-middle border-bottom border-dark"></th>
                            </tr>
                            <tr>
                              <th class="text-center" width="100">Pinjam</th>
                              <th class="text-center"width="100" >Tenggat</th>
                            </tr>
                          </thead>
                          <?php foreach ($data as $d): ?>
                            <tbody>
                              <tr>
                                <td><?php echo $urut++ ?></td>
                                <td><?php echo $d['kode_buk'] ?></td>
                                <td><?php echo $d['tgl_pinjam'] ?></td>
                                <td><?php echo date('Y-m-d',strtotime("+7 Day", strtotime($d['tgl_pinjam']))) ?></td>
                                <td><?php echo $d['judul'] ?></td>
                                <td><?php echo $d['kategori'] ?></td>
                                <td><?php echo $d['qty']." pcs" ?></td>
                                <td>
                                  <span class="tt" title="Pengembalian <?php echo "id=".$d['id'] ?>">
                                    <a href="?p=kembali&ac=add&id=<?php echo $d['id'] ?>" class="btn btn-outline-info">
                                      <i class="fa-solid fa-check fa-xl"></i>
                                    </a>
                                  </span>
                                </td>
                              </tr>
                            </tbody>
                          <?php endforeach; ?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>

<!-- End Content -->
