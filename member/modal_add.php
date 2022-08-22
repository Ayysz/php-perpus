<!-- Modal Add -->
<form method="post" action="member/add_mem.php">
<div class="modal fade" id="tambahUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header alert-info">
      <h4 class="modal-title" id="exampleModalLabel">
         <i class="fa-solid fa-user-plus fa-2x"></i> Tambah Data Member
      </h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
      <div class="row pb-2">
         <div class="col-12">
            <span class="tt" data-bs-placement="left" title="Nomor Anggota Akan Dibuat Otomatis oleh sistem">
            <label  for="no">Nomor Anggota</label> </span>
            <input type="text" readonly name="nap" class="form-control" id="no" placeholder="Auto Generated">
         </div>
      </div>
      <div class="row pb-2">
         <div class="col-12">
            <label class="" for="nama">Nama Anggota</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anggota">
         </div>
      </div>
      <div class="row pb-2">
         <div class="col-3">
            <label for="">Kelas</label>
            <select class="form-select" name="kelas" aria-label=".form-select-sm example">
                <option >Kelas</option>
                <option value="x" >X</option>
                <option value="xi" >XI</option>
                <option value="xii" >XII</option>
                <option value="xiii" >XIII</option>
            </select>   
       </div>
       <div class="col-9">
         <label for="">Kompetensi Keahlian</label>
         <select class="form-select" name="jurusan" aria-label=".form-select-sm example">
          <option selected>Kompetensi Keahlian</option>
                 <?php 
                // Select option Sederhana
                  $sql = "SELECT * FROM jurusan";
                  $q = mysqli_query($conn, $sql);
                  while($r = mysqli_fetch_array($q)){
                     echo "<option value=".$r['id_jurusan']." >".$r['nama_jurusan']."</option>";
                  }
                 ?>
         </select>
    </div>
 </div>
 <div class="row">
   <div class="col-12">
      <span>Jenis Kelamin</span>
      <div class="input-group mb-3">
         <select name="jk" class="form-select form-select" aria-label=".form-select-sm example">
           <option selected>---Pilih Jenis Kelamin---</option>
           <option value="perempuan">Perempuan <strong>&#9792;</strong></option>
           <option value="laki-laki">Laki-laki <strong>&#9794;</strong></option>
         </select>
    </div>
 </div>
</div>
<div class="row pb-2">
   <div class="col-6">
      <label class="" for="telp">Nomor Telpon</label>
      <input type="text" maxlength="13" class="form-control" name="telp" id="telp" placeholder="08***********">
   </div>
      <div class="col-6">
      <label class="" for="telp">Tanggal Lahir</label>
      <input type="date" name="tg_lahir" maxlength="13" class="form-control" id="telp" placeholder="08***********">
   </div> 
</div>
<div class="row">
   <div class="col-12">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea name="alamat" placeholder="Jl.haji makmur no.12" class="form-control" id="alamat" rows="3"></textarea>
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