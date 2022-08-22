<?php 

   include '../config/koneksi.php';

   $id = $_POST['id_mem'];
   $nama = $_POST['nama'];
   $kelas = $_POST['kelas'];
   $jurusan = $_POST['jurusan'];
   $telp = $_POST['telp'];
   $jk = $_POST['jk'];
   $alamat = $_POST['alamat'];
   $tgl_lahir = date('Y-m-d',strtotime($_POST['tg_lahir']));

   //untuk mengubah kode jurusan
   switch ($jurusan) {
      case '01':
         $jurusan = "TP";
         break;
      case '02':
         $jurusan = "TKR";
         break;
      case '03':
         $jurusan = "TKJ";
         break;
      case '04':
         $jurusan = "DPIB";
         break;
      case '05':
         $jurusan = "BKP";
         break;
      case '06':
         $jurusan = "TFLM";
         break;
      case '07':
         $jurusan = "TOI";
         break;
      case '08':
         $jurusan = "MM";
         break;
      case '09':
         $jurusan = "RPL";
         break;
      case '10':
         $jurusan = "SIJA";
         break;
      default:
      $jurusan = "";
   }


   // Membuat kode anggota otomatis
   function nap($conn,$id){
      //mengambil data member dengan nomor id terbesar
      $sql = "SELECT no_mem as nomem FROM member where id_mem = '$id'";
      $query = mysqli_query($conn,$sql);
      $data = mysqli_fetch_array($query);
      $no = $data['nomem'];

      // Mengambil angka dari id terbesar, menggunakan fungsi substr
      // Kemmudian Diubah ke int dengan (int)
      $urutan = (int) substr($no, 4);

      // mengambil tanggal hari ni hanya tahun untuk 2 angka pertama nomor member
      $tgl = date('y'); 

      // mengambil kode jurusan untuk 2 digit setealh tahun
      $kode_jurusan = $_POST['jurusan'];

      // membuat kode barang
      $naps = $tgl . $kode_jurusan . sprintf("%04s", $urutan);
      return $naps;
   }

   $kode = nap($conn,$id);
   try{
     // Your code
      $sql = "UPDATE member SET
      no_mem = '$kode',
      nama_mem = '$nama',
      kelas = '$kelas',
      jurusan = '$jurusan',
      no_telp = '$telp',
      tgl_lahir = '$tgl_lahir',
      jk = '$jk',
      alamat = '$alamat'
      WHERE id_mem = '$id'
   ";
   $save = mysqli_query($conn, $sql);

   if($save){
      // echo "<script> alert('Berhasil Input Data');window.location.href='../member.php';</script>";
      echo $id;
      echo "<br>";
      echo $kode;
      echo "<br>";
      echo $nama;
      echo "<br>";
      echo $kelas;
      echo "<br>";
      echo $jurusan;
      echo "<br>";
      echo $telp;
      echo "<br>";
      echo $tgl_lahir;
      echo "<br>";
      echo $jk;
      echo "<br>";
      echo $alamat;
      echo "<br>";
   } else {
      echo "<script> alert('Gagal input Data');window.location.href='../member.php';</script>";
      
   }
} 
catch(Error $e) {
    $trace = $e->getTrace();
    echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
}
   

 ?>