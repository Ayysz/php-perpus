<?php 

// Memanggil mpdf yang diintsal lewat composer
// define('_MPDF_PATH','../../assets/vendor/mpdf/');
// include(_MPDF_PATH . "mpdf.php");
// $mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
// require_once  '../../assets/vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf();

// Memanggil htmlpdf yang diinstal lewat composer

require '../../assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$doc = "Report-peminjaman ".date("d-m-Y");
ob_start(); 

  include '../../config/koneksi.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
  <title>Report Peminjaman</title>
  <!-- css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
   <!-- Boostrap Link -->
   <link rel="stylesheet" href="../../assets/css/bootstrap.css">
   <!-- Font Awesome Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Html2Pdf -->
   <script src=
   "https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js"
   integrity=
   "sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A=="
   crossorigin="anonymous">
   </script>
</head>
<body>
  <div class="container-fluid">
     <div class="card">
       <div class="card-header py-3">
         <div class="row">
           <div class="col-sm-12 float-left">
             <img src="../../assets/img/gl.png" class="float-start" alt="Perpus aing" width="120">
             <div class="text-center">
               <h5 class="display-5">Gotham City Public Library</h5>
               <h6>Gotham city </h6>
               <h6>Phone +182*****</h6>
             </div>
           </div>
         </div>
       </div>
       <div class="card-body">
         <div class="row">
            <div class="col-12">
              <h4 class="display-6 text-center">Peminjaman Pustaka</h4>
              <h5><?php echo date('d-m-Y') ?></h5>
            </div>
             <div class="col-12 table-responsive">
               <table class="table table-hover table-bordered table-striped">
                 <thead>
                   <tr>
                     <th>#</th>
                     <th>Nomor Peminjaman</th>
                     <th>Tanggal Pinjam</th>
                     <th>Nomor Anggota</th>
                     <th>Nama Member</th>
                     <th>Jurusan</th>
                     <th>Pustaka</th>
                     <th>Qty.</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php 
                   // Ambil Data dari view r_peminjaman
                   $sql = "SELECT * FROM r_peminjaman";
                   $urut = 1;
                   $q = mysqli_query($conn, $sql);
                   while ($r = mysqli_fetch_array($q)){

                    ?>
                      <tr>
                        <td><?php echo $urut++ ?></td>
                        <td><?php echo $r['no_pinjam'] ?></td>
                        <td><?php echo $r['tgl_pinjam'] ?></td>
                        <td><?php echo $r['no_mem'] ?></td>
                        <td><?php echo $r['nama_mem'] ?></td>
                        <td><?php echo $r['jurusan'] ?></td>
                        <td><?php echo $r['pustaka'] ?></td>
                        <td><?php echo $r['qty'] ?></td>  
                      </tr>
                   <?php } //close bracket while ?>
                 </tbody>
               </table>
             </div>
          </div>
       </div>
     </div>
    </div>

<script>
// Function to GeneratePdf
function GeneratePdf(){
var element = document.getElementsByTagName('html')[0].innerHTML;
html2pdf(element);
}
GeneratePdf();
</script>
 
<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity=
"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
crossorigin="anonymous">
</script>
</body>
</html>
<?php
// $html = ob_get_contents();
// ob_end_clean();

// menggunakan wkhtmlpdf berbasi cmd
// $wkthmlpdf = __DIR__."/wkhtmltopdf/bin/wkhtmltopdf.exe ";
// $format = "http://localhost/Aing/perpus2/report/format/pinjam.php ";
// $save = "C:\Users\User\Downloads/report-pinjam.pdf";

// $do = exec($wkthmlpdf.$format.$save);

// $do = $html2pdf->WriteHTML($html);
// $html2pdf->output();

// if($do === true){
//    echo "<script>alert('Berhasil')</script>";
// }

// Mpdf gak bisa export bootstrap 3 ketas (jelek)
// $mpdf->WriteHTML(utf8_encode($html));
// $mpdf->Output("".$doc.".pdf","D");

 ?>