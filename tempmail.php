<?php
//index.php
$myfile = fopen("criteria.txt", "r") or die("Unable to open file!");
$cri=fread($myfile,filesize("criteria.txt"));
fclose($myfile);

$connect = new PDO("mysql:host=localhost;dbname=id7636715_crc", "id7636715_crc", "abhi@321");
$query = "SELECT * FROM student WHERE high BETWEEN $cri AND 100.00";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();



?>
<!DOCTYPE html>
<html>
	<head>
		<title>crossroad</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		
		<SCRIPT language="javascript">

    $(function () {

        // add multiple select / deselect functionality

        $("#selectall").click(function () {

            $('.single_select').attr('checked', this.checked);

        });

 

        // if all checkbox are selected, then check the select all checkbox

        // and viceversa

        $(".single_select").click(function () {

 

            if ($(".single_select").length == $(".single_select:checked").length) {

                $("#selectall").attr("checked", "checked");

            } else {

                $("#selectall").removeAttr("checked");

            }

 

        });

    });

</SCRIPT>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">TNP(HIET)</h3>
			<br />
			<marquee>
			    <p style="color:Red">
			        >>crossroad 2k18 Exclusive<<
			    </p>
			</marquee>
			<center><input type="checkbox" id="selectall"/><p style="color:Red"><b>Select All</b></p></center>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Student Name</th>
						<th>Email</th>
						<th>Select</th>
						<th>Action</th>
					</tr>
				
				<?php
				
				$count = 0;
				foreach($result as $row)
				{
					$count = $count + 1;
					echo '
					<tr>
						<td>'.$row["fname"].'</td>
						<td>'.$row["email"].'</td>
						<td>
						    
							<input type="checkbox" name="single_select" class="single_select" data-email="'.$row["email"].'" data-name="'.$row["fname"].'" />
						</td>
						<td>
						<button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["email"].'" data-name="'.$row["fname"].'" data-action="single">Send Single</button>
						</td>
					</tr>
					';
				}
				?>
					<tr>
						<td colspan="3"></td>
						<td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	$('.email_button').click(function(){
		$(this).attr('disabled', 'disabled');
		var id  = $(this).attr("id");
		var action = $(this).data("action");
		var email_data = [];
		if(action == 'single')
		{
			email_data.push({
				email: $(this).data("email"),
				name: $(this).data("name")
			});
		}
		else
		{
			$('.single_select').each(function(){
				if($(this).prop("checked") == true)
				{
					email_data.push({
						email: $(this).data("email"),
						name: $(this).data('name')
					});
				} 
			});
		}

		$.ajax({
			url:"send_mail.php",
			method:"POST",
			data:{email_data:email_data},
			beforeSend:function(){
				$('#'+id).html('Sending...');
				$('#'+id).addClass('btn-danger');
			},
			success:function(data){
				if(data == 'ok')
				{
					$('#'+id).text('Success');
					$('#'+id).removeClass('btn-danger');
					$('#'+id).removeClass('btn-info');
					$('#'+id).addClass('btn-success');
				}
				else
				{
					$('#'+id).text(data);
				}
				$('#'+id).attr('disabled', false);
			}
		})

	});
});
</script>





