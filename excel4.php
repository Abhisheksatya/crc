<?php require_once('mysqli_connect.php'); ?>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		table{
			border : solid 2px #337ab7;
			margin-top: 15px;
		}
		th {
			background: #337ab7;
			color: #FFF;
			text-align: center;
			font-size: 15px;
			padding: 10px;
		}
		td {
			padding: 10px;
			font-size: 13px;
		}
	</style>

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
          <a class="nav-link" href="mail.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Mail</span></a>
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
      <div id="content-wrapper">

        <div class="container-fluid">

          

          <div class="all-content-wrapper">
		<!-- Top Bar -->
		
		<!-- #END# Top Bar -->
	
		<section class="container">
			<div class="form-group custom-input-space has-feedback">
				<div class="page-heading">
					<h3 class="post-title">DELEGATOTORY REGISTRATION</h3>
				</div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading"><marquee><p style="color:Red;">>>crossroad 2018 exclusive<<</p></marquee></div>
								<div class="panel-body">
									<div class="post-data-list">
									
									
									<a class="btn btn-warning" href="export_excel4.php" target="_new" ><i class="fa fa-download"></i> Export to Excel</a>
									
									<table width="100%" border="1">
										<tr>
											<th>SNo.</th>
											<th>Name</th>
											<th>Guardian Name</th>
											<th>Phone No</th>
											<th>Guardian Phone No</th>
											<th>Email</th>
										</tr>
										<?php
										
										//get rows query
										$query = mysqli_query($con, "SELECT * FROM reg4 ORDER BY sno DESC");
										
										//number of rows
										$rowCount = mysqli_num_rows($query);
										
										$sno = 1;
										if($rowCount > 0){
											while($row = mysqli_fetch_assoc($query)){
										?>
										<tr>
											<td align="center"><?php echo $sno; ?>)</td>
											<td><?php echo ucfirst($row["name"]); ?></td>
											<td><?php echo ucfirst($row["gname"]); ?></td>
											<td><?php echo ucfirst($row["pno1"]); ?></td>
											<td><?php echo ucfirst($row["pno2"]); ?></td>
											<td><?php echo ucfirst($row["email"]); ?></td>
										</tr>
										<?php $sno++;
											}
										} ?>
									</table>


									</div>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
    </div>
	
	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>
	
	<script>

	$(document).ready(function(e){
		
	});
	</script>
          
           

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
