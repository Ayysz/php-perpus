<!-- All JavaScript Here --> 
   
   <?php include 'koneksi.php' ?>

      <!-- JavaScript -->
         <script>
            $(document).ready(function() { //open bracket
                $('#example').DataTable({
                   responsive: true,
                   // select: true,
                   // dom: 'Bfrtip'
                   language: {
                     // search : "_INPUT_",
                     searchPlaceholder: "Cari Data",
                   }
                });

                 //ajax hapus data pegawai
                 $(".hapus").off("click").on("click",function(){
                     var id_data = $(this).attr("data-id");
                     $.ajax({
                         url : "pegawai/aksi_hapus.php?id="+id_data,
                         type : "POST",
                         success : function(data){
                             window.location = "index.php";
                         }
                     });
                 });

                  // Hapus Data member Dengan SweetAlert2
                  $(document).on('click','#apus',function(e){
                       e.preventDefault();
                       var id = $(this).data('id');
                       // var form = $(this).parents('form');
                       Swal.fire({
                           title: 'Kamu Yakin?',
                           text: "Data yang dihapus tidak bisa dikembalikan!",
                           type: 'warning',
                           icon: "warning",
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           cancelButtonText: 'Gak Jadi',
                           confirmButtonText: 'Iya, Hapus!'
                       }).then((result) => {
                           if (result.value) {
                              window.location.href="member/dlt_mem.php?id="+id;
                               // form.submit();
                           }
                       });
                   });

                  // Hapus Data buku Dengan SweetAlert2
                  $(document).on('click','#apusBuku',function(e){
                       e.preventDefault();
                       var id = $(this).data('id');
                       // var form = $(this).parents('form');
                       Swal.fire({
                           title: 'Kamu Yakin?',
                           text: "Data yang dihapus tidak bisa dikembalikan!",
                           type: 'warning',
                           icon: "warning",
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           cancelButtonText: 'Gak Jadi',
                           confirmButtonText: 'Iya, Hapus!'
                       }).then((result) => {
                           if (result.value) {
                              window.location.href="buku/dlt_buku.php?id="+id;
                               // form.submit();
                           }
                       });
                   });


                  // Log Out Dengan SweetAlert2
                  $(document).on('click','#out',function(e){
                       e.preventDefault();
                       var id = $(this).data('id');
                       // var form = $(this).parents('form');
                       Swal.fire({
                           title: 'Kamu Yakin?',
                           text: "Yakin Ingin Keluar",
                           type: 'warning',
                           icon: "warning",
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           cancelButtonText: 'Gak Jadi',
                           confirmButtonText: 'Iya, Beneran!'
                       }).then((result) => {
                           if (result.value) {
                              window.location.href="logOut.php";
                               // form.submit();
                           }
                       });
                   });


            } ); //close bracket
         

         //Ubah Tipe input pada peminjaman
           const show = document.querySelector('#myButton');
           const pinjam = document.querySelector('#t_pinjam');
          
           show.addEventListener('click', function (e) {
             // shorthand if statment ? true : false ;
             const type = pinjam.getAttribute('type') === 'text' ? 'date' : 'text';
             pinjam.setAttribute('type', type);
            }); 

           const b = document.querySelector('#myButton2');
           const tenggat = document.querySelector('#tenggat');
          
           b.addEventListener('click', function (e) {
             // shorthand if statment ? true : false ;
             const type = tenggat.getAttribute('type') === 'text' ? 'date' : 'text';
             tenggat.setAttribute('type', type);
            });
         </script>

         <script>
            // Menambah input dynamicly
            
            var limit = 3;

            $(function(){
               var main = $('.main-container');
               var i = $('.buku').length + 1; //menghitung yang awalnya array 0 -> array 1

               // Nambah Input
               $('#nambahin').on('click', function(){ 
                  if (i <= limit){
                     $(`<div class="buku lagi">
                         <div class="row mb-3">
                             <label for="" class="col-sm-2 col-form-label">Pustaka [`+i+`]</label>
                            <div class="col-5">
                             <div class="input-group">
                                <select class="form-select" name="pustaka[]" id="pustaka" aria-label=".form-select-sm example">
                                    <option value="" >Pilih Pustaka</option>
                                    <?php
                                    // Select option Sederhana
                                      $sql = "SELECT * FROM buku";
                                      $q = mysqli_query($conn, $sql);
                                      while($r = mysqli_fetch_array($q)){
                                         echo "<option value=".$r['id_buku'].">".$r['judul']."-".$r['id_buku']."</option>";
                                      }
                                     ?>
                                </select>
                                <input type="number" class="form-control" name="qty[]" value="1">
                                <span class="input-group-text">Qty</span>
                              </div> 
                              </div>
                              <div class="col-1">
                              <span class="tt" title="Hapus data" data-bs-placement="top">
                               <span id="kurangin" class="btn btn-info kurangin"><i class="fa-solid fa-minus"></i></span>
                               </span>
                             </div>
                         </div>
                        </div>
                        `).appendTo(main);
                     i++;
                     return false;
                  } else {
                     swal.fire(
                        'Oops!',
                        'Mencapai Batas Limit Peminjaman!',
                        'warning'
                        )
                  }
               });

               // Hapus input
               $(document).on('click', '.kurangin', function(){
                  if (i>2){ 
                    $(this).closest('.lagi').remove();
                    i--;
                  }
                })

            });
         </script>

         <!-- Gak Kepake -->
         <script>
            $(document).ready(function () {
              //ajax edit data member
                 $("#ngedit").on("click",function() {              
                    var id_data = $(this).attr("data-id");
                    console.log(id_data);
                    $.ajax({                        
                         url : "member/ambil_mem.php?id="+id_data,
                         type: "GET",
                         dataType: "JSON",
                         success: function(data)
                         {                                    
                             // $("#id").val(data.id);                     
                             // $("#name").val(data.name);                     
                             // $("#email").val(data.email);                     
                             // $("#job").val(data.job);                     
                             // $("#address").val(data.address);  
                             $("#id_mem").val(data.id_mem);                                     
                             $(".no").val(data.no_mem);                                     
                             $(".nama").val(data.nama_mem);                                     
                             $("#jk").val(data.jk).change();                                     
                             $("#kelas").val(data.kelas).change();                                     
                             $(".jur").val(data.jurusan).change();                                     
                             $(".telp").val(data.no_telp);                                     
                             $("#lahir").val(data.tgl_lahir);                                     
                             $("textarea#alamate").val(data.alamat);                                     
                             $("#editUser").modal('show');                            
                         }
                     });    
                 });   
              });
         </script>
         <!-- Gak Kepake -->
      
      <!-- Preview Image -->
         <script>
         function previewImg(event){
            if(event.target.files.length > 0){
               var src = URL.createObjectURL(event.target.files[0]);
               var preview = document.getElementById('img-preview');
               preview.src = src;
               preview.style.display = "block";
            }
         }
         function previewImgedit(event){
            if(event.target.files.length > 0){
               var src = URL.createObjectURL(event.target.files[0]);
               var preview = document.getElementById('img-preview-edit');
               preview.src = src;
               preview.style.display = "block";
            }
         }
         </script>

      <!-- Font Awesome Js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.js" integrity="sha512-TbK1NsnYsmC/wJRzEIvaG5D23gVk8cQBPCSVRtvaTTTEZyRoBSmPEvYqMZsafm7Mtt0XzdMwTCkBxPifBSKc5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <!-- Jquery Js -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

      <!-- Bootstrap Js -->
      <script src="assets/js/bootstrap.bundle.js"></script>

      <!-- Popper Js -->
      <!-- <script src="assets/js/popper.min.js"></script> -->
      
      <script>
      // Function to GeneratePdf
      function GeneratePdf(){
      var element = document.getElementById('report');
      var opt = {
        filename:     'Report.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
      };
      html2pdf().set(opt).from(element).save();
      // html2pdf(element);
      }
      </script>

      <script>
            // Function to GeneratePdf
            function GeneratePdf2(){
            var element = document.getElementById('report');
            var opt = {
              filename:     'Report - Pustaka.pdf',
              image:        { type: 'jpeg', quality: 0.98 },
              jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().set(opt).from(element).save();
            // html2pdf(element);
            }
            </script>

      <!-- Popper script -->
      <script type="text/javascript">
         const tooltips = document.querySelectorAll('.tt')
         tooltips.forEach(t => {
            new bootstrap.Tooltip(t)
         })
      </script>

      <!-- File Upload with Preview -->
<!--       <script src="assets/preview/js/preview.min.js"></script>

      Membuat fungsi untuk js preview dengan attribute data-upload-id
      <script>
         var upload = new FileUploadWithPreview('mine');
      </script>