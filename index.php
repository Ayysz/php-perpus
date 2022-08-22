<?php 
   
   // Session Start
   session_start(); 
   ob_start();  

   include "config/koneksi.php";
   include 'template.php';
   include 'config/proses.php';

   //untuk mengecek apakah sudah login atau belum
   if(!isset($_SESSION['login'])){
      echo "<script>alert('Login Terlebih Dahulu');window.location='login.php'</script>";
   }

   // Session message erro
   $_SESSION['error'] = "";

   // memanggil fungsi untuk menghitung jumlah data setiap table 
   $mem = c_mem($conn);
   $book = c_buku($conn);
   $borrow = c_pinjam($conn);
   $return = c_balik($conn);
   $c_denda = c_denda($conn);
   $number = number_format($c_denda,2,',','.');
   $all_denda = sprintf("Rp %s",$number);

   // Fungsi tambahan untuk form
   $kode_buku = no_buku($conn);
   $kode_pinjol = no_pin($conn);
   $date = date('Y-m-d');
   $dateN = date('Y-m-d', strtotime($date."+10 days"));

   //untuk mengubah content
   $page = @$_GET['p'];
   $aksi = @$_GET['ac'];
   //@ pada php berarti mengabaikan kesalahan seperti variabel tidak disetel.
   if(isset($_GET['s'])){
      $notif = $_GET['s'];
   } else {
      $notif = "";
   }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Icon And Title Website -->
   <title>Gotham Library</title>
   <link rel="icon" type="image/icon type" href="assets/img/gl_icon.png">

   <!-- Link Css -->
   <?php css() ?>


</head>
<body>     
   
   <?php 
      // Untuk Sidebar dan header
      side();
      head();

    ?>   

   <!-- Content -->
   <div class="container-fluid">
      <div class="row"> 
         <div class="col min-vh-75 p-4">
      
         <!-- Content Here -->
            
            <!-- Untuk mengubah content sesuai dengan halaman dan aksi -->
            <?php include 'route.php' ?>

            </div>
            <!-- End Content -->
         </div>
      </div>
   </div>


   <?php 
         // Notif Berhasil
         if(!$notif==""){
            ?>
               <script>
                  var notif = <?php echo json_encode($notif); ?> ;
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })

                  Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil Di'+notif
                  })
            </script>
      <?php
            }      
      ?> 
   
   <!-- Link Javascript -->
   <?php js() ?>


</body>
</html>