<?php
$name = filter_input(INPUT_POST, 'name');
$pro = filter_input(INPUT_POST, 'pro');
$pno = filter_input(INPUT_POST, 'pno');
$institute_name = filter_input(INPUT_POST, 'institute_name');
$add1 = filter_input(INPUT_POST, 'add1');
$add2 = filter_input(INPUT_POST, 'add2');

$host = "localhost";
$dbusername = "id7636715_crc";
$dbpassword = "abhi@321";
$dbname = "id7636715_crc";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}pro','$pn
else{
  $sql = "INSERT INTO reg3 (name,pro,pno,institute_name,add1,add2)
  values ('$name','$o','$institute_name','$add1','$add2')";
  if ($conn->query($sql)){
    echo "<script>
alert('Registered Successfully');
window.location.href='reg_form3.html';
</script>";
  }
  else{
    echo "<script>
alert('Error!!!');
window.location.href='reg_form3.html';
</script>";
  }
  $conn->close();
}

 ?>