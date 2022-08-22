<?php 
  
  require "config/koneksi.php";
  
  if(isset($_POST['upd'])){


   $id = $_POST['id_mem'];
   $nap = $_POST['nap'];
   $nama = $_POST['nama'];
   $kelas = $_POST['kelas'];
   $jurusan = $_POST['jurusan'];
   $telp = $_POST['telp'];
   $jk = $_POST['jk'];
   $alamat = $_POST['alamat'];
   $tgl_lahir = date('Y-m-d',strtotime($_POST['tgl_lahir']));


   // Membuat kode anggota otomatis
   function nap($nap,$conn,$id){
      $cek = strlen($nap);
      if(!($cek == 8)){
        //mengambil data member dengan nomor id terbesar
        $sql = "SELECT id_mem as angka FROM member where id_mem = '$id'";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($query);
        $no = $data['angka'];

        // Mengambil angka dari id terbesar, menggunakan fungsi substr
        // Kemmudian Diubah ke int dengan (int)
        $urutan = (int) substr($no, 0);

        // mengambil tanggal hari ni hanya tahun untuk 2 angka pertama nomor member
        $tgl = date('y'); 

        // mengambil kode jurusan untuk 2 digit setealh tahun
        $kode_jurusan = $_POST['jurusan'];

        // membuat kode barang
        $naps = $tgl . $kode_jurusan . sprintf("%04s", $urutan);
      } else {
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
      }
        return $naps;
   }
   
   $kode = nap($nap,$conn,$id);
   $sql = " UPDATE member SET
   no_mem = '$kode',
   nama_mem = '$nama',
   jk = '$jk',
   kelas = '$kelas',
   jurusan = '$jurusan',
   alamat = '$alamat',
   no_telp = '$telp',
   tgl_lahir = '$tgl_lahir'
   WHERE id_mem = '$id'
   ";

   // mysqli_query($conn, $sql);
    if($conn->query($sql) === false){
      trigger_error("Cek Perintah SQL Anda : ".$sql." [Log] Error : ".$conn->error, E_USER_ERROR);
    } else {
      echo "<script>alert('Berhasil');window.location='?p=member&s=edit'</script>";
    }

  


  }

//sisa
   // $save = mysqli_query($conn, $sql);

   // if($save){
   //    echo "<script> alert('Berhasil Input Data');window.location.href='../index.php?p=member';</script>";
   // } else {
   //    echo "<script> alert('Gagal input Data');window.location.href='../member.php';</script>";
   // }

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