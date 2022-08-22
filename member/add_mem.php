<?php 
   
   require "../config/koneksi.php";
   require "../config/proses.php";


   $nama = $_POST['nama'];
   $kelas = $_POST['kelas'];
   $jurusan = $_POST['jurusan'];
   $telp = $_POST['telp'];
   $jk = $_POST['jk'];
   $alamat = $_POST['alamat'];
   $tgl_lahir = date('Y-m-d',strtotime($_POST['tg_lahir']));


   // Membuat kode anggota otomatis
   function nap($conn){
      //mengambil data member dengan nomor id terbesar
      $sql = "SELECT max(id_mem) as big FROM member";
      $query = mysqli_query($conn,$sql);
      $data = mysqli_fetch_array($query);
      $no = $data['big'];

      // Mengambil angka dari id terbesar, menggunakan fungsi substr
      // Kemmudian Diubah ke int dengan (int)
      $urutan = (int) substr($no, 0);

      // ditambah 1 untuk nomor member selanjutnya
      $urutan++;

      // mengambil tanggal hari ni hanya tahun untuk 2 angka pertama nomor member
      $tgl = date('y'); 

      // mengambil kode jurusan untuk 2 digit setealh tahun
      $kode_jurusan = $_POST['jurusan'];

      // membuat kode barang
      $naps = $tgl . $kode_jurusan . sprintf("%04s", $urutan);
      return $naps;
   }
   
   $kode = nap($conn);
   $sql = "INSERT INTO member(
      no_mem,
      nama_mem,
      kelas,
      jurusan,
      no_telp,
      tgl_lahir,
      jk,
      alamat) 
   VALUES(
      '$kode',
      '$nama',
      '$kelas',
      '$jurusan',
      '$telp',
      '$tgl_lahir',
      '$jk',
      '$alamat')";
   $save = mysqli_query($conn, $sql);

   if($save){
      echo "<script> alert('Berhasil Input Data');window.location='../index.php?p=member&s=tambah';</script>";
   } else {
      echo "<script> alert('Gagal input Data');window.location='../index.php?p=member';</script>";
   }


//sisa
   //untuk mengubah kode jurusan
   // switch ($jurusan) {
   //    case '01':
   //       $jurusan = "TP";
   //       break;
   //    case '02':
   //       $jurusan = "TKR";
   //       break;
   //    case '03':
   //       $jurusan = "TKJ";
   //       break;
   //    case '04':
   //       $jurusan = "DPIB";
   //       break;
   //    case '05':
   //       $jurusan = "BKP";
   //       break;
   //    case '06':
   //       $jurusan = "TFLM";
   //       break;
   //    case '07':
   //       $jurusan = "TOI";
   //       break;
   //    case '08':
   //       $jurusan = "MM";
   //       break;
   //    case '09':
   //       $jurusan = "RPL";
   //       break;
   //    case '10':
   //       $jurusan = "SIJA";
   //       break;
   //    default:
   //    $jurusan = "";
   // }
 ?>