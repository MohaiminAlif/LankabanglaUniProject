<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lbsp";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die(mysqli_error($conn));
}



$sqlcount = "SELECT COUNT(*) AS record_count FROM client_t";
$result = $conn->query($sqlcount);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $clientCount = $row["record_count"];
    
} 

$sqlcount = "SELECT COUNT(*) AS record_count FROM boac_t";
$result = $conn->query($sqlcount);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $boCount = $row["record_count"];
    
} 

$sqlPerDivision = "SELECT present_division, COUNT(*) AS count FROM client_t AS c INNER JOIN boac_t AS b ON b.client_code = c.client_code GROUP BY present_division";
$result = $conn->query($sqlPerDivision);



// Initialize an empty array to store chart data
$chartData = array();

// Fetch data from the result and format it as needed
while ($row = $result->fetch_assoc()) {
    $chartData[] = array(
        "label" => $row["present_division"],
        "data" => $row["count"]
    );
}

// Close the database connection
$conn->close();

// Convert the PHP array to JSON
$chartDataJSON = json_encode($chartData);
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>
  <link rel="icon" type="image/png" href="../images/icons/logo2.jpg"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/logo3.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light mt-2 mx-2">Lanka Bangla Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User Name</a>
        </div>
        
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
              
            </a>

          </li>
           
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../User/regForm.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="empRegForm.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Admin</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item ">
            <a href="../connection/logout.php" class="nav-link">
              <i class="fa-solid fa-right-from-bracket nav-icon"></i>
              <p class="text-danger ">
                 Log Out               
              </p>
              
            </a>

          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="dashboard.php">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $clientCount;?></h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
                <i class=""></i>
              </div>
            </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="dashboard.php">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $boCount;?></h3>
                <p>Number of BO A/C holders</p>
              </div>
              <div class="icon">
             
                <i class="nav-icon fas fa-regular fa-file"></i>
               
              </div>
            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="User/regForm.html">
            <div class="small-box bg-danger">
              
              <div class="inner">
                <h3>ADD</h3>

                <p>New User</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-solid fa-user-plus"></i>
                       
              </div>
            </div>
          </a>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="User/regForm.html">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>BAR CHART</h4>
                <p>Number of BO A/C holders <br>Per Division</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-chart-column"></i></div>
            </div>
          </a>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="User/regForm.html">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Bar Chart</h4>

                <p>Number of BO A/C holders <br> Per Branch in a Thana</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-chart-column"></i></div>
            </div>
          </a>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="User/regForm.html">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Bar Chart</h4>

                <p>Number of BO A/C holders achieved by <br>Each Customer Relationship Manager in a Branch</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-chart-column"></i>
              </div>
            </div>
          </a>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="perdivpergender.php">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Bar Chart</h4>

                <p>Number of Male & Female BO A/C holders <br>Per division</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-chart-column"></i>
              </div>
            </div>
          </a>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="User/regForm.html">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Pie Chart</h4>

                <p>Number of Male & Female BO A/C holders<br>In a Branch</p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-chart-pie"></i>
              </div>
            </div>
          </a>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="yearwise.php">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Line Chart</h4>

                <p>Number of BO A/C opening <br>Year-wisely</p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-chart-line"></i>
              </div>
            </div>
          </a>
          </div>
          <!-- ./col -->
        </div>

        <div class="card mx-3" >
              <!-- Chart container for each chart -->
              <div class="mx-5 mt-5" style="width: 800px; height: 800px;">
                  <canvas id="chart1"></canvas>
              </div>
              <div style="width: 800px; height: 600px;">
                  <canvas id="chart2"></canvas>
              </div>
              <!-- Add more chart containers for other charts -->
        </div>

        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Developed by IUB DataCoders 2023.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="path-to-chartjs/Chart.min.js"></script>
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

<script>
    // Get the chart data from PHP
    var chartData = <?php echo $chartDataJSON; ?>;

    // Create a bar chart
    var ctx1 = document.getElementById("chart1").getContext("2d");
    new Chart(ctx1, {
        type: "bar",
        data: {
            labels: chartData.map(function(item) {
                return item.label;
            }),
            datasets: [{
                label: "Number of BO A/C holders per division",
                data: chartData.map(function(item) {
                    return item.data;
                }),
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>



</body>
</html>


