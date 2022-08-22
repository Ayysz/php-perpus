<?php 

   include '../config/koneksi.php';    

   $filename = "Report-Anggota_excel-(". date('d-m-Y') .").xls";

   header("Content-type: application/vnd-ms-excel");
   header("Content-Disposition: attachment; filename=$filename");
   
   include '../report/format/member.php';

 ?>