<?php 

if($page == 'member'){
   require_once 'member/member.php';
} else if($page == 'buku'){
      require_once 'buku/buku.php';
} else if($page == 'pinjam'){
   if($aksi == ''){
      require_once 'pinjam/pinjam.php';
   }else if ($aksi == 'tambah'){
      require_once 'pinjam/tambah.php';
   }else if ($aksi == 'show'){
      require_once 'pinjam/info_pinjam.php';
   }
} else if($page == 'kembali') {
   if($aksi == ''){
      require_once 'kembali/kembali.php';
   } else if ($aksi == 'add') {
      require_once 'kembali/tambah.php';
   }
} else if ($page == 'report') {
   if($aksi == ''){
      require_once 'report/report-peminjaman.php';
   }else if ($aksi == 'kembali'){
      require_once 'report/report-kembali.php';
   } else if ($aksi == 'member'){
      require_once 'report/report-member.php';
   } else if ($aksi == 'pustaka'){
      require_once 'report/report-buku.php';
   }
}else {
   require_once 'homepage.php';
}

 ?>