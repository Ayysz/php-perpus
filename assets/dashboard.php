<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Icon And Title Website -->
   <title>Gotham Library</title>
   <link rel="icon" type="image/icon type" href="assets/img/gl_icon.png">

   <!-- Our Css -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- Boostrap Link -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <!-- Font Awesome Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
      

   <!-- Header -->



   <!-- offcanvas Sidebar -->
   <div class="offcanvas offcanvas-start w-25" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
      <div class="offcanvas-header">
         <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>      
      </div>
      <div class="offcanvas-body px-0">
         <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li class="nav-item">
               <a href="#" class="nav-link text-truncate">
                  <i class="bi bi-house-door"></i><span class="ms-1 d-none d-sm inline">Home</span>
               </a>
            </li>
            <li class="nav-item">
               <a href="#submenu1" class="nav-link text-truncate" data-bs-toggle="collapse" >
                  <i class="bi bi-menu-button-wide"></i><span class="ms-1 d-none d-sm inline">Dashboard</span>
               </a>
            </li>
            <!-- Dropdown List -->
            <li class="dropdown">
               <a href="" class="nav-link dropdown-toggle text-truncate" id="dropdown" data-bs-toggle="false" aria-expanded="false">
                  <i class="bi bi-bookmarks"></i><span class="ms-1 d-none d-sm-inline">Bookmark</span>
               </a>
               <ul class="dropdown-menu text-small shadow" aria-labelbody="dropdown">
                  <li><a href="" class="dropdown-item">Bookmark1</a></li>
                  <li><a href="" class="dropdown-item">Bookmark2</a></li>
                  <li><a href="" class="dropdown-item">Bookmark3</a></li>
               </ul>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li><a href="#" class="dropdown-item">Sign Out</a></li>
            </li>
            <li>
               <a href="" class="nav-link text-truncate">
                  <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Product</span>
               </a> 
            </li>
         </ul>
      </div>
   </div>
   
   <!-- Content -->
   <div class="container-fluid">
      <div class="row">
         <div class="col min-vh-100 p-4">
            <!-- Toggler To offcanvas -->
            <button class="btn float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
               <i class="bi bi-arrow-bar-right" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
            </button>
            <!-- Content Here -->
         </div>
      </div>
   </div>
   
   <!-- JavaScript Here -->
   <script>
         $(document).ready(function () {
         $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
            });
         });
   </script>
   
   <!-- Bootstrap Js -->
   <script src="assets/js/bootstrap.js"></script>
   <!-- Font Awesome Js -->
   <!-- min js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- solid js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/solid.min.js" integrity="sha512-wabaor0DW08KSK5TQlRIyYOpDrAfJxl5J0FRzH0dNNhGJbeUpHaNj7up3Kr2Bwz/abLvVcJvDrJL+RLFcyGIkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- Jquery Js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- Popper Js -->
   <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>

</body>
</html>