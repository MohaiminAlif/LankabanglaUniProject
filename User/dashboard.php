<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'client'){
    header("Location: login.php");
  }

  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="../images/icons/logo2.jpg" />

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="../dist/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .user_img{
        height: 12em;
        width: 12em;
        border-radius: 50%;
               
    }

</style>

</head>
<body>

        <!-- Main Sidebar Container -->
        <aside class="sidenav mt-5" align="center">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
              <img src="../dist/img/logo4.png" alt="AdminLTE Logo" style="opacity:1; height:5em">
            </a>
      
            <!-- Sidebar -->
            <div class="sidebar">
      
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
     
                  <li class="nav-item mt-4">
                    <a href="https://www.lankabangla.com/" class="nav-link card shadow">
      
                      <p>
                        Visit Website
                      </p>
      
                    </a>
                  </li>
      
                  <li class="nav-item mt-4">
                    <a href="https://lankabd.com/" class="nav-link card shadow">
      
                      <p>
                        Visit Financial Portal
                      </p>
                    </a>
                  </li>

                  <li class="nav-item mt-4">
                    <a href="boForm.php" class="nav-link card shadow">
      
                      <p>
                        Apply for Brokerage Account
                      </p>
                    </a>
                  </li>

                  <li class="nav-item mt-4">
                    <a href="../connection/logout.php" target="_self" class="nav-link card shadow">
      
                      <p class="text-danger">
                        Log Out
                      </p>
                    </a>
                  </li>
      
                </ul>

      
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
    <div class="mt-5 container" align="center">
        <img src="../dist/img/avatar5.png" alt="user image" class="user_img"> 
    </div>
    
    <div class="card container mt-5 p-5 shadow text-secondary">
        <h4 class="p-1">Name: <?php echo $_SESSION['name']?></h4>
        <h4 class="p-1">ID: <?php echo $_SESSION['client_code']?></h4></h4>
        <h4 class="p-1">Email: <?php echo $_SESSION['email']?></h4></h4>
        <h4 class="p-1">Tin: <?php echo $_SESSION['tin']?></h4>
        <h4 class="p-1">NID: <?php echo $_SESSION['nid']?></h4>
        
        <h4 class="p-1">Present Address</h4>
        <div class="row">
          <div class="col-md-3"><h5 class="p-1">Thana: <?php echo $_SESSION['present_thana']?></h5></div>
          <div class="col-md-3"><h5 class="p-1">Post: <?php echo $_SESSION['present_post']?></h5></div>
          <div class="col-md-3"><h5 class="p-1">Division: <?php echo $_SESSION['present_division']?></h5></div>
          <div class="col-md-3"><h5 class="p-1">Country: <?php echo $_SESSION['present_country']?></h5></div>
        </div>
        
        <h4 class="p-1">Permanent Address</h4>
        <div class="row">
          <div class="col-md-3"><h5 class="p-1">Thana: <?php echo $_SESSION['permanent_thana']?></h5></div>
          <div class="col-md-3"><h5 class="p-1">Post: <?php echo $_SESSION['permanent_post']?></h5></div>
          <div class="col-md-3"><h5 class="p-1">Division: <?php echo $_SESSION['permanent_division']?></h5></div>
          <div class="col-md-3"><h5 class="p-1">Country: <?php echo $_SESSION['permanent_country']?></h5></div>
        </div>


        <h4 class="p-1">Account Operation Type: <?php echo $_SESSION['operation_type']?></h4>

    </div>

       
</body>
</html>