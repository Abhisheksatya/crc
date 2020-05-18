<?php
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$rno = filter_input(INPUT_POST, 'rno');
$dob = filter_input(INPUT_POST, 'dob');
$pno = filter_input(INPUT_POST, 'pno');
$email = filter_input(INPUT_POST, 'email');
$branch = filter_input(INPUT_POST, 'branch');
$college = filter_input(INPUT_POST, 'college');
$high = filter_input(INPUT_POST, 'high');
$inter = filter_input(INPUT_POST, 'inter');
$ug = filter_input(INPUT_POST, 'ug');
$pg = filter_input(INPUT_POST, 'pg');
$bklogyes = filter_input(INPUT_POST, 'bklogyes');

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
  $sql = "INSERT INTO student (fname,lname,rno,dob,pno,email,branch,college,high,inter,ug,pg)
  values ('$fname','$lname','$rno','$dob','$pno','$email','$branch','$college','$high','$inter','$ug','$pg')";
  if ($conn->query($sql)){
    echo "<script>
alert('Registered Successfully');
window.location.href='reg_form.html';
</script>";
  }
  else{
    echo "<script>
alert('Error!!!');
window.location.href='reg_form.html';
</script>";

  $conn->close();
}
}

 ?>