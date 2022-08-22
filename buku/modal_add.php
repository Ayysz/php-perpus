<!-- Modal Add -->
<form method="post" action="buku/add_buku.php" enctype="multipart/form-data">
<div class="modal fade" id="tambahBuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header alert-info">
      <h4 class="modal-title" id="exampleModalLabel">
         <i class="fa-solid fa-book fa-2x"></i> <i class="fa-solid fa-plus fa-1x"></i> Tambah Data Pustaka 
      </h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
      <div class="row">
         <div class="col-12">
            <span class="tt" data-bs-placement="left" title="Nomor Pustaka Dibuat Otomatis oleh sistem">
            <label  for="no">Nomor Pustaka</label> </span>
            <p class="fs-2 fw-bold"><?php echo $kode_buku ?></p>
            <input type="hidden" name="noBuk" value="<?php echo $kode_buku ?>">
         </div>
      </div>
      <div class="row pb-2">
         <div class="col-12">
            <label class="" for="judul">Judul Pustaka</label>
            <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku">
         </div>
      </div>
      <div class="row pb-2">
         <div class="col-4">
            <label for="">Jenis Pustaka</label>
            <select class="form-select" name="jenis" aria-label=".form-select-sm example">
                <option value="" >Jenis Pustaka</option>
                <?php 
                // Select option Sederhana
                  $sql = "SELECT * FROM kategori";
                  $q = mysqli_query($conn, $sql);
                  while($r = mysqli_fetch_array($q)){
                     echo "<option value=".$r['id_kategori']." >".$r['kategori']."</option>";
                  }
                 ?>
            </select>   
          </div>
          <div class="col-4">
            <label for="rak">Nomor rak</label>
            <select name="rak" id="rak" class="form-select" id="rak">
               <option value="">Nomor Rak</option>
               <option value="1">Rak 1</option>
               <option value="2">Rak 2</option>
               <option value="3">Rak 3</option>
            </select>
         </div>
         <div class="col-4">
            <span class="tt" data-bs-placement="top" data-bs-html="true" title="<em>Maksimal Stok buku</em> <b>99</b>">
            <label class="" for="stok">Stok Pustaka</label> </span>
            <input type="text" name="stok" maxlength="2" class="form-control" id="stok" placeholder="Stok Buku">
         </div>
      </div>
      <div class="row pb-2">
         <div class="col-6">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit">
         </div>
         <div class="col-6">
            <label for="th_terbit">Tahun Terbit</label>
            <select name="th_terbit" id="th_terbit" class="form-select" id="th_terbit">
               <option value="">-- Pilih Tahun --</option>
                  <?php 
                  // menampilkan tahun terbit dari tahun 1981- hingga tahun sekarang
                  $tahun = date('Y');

                  for ($i = $tahun - 31; $i <= $tahun ; $i++) { ?>
                     <option value="<?= $i ?>"><?= $i ?></option>
                  <?php
                  }
                  ?>
            </select>
         </div>
      </div>
      <div class="row pb-2">
         <div class="col-6">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang">
         </div>
          <div class="col-6 ">
             <label  for="masuk">Tanggal Masuk</label>
             <input type="date" name="masuk" class="form-control" id="masuk" value="<?php echo $date ?>">
          </div>
      </div>
      <!-- Upload Image -->
      <div class="row mb-2">
         <div class="col-12">
            <label for="formFile" class="form-label" style="margin-bottom: -10px;">Lampirkan Cover Buku</label>
            <input type="file" accept="image/*" onchange="previewImg(event);" name="cover" class="form-control" id="formFile">
         </div>       
      </div>
      <div class="row">
         <div class="col-12" width="500">
            <span class="tt" data-bs-placement="left" title="Cover buku">
               <img id="img-preview" src="" width="120" alt="Gambar ">
            </span>
         </div>
      </div>

   </div>
<div class="modal-footer">
 <button type="submit" class="btn btn-success fs-5" name="tambah"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
</div>
</div>
</div>
</div>            
</form>
<!-- end content -->
