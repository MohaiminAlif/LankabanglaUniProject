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
  <title>Nominee | Form</title>
  <link rel="icon" type="image/png" href="../images/icons/logo2.jpg" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <style>
    #jointAccount {

      display: none;
    }

    .sectionForm {
      background-color: rgba(20, 174, 221, 0.137);

    }

    html {
      scroll-behavior: smooth;
    }


    /* Hide the form by default */
    #myForm {
      display: none;
    }
  </style>

</head>

<body class="hold-transition">
  <div class="row mt-2">

    <!-- Main Sidebar Container -->
    <aside class="sidenav mt-5" align="center">
      <!-- Brand Logo -->
      <a href="dashboard.html" class="brand-link">
        <img src="../dist/img/logo4.png" alt="AdminLTE Logo" style="opacity:1; height:5em">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item mt-4">
              <a href="dashboard.php" class="nav-link card shadow">

                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item mt-4">
              <a href="#" class="nav-link card shadow">

                <p>
                  Brokerage Registration Form
                </p>

              </a>
            </li>

            <li class="nav-item mt-4">
              <a href="#" class="nav-link card">

                <p>Nominee Details </p> 
              </a>
            </li>

            <li class="nav-item mt-4">
              <a href="#" class="nav-link card">

                <p>
                  Power of Attorney Details
                </p>
              </a>
            </li>

          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="col-2"></div>

    <!-- Content Wrapper. Contains page content -->
    <div class="col-9">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="mt-5" align="center">Brokerage Account Opening Form</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      <section class="sectionForm container card shadow py-5 px-5 mt-5">

          <div class="mt-5 mb-3">
            <h5>All communications shall be sent only to the First
              Named Account Holder's correspondence address.</h5>
          </div>

          


            <form action="Bo_process_form.php" method="POST" class="row">
                <div class="col-md-6">
                  <label for="bo_id" class="form-label">BO ID</label>
                  <input type="text" class="form-control" name="bo_id" />
                </div>
                
 
            <div class="col-md-12 mt-3">
              <label for="formFile" class="form-label">Branch</label>
              <select name="ac_branch">
                <option value="online">Online</option>
                <option value="Agrabad">Agrabad</option>
                <option value="Banani">Banani</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="Khatungonj">Khatungonj</option>
                <option value="Narayangonj">Narayangonj</option>
                <option value="Nasirabad">Nasirabad</option>
                <option value="Principal">Principal</option>
                <option value="Sylhet">Sylhet</option>      
                <option value="Uttara">Uttara</option> 

              </select>
            </div>

            
            <div class="col-md-3 mt-3 mb-3">
              <label for="formFile" class="form-label">BO Type </label>
              <input type="text" class="form-control" name="operation_type" placeholder="<?php echo $_SESSION['operation_type']?>" disabled>
              
            </div>
     
            <form action="passport_form.php" method="POST" class="row">
            <div class="col-12 mt-5">
              <h5>Passport Information</h5>
            </div>
  
            <div class="col-md-5 mt-3">
              <label for="customerName" class="form-label">Passport Number</label>
              <input type="text" class="form-control" name="passport_num">
            </div>
  
            <div class="col-md-4 mt-3">
              <label for="formFile" class="form-label">Issue Place</label>
              <input class="form-control" type="text" name="issue_place" >
            </div>
  
            <div class="col-md-4 mt-3">
              <label for="formFile" class="form-label">Issue Date</label>
              <input class="form-control" type="date" name="issue_date">
            </div>
  
            <div class="col-md-4 mt-3">
              <label for="formFile" class="form-label">Expiry Date</label>
              <input class="form-control" type="date" name="expiry_date">
            </div>    

            <div class="col-12 mt-5">
              <h5>Introducer Information</h5>
            </div>
  
            <div class="col-md-4 mt-3">
              <label for="customerName" class="form-label">Intoducer's Client Code</label>
              <input type="text" class="form-control" name="introducer_code">
            </div>
  
            <div class="col-md-4 mt-3">
              <label for="formFile" class="form-label">Introducer's Name</label>
              <input class="form-control" type="text" name="introducer_name" >
            </div>
             
            

            <div align="right" class="mt-5 col-12">
              <button class="col-2 btn btn-success text-bold">Submit</button>
            </div>
            </form>
            </form>
      </section>



    </div>
  </div>

  <!-- /.content -->

  <!-- /.content-wrapper -->
  <div class="row mt-5" style="color: rgb(76, 88, 128);">

    <strong class="col-lg-3 col-md-12 col-sm-6 " align="center">Developed and Redesigned by IUB DataCoders
      2023.</strong>
    <div class="col-lg-8 "></div>
    <strong class="col-lg-1 col-md-12 col-sm-2" align="center">
      <p>Version 1.0</p>
    </strong>

  </div>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>

  <!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="../dist/js/main.js"></script>

</body>

</html>