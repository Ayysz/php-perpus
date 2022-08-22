<!--Content Here -->
               <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
                  <nav aria-label="breadcrumb" class="mx-2">
                     <h1>Manage Books</h1>
                     <hr>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a>Buku</a></li>
                    </ol>
                  </nav>
                  <div class="card">
                     <div class="card-header">
                        <!-- Button trigger modal -->
                           <button type="button" class="btn btn-info shadow my-2" data-bs-toggle="modal" data-bs-target="#tambahBuku">
                             <i class="fa-solid fa-plus"></i> Add Data
                           </button>
                           <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ></a> -->
                     </div>
                     <?php include 'modal_add.php' ?>
                     <div class="card-body">
                        <div class="table-responsive-xl">
                           <table id="example" class="table table-striped table-hover">
                              <caption>List Pustaka Perpustakaan</caption>
                              <thead>
                                 <tr>
                                    <th width='1'>#</th>
                                    <th width='120'>Kode Pustaka</th>
                                    <th>Judul</th>
                                    <th>Jenis</th>
                                    <th>Nomor Rak</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Stok Buku</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <!-- Inlcude Modal Add -->
                              <?php include 'modal_add.php' ?>
                              <tbody>
                                 <?php include 'read.php' ?>
                              </tbody>
                           </table> 
                        </div>
                     </div>
                  </div>
<!-- End Content Table