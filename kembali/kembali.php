<!-- Content Here -->
   
   <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
      <nav aria-label="breadcrumb" class="mx-2">
         <h1>Return Books</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a>Return</a></li>

        </ol>
      </nav>
      
           <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active"  aria-current="true" href="?p=kembali">Show Data</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                      <table id="example" class="table table-striped table-hover">
                        <caption>List Data Pengembalian Pustka Perpustakaan</caption>
                          <thead>
                            <tr>
                              <th rowspan="2" class="border-bottom border-dark">#</th>
                              <th rowspan="2" class="border-bottom border-dark">Nomor Peminjaman</th>
                              <th rowspan="2" class="border-bottom border-dark">Nama Anggota</th>
                              <th rowspan="2" class="border-bottom border-dark">Judul Pustaka</th>
                              <th colspan="2" class="text-center ">Tanggal</th>
                              <th rowspan="2" class="border-bottom border-dark">Denda</th>
                            </tr>
                            <tr>
                              <th>Peminjaman</th>
                              <th>Pengembalian</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php include 'read.php' ?>
                          </tbody>
                      </table>

              </div>

          </div>
<!-- End Content -->