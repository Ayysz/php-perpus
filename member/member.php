<!--Content Here -->
               <!-- Breadcrumb untuk menunjukan di halaman apa kita  -->
                  <nav aria-label="breadcrumb" class="mx-2">
                     <h1>Manage Member</h1>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="?p=">Homepage</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a>Member</a></li>

                    </ol>
                  </nav>
                  <div class="card">
                     <div class="card-header">
                        <!-- Button trigger modal -->
                           <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#tambahUser">
                             <i class="fa-solid fa-plus"></i> Add Data
                           </button>
                           <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ></a> -->
                     </div>
                     <?php include 'modal_add.php' ?>
                     <div class="card-body">
                        <div class="table-responsive-xl">
                           <table id="example" class="table table-striped table-hover">
                              <caption>List Member Perpustakaan</caption>
                              <thead>
                                 <tr>
                                    <th width='1'>#</th>
                                    <th>NAP</th>
                                    <th>Nama Member</th>
                                    <th width="140">Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
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