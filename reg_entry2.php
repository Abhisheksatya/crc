<?php
$institute_name = filter_input(INPUT_POST, 'institute_name');
$project = filter_input(INPUT_POST, 'project');
$syno = filter_input(INPUT_POST, 'syno');
$gname = filter_input(INPUT_POST, 'gname');
$name1 = filter_input(INPUT_POST, 'name1');
$branch1 = filter_input(INPUT_POST, 'branch1');
$email1 = filter_input(INPUT_POST, 'email1');
$pno1 = filter_input(INPUT_POST, 'pno1');
$name2 = filter_input(INPUT_POST, 'name2');
$branch2 = filter_input(INPUT_POST, 'branch2');
$email2 = filter_input(INPUT_POST, 'email2');
$pno2 = filter_input(INPUT_POST, 'pno2');
$name3 = filter_input(INPUT_POST, 'name3');
$branch3 = filter_input(INPUT_POST, 'branch3');
$email3 = filter_input(INPUT_POST, 'email3');
$pno3 = filter_input(INPUT_POST, 'pno3');
$name4 = filter_input(INPUT_POST, 'name4');
$branch4 = filter_input(INPUT_POST, 'branch4');
$email4 = filter_input(INPUT_POST, 'email4');
$pno4 = filter_input(INPUT_POST, 'pno4');
$name5 = filter_input(INPUT_POST, 'name5');
$branch5 = filter_input(INPUT_POST, 'branch5');
$email5 = filter_input(INPUT_POST, 'email5');
$pno5 = filter_input(INPUT_POST, 'pno5');

$host = "localhost";
$dbusername = "id7636715_crc";
$dbpassword = "abhi@321";
$dbname = "id7636715_crc";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO reg2 (institute_name,project,syno,gname,name1,branch1,email1,pno1,name2,branch2,email2,pno2,name3,branch3,email3,pno3,name4,branch4,email4,pno4,name5,branch5,email5,pno5)
  values ('$institute_name','$project','$syno','$gname','$name1','$branch1','$email1','$pno1','$name2','$branch2','$email2','$pno2','$name3','$branch3','$email3','$pno3','$name4','$branch4','$email4','$pno4','$name5','$branch5','$email5','$pno5')";
  if ($conn->query($sql)){
    echo "<script>
alert('Registered Successfully');
window.location.href='reg_form2.html';
</script>";
  }
  else{
    echo "<script>
alert('Error!!!');
window.location.href='reg_form2.html';
</script>";
  }
  $conn->close();
}

 ?>