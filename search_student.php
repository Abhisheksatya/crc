
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin CRC</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

 <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="admin_1.html">CRC Admin Panel</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="company form.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Add Company</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Account Setup</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
          
            <a class="dropdown-item" href="newadmin.html">New Admin Register</a>
            <a class="dropdown-item" href="reset.html">Reset Password</a>
			  <a class="dropdown-item" href="index.html">Logout</a>
            <div class="dropdown-divider"></div>
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search_student.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Search Student</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="excel.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Database Details</span></a>
        </li>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mail Setup</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Setup Mail:</h6>
          
            <a class="dropdown-item" href="esymail.html">Quick Setup</a>
            <a class="dropdown-item" href="setmail.html">Full Setup</a>
            <div class="dropdown-divider"></div>
            
          </div>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="cexcel.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Company Details</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reg_form1.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Registration Desk</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Download Data Reg. Desk</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="excel1.php">Registration 1</a>
            <a class="dropdown-item" href="excel2.php">Registration 2</a>
            <a class="dropdown-item" href="excel3.php">Registration 3</a>
             <a class="dropdown-item" href="excel4.php">Registration 4</a>
          </div>
        </li>
		
		
      </ul>

      

         <?php
$servername = "localhost";
$uname = "id7636715_crc";
$pass = "abhi@321";
$dbname = "id7636715_crc";

$name = filter_input(INPUT_POST, 'name');

// Create connection
$conn = mysqli_connect($servername, $uname, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student WHERE fname='$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<strong>Roll No: </strong>" .$row["rno"]."------". " <strong>Name:</strong> " . $row["fname"]." ".$row["lname"]."------"."<strong> Phone No: </strong>" . $row["pno"]."------". "<strong> College Name: </strong>" . $row["college"]; 
    }
} else {
    echo "<script>
alert('Error!!!');
window.location.href='admin_1.html';
</script>";
}

mysqli_close($conn);
?> 
           

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span> © Crossroad 2k18</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
