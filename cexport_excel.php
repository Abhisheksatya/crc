<?php require_once('mysqli_connect.php');

// headers for exporting excel

header("Content-Disposition: attachment; filename='Company_Details.xls'");

header("Content-Type: application/vnd.ms-excel");

function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();

//get rows query
$query = mysqli_query($con, "SELECT * FROM company ORDER BY sno DESC limit 0,100");

//number of rows
$rowCount = mysqli_num_rows($query);

$sno = 1;
if($rowCount > 0){
	while($row = mysqli_fetch_assoc($query)){
		$post_list[] = array( "Sno"=>$sno,  "company name"=>$row["cname"],  "location"=>$row["loc"], "Visit Date"=>$row["vdate"], "Package"=>$row["pack"], "Contact No"=>$row["pno"], "Email"=>$row["email"], "Branch"=>$row["branch"], "10th"=>$row["high"], "12th"=>$row["inter"], "Bachelor"=>$row["bac"], "Masters"=>$row["mas"] );
		$sno++;
	}
}


$title_flag = false;
foreach($post_list as $post) {
	if(!$title_flag) {
		// Showing column names 
		echo implode("\t", array_keys($post)) . "\n";
		$title_flag = true;
	}
	// data filtering
	array_walk($post, 'dataFilter');
	echo implode("\t", array_values($post)) . "\n";

}

?>