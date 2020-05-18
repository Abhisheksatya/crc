<?php require_once('./include/mysqli_connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exporting MySQL Data to Excel using PHP - Learn infinity</title>
    
    <!-- Bootstrap Core Css -->
    <link href="css/bootstrap.css" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/app_style.css" rel="stylesheet" />
	
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
<body>
    <div class="all-content-wrapper">
		<!-- Top Bar -->
		
		<!-- #END# Top Bar -->
	
		<section class="container">
			<div class="form-group custom-input-space has-feedback">
				<div class="page-heading">
					<h3 class="post-title">STUDENTS REGISTERED DATA</h3>
				</div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading"><marquee><p style="color:Red;">>>crossroad 2018 exclusive<<</p></marquee></div>
								<div class="panel-body">
									<div class="post-data-list">
									
									
									<a class="btn btn-warning" href="export_excel.php" target="_new" ><i class="fa fa-download"></i> Export to Excel</a>
									
									<table width="100%" border="1">
										<tr>
											<th>SNo.</th>
											<th>First Name</th>
											<th>Last Name</th>
										</tr>
										<?php
										
										//get rows query
										$query = mysqli_query($con, "SELECT * FROM student ORDER BY sno DESC");
										
										//number of rows
										$rowCount = mysqli_num_rows($query);
										
										$sno = 1;
										if($rowCount > 0){
											while($row = mysqli_fetch_assoc($query)){
										?>
										<tr>
											<td align="center"><?php echo $sno; ?>)</td>
											<td><?php echo ucfirst($row["fname"]); ?></td>
											<td><?php echo ucfirst($row["lname"]); ?></td>
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
</body>
</html>
