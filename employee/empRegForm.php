



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee | Form</title>
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
  <script>
    $(document).ready(function() {
      $("#hide").click(function() {
        $("#jointAccount").hide();
      });
      $("#show").click(function() {
        $("#jointAccount").show();
      });
    });
    $(document).ready(function() {
      $('').click(function() {
        $("html, body").animate({
          scrollTop: 0
        }, 1000);
        return false;
      });
    });
    $(document).ready(function() {
      // Target the button element using its ID and add a click event handler
      $("#showFormButton").click(function() {
        // Toggle the form's visibility using jQuery's slideToggle() method
        $("#myForm").slideToggle();
      });
    });
  </script>

  <style>
    .sectionForm {
      background-color: rgba(102, 231, 102, 0.26);

    }

    html {
      scroll-behavior: smooth;
    }



  </style>

</head>

<body class="hold-transition">
  <div class="row">

    <!-- Main Sidebar Container -->
    <aside class="sidenav mt-5" align="center">
      <!-- Brand Logo -->
      <a href="../index.html" class="brand-link">
        <img src="../dist/img/logo4.png" alt="AdminLTE Logo" style="opacity:1; height:5em">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">





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
              <h1 class="mt-5" align="center">Employee Registration Form</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="sectionForm container card shadow py-3 px-5 mt-5">

        <!-- First Account Holder -->
        <div class="row">
          <h3>Employee Description</h3>
          <form class="row g-3" action="emphandler.php" method="post">

            <div class="col-md-6 mt-3">
              <label for="customerName" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" >
            </div>

            <div class="col-md-3 mt-3">
                <label class="form-label">Upload a photo of Employee</label>
                <input class="form-control" type="file" name="photo" >
              </div>
            <div class="col-md-3 mt-3">
              <label class="form-label">Upload a photo of Signature</label>
              <input class="form-control" type="file" name="signature" >
            </div>

           
            <div class="col-md-4 mt-3">
              <label class="form-label">Mobile</label>
              <input type="text" class="form-control" name="mobile">
            </div>
            
            <div class="col-4 mt-3">
              <label class="form-label">Email</label>
              <input type="emial" class="form-control" name="email">
            </div>
            <div class="col-2 mt-5" align="right"> Employee Type:</div>
            <div class="col-1 mt-5" align="right">              
                <select name="type">
                  <option value="">Select</option>
                  <option value="relationshipmanager_t">Relationship Manager</option>
                  <option value="headofsettlement_t">Head of Settlement</option>
        
                </select>
            
               </div>

            <div class="col-md-8 mt-3">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" name="address">
            </div>

            <div class="col-md-4 mt-3">
              <label class="form-label">Head ID to assign this Manager</label>
              <input type="text" class="form-control" name="address">
            </div>



            <div class="col-6 mt-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" >
            </div>
            <div class="col-md-6 mt-3">
              <label class="form-label">Repeat Password</label>
              <input class="form-control" type="password" name="rpass" >
            </div>
            <div class="col-11 mt-3"></div>
            

            <div class="col-1 mt-3" align="right">
              <button class="btn btn-secondary">Next</button></a>
            </div>
      
          </form>
        </div>

      </section>

      <!-- /.content -->
    </div>
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
</body>

</html>