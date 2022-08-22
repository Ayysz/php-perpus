<!-- php Here -->
<?php 
      
   // session_start();
   ob_start();
   session_start();

   require 'config/koneksi.php';

   if(isset($_SESSION['login'])){
      header("location:index.php");
      exit();
   }

   $error = "";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Icon And Title Website -->
   <title>Gotham Library</title>
   <link rel="icon" type="image/icon type" href="assets/img/gl_icon.png" >

   <!-- Jquery Js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- Boostrap Link -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <!-- Font Awesome Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- icon bootstrap -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" integrity="sha512-Oy+sz5W86PK0ZIkawrG0iv7XwWhYecM3exvUtMKNJMekGFJtVAhibhRPTpmyTj8+lJCkmWfnpxKgT2OopquBHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Google fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <!-- sweetalert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.css" integrity="sha512-40/Lc5CTd+76RzYwpttkBAJU68jKKQy4mnPI52KKOHwRBsGcvQct9cIqpWT/XGLSsQFAcuty1fIuNgqRoZTiGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   

   <!-- CSS Here -->
   <style>
      body{
         font-family: 'Poppins', sans-serif;
         background-image: url("assets/img/new_bg.jpg");
         backgorund-size: cover;
         background-position: -220px -200px;
         /*background-color: #00ac96;*/
      }

      .content{
         margin: 8%;
         background-color: #fff;
         padding: 4rem 1rem;
         box-shadow: 0 0 5px 5px rgba(0,0,0, .05);
         opacity: 0.95;
         
      }

      .signin-text{
         font-style: normal;
         font-size: 7vh;
         font-weight: 600 !important;
      }

      .form-control{
         display: block;
         width: 100%;
         font: normal 300 1rem/1.5 ;
         border-color: #DC143C !important;
         border-style: solid !important;
         border-width: 0 0 1px 0 !important;
         color: #495057;
         height: auto;
         border-radius: 0;
         background-color: #fff;
         background-clip: padding-box;
      }

      .form-control:focus{
         color: #495057;
         background-color: #fff;
         outline: 0;
         box-shadow: none;
      }

      /* for make button succes
      .btn-class{
         border-color: #00ac96;
         color: #00ac96;
      }

      .btn-class:hover{
         background-color: #00ac96;
      }
      */

      #show{
         cursor: pointer;
         position: absolute;
         display: inline-block;
         margin-left: -20px;
         margin-bottom: -10px;
      }

      .input-group-text{
         border-color: #DC143C !important;
         border-style: solid !important;
         border-width: 0 0 1px 0 !important;
         background-color: white;
      }

      .form-floating-group{
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
      }
   </style>


</head>
<body>
      
   <div class="container">
      <div class="row content">
         
         <!-- image -->
         <div class="col-md-6 mb-3">
            <img src="assets/img/ilus.png" class="img-fluid"  alt="illustration image from dribble.com">
         </div>

         <div class="col-md-6">
            <h3 class="signin-text mb-4">Gotham Library</h3>

            <!-- alert box -->
               <div class="logout">
                  <?php if(isset($_GET['op'])=="keluar"){ ?>
                     <div class="alert alert-warning">
                        <strong>Sign Out Berhasil</strong>
                     </div>
                  <?php 
                  header("refresh:3;url=login.php");
                  } ?>
               </div>
               <div class="gagal">
                  <?php if($error){ ?>
                     <div class="alert alert-danger">
                        <?php echo "<strong>".$error."</strong>";
                        header("refresh:3;url=login.php");
                        ?>
                     </div>
                  <?php } ?>
               </div>

            <!-- form to login -->
            <form action="" method="post"  autocomplete="off">
               <div class="input-group mb-4">
                  <div class="form-floating form-floating-group flex-grow-1">
                     <input type="text" class="form-control" name="username" required placeholder="username">
                     <label for="username">Username</label>
                  </div>
               </div>
               <div class="input-group mb-4">
                 <div class="form-floating form-floating-group flex-grow-1">
                     <input type="password" class="form-control" id="pw" name="password" placeholder="password" required>
                     <label for="password">Password</label>
                 </div>
                 <span class="input-group-text"><i class="bi bi-eye-fill" id="show"></i></span>
               </div>
               <div class="form-group form-switch mb-4">
                  <input type="checkbox" id="cek" class="form-check-input">
                  <label for="cek" class="form-check-label">Remember me</label>
               </div>
               <div class="d-grid">
                  <button class="btn btn-outline-secondary rounded-3" name="submit" type="submit">Sign Up</button>
               </div>
            </form>

         </div>
      </div>
   </div>



   
<!-- JavaScript Here -->
   
   <script>
      //show pw function javascript
        const show = document.querySelector('#show');
        const pw = document.querySelector('#pw');
       
        show.addEventListener('click', function (e) {
          // shorthand if statment ? true : false ;
          const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
          pw.setAttribute('type', type);
          // ubah icon
          this.classList.toggle('bi-eye-slash-fill');
         });

   </script>


   <!-- Bootstrap Js -->
   <script src="assets/js/bootstrap.bundle.js"></script>
   <!-- Font Awesome Js -->
      <!-- min js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.js" integrity="sha512-TbK1NsnYsmC/wJRzEIvaG5D23gVk8cQBPCSVRtvaTTTEZyRoBSmPEvYqMZsafm7Mtt0XzdMwTCkBxPifBSKc5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
   
   <!-- SweetAlert -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js" integrity="sha512-aYkxNMS1BrFK2pwC53ea1bO8key+6qLChadZfRk8FtHt36OBqoKX8cnkcYWLs1BR5sqgjU5SMIMYNa85lZWzAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>

<?php 

// fungsi login
   if(isset($_POST['submit'])){

      // untuk mencegah sqli injection
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "";
      $result = $conn->query("SELECT * FROM admin WHERE username = '$username'") or die(mysqli_error($conn));
      // cek apakah ada record pada tabel
      if($result->num_rows == 1){
         $row = $result->fetch_assoc();
         if($password == $row['password']){
            $_SESSION['login'] = $row['user'];
            echo "<script> 
            Swal.fire({
               position: 'center',
               icon: 'success',
               title: 'berhasil Login',
               showConfirmButton: false,
               timer:1500
               }).then(function() {
                      window.location = 'index.php';
                  });
            </script>";
            // nanti kita buat pop up kalau berhasil login
            // echo "<script>alert('Login Berhasil Welcome ".$row['user']." ')</script>";
            // header("location:homepage.php");
            // exit;

         } else {
            $error = "Password Salah";
         } 
      } 
         else {
            $error = "Username Dan Password Salah";
      }
   }

 ?>