<?php

session_start();

if($_SESSION['role'] != 'admin'){
  header("Location: ../index.html");
}



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




// Execute the SQL query for year wise line graph
$sql = "SELECT YEAR(date) AS year, COUNT(*) AS record_count FROM boac_t GROUP BY YEAR(date) ORDER BY year";
$result = $conn->query($sql);

// Initialize arrays to store data for the chart
$years = [];
$recordCounts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $year = $row["year"];
        $recordCount = $row["record_count"];

        $years[] = $year;
        $recordCounts[] = $recordCount;
    }
}


// Execute the SQL query for bar chart client per division
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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  
   <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

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
          <a href="#" class="d-block">Admin</a>
        </div>
        
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
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
            <a href="">
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
            <a href="newApplicationList.html">
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
            <button id="clientPerDivision" class="btn p-5">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Bar Chart</h4>

                <p>Number of Clien <br>Per Division</p>
                <div class="icon">
              <i class="fa-solid fa-chart-line"></i>
              </div>

              </div>
            </div>
            </button>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <button id="generateChartButton" class="btn p-5">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Line Chart</h4>

                <p>Number of BO A/C opening <br>Year-wisely</p>
                <div class="icon">
              <i class="fa-solid fa-chart-line"></i>
              </div>

              </div>
            </div>
            </button>
          </div>
          <!-- ./col -->




          <div class="col-lg-3 col-6">
            <!-- small box -->
            <button id="generateChartButton" class="btn p-5">
            <div class="small-box bg-secondary">
              
              <div class="inner">
                <h4>Bar Chart</h4>

                <p>Number of male and female <br>division</p>
                <div class="icon">
              <i class="fa-solid fa-chart-line"></i>
              </div>

              </div>
            </div>
            </button>
          </div>
          <!-- ./col -->



        </div>


        <div class="card mx-3" >
              <!-- Chart container for each chart -->
              
              <!-- Add more chart containers for other charts -->
        </div>

        <div class="mx-3" >
          <!-- Chart container for each chart -->
          <div style="width: 80%; margin: auto;">
            <canvas id="lineChart"></canvas>
            <canvas id="chartData"></canvas>
          </div>
          <!-- Add more chart containers for other charts -->

<!-- 
          <div class="mx-5 mt-5" style="width: 800px; height: 800px;">
                  
              </div>
              <div style="width: 800px; height: 600px;">
                  <canvas id="clientPerDivision"></canvas>
              </div>


        </div> -->

        
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- AdminLTE App -->

<script src="../dist/js/adminlte.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


<script>
        // Function to generate the line chart
        function generateLineChart() {
            var ctx = document.getElementById('lineChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($years); ?>,
                    datasets: [{
                        label: 'Record Counts',
                        data: <?php echo json_encode($recordCounts); ?>,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
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
        }

        // Add an event listener to the button
        document.getElementById('generateChartButton').addEventListener('click', function() {
            generateLineChart();
        });
    </script>


<script>
    // Get the chart data from PHP
    var chartData = <?php echo $chartDataJSON; ?>;

    // Create a bar chart
    var ctx1 = document.getElementById("clientPerDivision").getContext("2d");
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

        document.getElementById('clientPerDivision').addEventListener('click', function() {
            generateLineChart();
        });
    });
</script>






</body>
</html>


