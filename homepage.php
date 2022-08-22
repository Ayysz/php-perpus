<!-- Jumbotron -->
               <div class="jumbotron jumbotron-fluid bg-light rounded-3">
                 <div class="container pt-4">
                   <h1 class="display-3">Welcome , <?php echo $_SESSION['login'] ?> !</h1>
                   <p class="lead">"Jangan pernah nilai buku itu dari sampulnya. Kalo sampulnya jelek, dalemnya belum tentu bagus"</p>
               </div>
               <hr>

            <!-- Card icon -->
                      <div class="row mx-5 ">
                          <div class="col-md-4 col-xl-4">
                              <div class="card bg-c-blue order-card">
                                  <div class="card-block">
                                      <h4 class="m-b-20">Anggota</h4>
                                      <h2 class="text-right"><i class="fa-solid fa-user f-left fa-2xl"></i><span>&nbsp;<?php echo $mem  ?></span></h2>
                                      <p class="m-b-0">&nbsp;Jumlah Anggota Yang Terdaftar<span class="f-right"><?php echo $mem ?></span></p>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="col-md-4 col-xl-4">
                              <div class="card bg-c-green order-card">
                                  <div class="card-block">
                                      <h4 class="m-b-20">Buku</h4>
                                      <h2 class="text-right"><i class="fa-solid fa-book f-left fa-2xl fa-2xl"></i><span>&nbsp; <?php echo $book ?></span></h2>
                                      <p class="m-b-0">&nbsp;Jumlah Buku Saat ini<span class="f-right"><?php echo $book ?></span></p>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="col-md-4 col-xl-4">
                              <div class="card bg-c-pink order-card">
                                  <div class="card-block">
                                      <h4 class="m-b-20">Denda</h4>
                                      <h2 class="text-right"></i><span><?php echo $all_denda ?></span></h2>
                                      <p class="m-b-0">&nbsp;Jumlah Denda Yang Terkumpul<span class="f-right"></span></p>
                                  </div>
                              </div>
                          </div>
                     </div>
                     <div class="row mx-5 justify-content-center">
                        <div class="col-md-4 col-xl-4">
                              <div class="card bg-c-gray order-card">
                                  <div class="card-block">
                                      <h4 class="m-b-20">Dipinjam</h4>
                                      <h2 class="text-right"><i class="fa-solid fa-book f-left fa-2xl"></i><span>&nbsp;<?php echo $borrow ?></span></h2>
                                      <p class="m-b-0">&nbsp;Jumlah Transaksi Peminjaman<span class="f-right"><span><?php echo $borrow ?></span></p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-xl-4">
                              <div class="card bg-c-gray order-card">
                                  <div class="card-block">
                                      <h4 class="m-b-20">Dikembalikan</h4>
                                      <h2 class="text-right"><i class="fa-solid fa-book f-left fa-2xl"></i><span>&nbsp;<?php echo $return ?></span></h2>
                                      <p class="m-b-0">&nbsp;Log Pengembalian<span class="f-right"><?php echo $return ?></span></p>
                                  </div>
                              </div>
                          </div>
                     </div>

<!-- Lanjut Ke bagian index.php?p= -->
<!-- &nbsp; Untuk menambah spasi secara paksa di tempat yang di inginkan / disebut sebagai non-breaking space -->