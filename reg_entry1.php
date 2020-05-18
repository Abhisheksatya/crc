<?php
$name = filter_input(INPUT_POST, 'name');
$institute_name = filter_input(INPUT_POST, 'institute_name');
$pno = filter_input(INPUT_POST, 'pno');
$designation = filter_input(INPUT_POST, 'designation');
$email = filter_input(INPUT_POST, 'email');

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
  $sql = "INSERT INTO reg1 (name,institute_name,designation,pno,email)
  values ('$name','$institute_name','$designation','$pno','$email')";
  if ($conn->query($sql)){
    echo "<script>
alert('Registered Successfully');
window.location.href='reg_form1.html';
</script>";;
  }
  else{
    echo "<script>
alert('Error!!!');
window.location.href='reg_form1.html';
</script>";
  }
  $conn->close();
}

 ?>