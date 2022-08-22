<!-- Content Here -->
   
   <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
      <nav aria-label="breadcrumb" class="mx-2">
         <h1>Borrowing Books</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a>Borrow</a></li>

        </ol>
      </nav>
      
                <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active"  aria-current="true" href="?p=pinjam">Show Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?p=pinjam&ac=tambah">Tambah Data</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                      <table id="example" class="table table-striped table-hover">
                        <caption>List Pemijaman Perpustakaan</caption>
                          <thead>
                            <th>#</th>
                            <th>Nomor Peminjaman</th>
                            <th>Tanggal Peminjaman</th>
                            <th>No Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Buku yang Dipinjam</th>
                            <th></th>

                          </thead>
                          <tbody>
                             <?php include 'read.php' ?>
                          </tbody>
                      </table>

              </div>

          </div>
<!-- End Content -->