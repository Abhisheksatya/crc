<?php require_once('mysqli_connect.php');

// headers for exporting excel

header("Content-Disposition: attachment; filename='Registration 2.xls'");

header("Content-Type: application/vnd.ms-excel");

function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();

//get rows query
$query = mysqli_query($con, "SELECT * FROM reg2 ORDER BY sno DESC limit 0,1000");

//number of rows
$rowCount = mysqli_num_rows($query);

$sno = 1;
if($rowCount > 0){
	while($row = mysqli_fetch_assoc($query)){
		$post_list[] = array( "Sno"=>$sno, "Institute name"=>$row["institute_name"], "Project"=>$row["project"], "Synopsis"=>$row["syno"], "Guide Name"=>$row["gname"], "Student name1"=>$row["name1"], "Student name2"=>$row["name2"], "Student name3"=>$row["name3"], "Student name4"=>$row["name4"], "Student name5"=>$row["name5"],);                                                                                                                  
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