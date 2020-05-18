<?php
$name = filter_input(INPUT_POST, 'name');
$gname = filter_input(INPUT_POST, 'gname');
$pno1 = filter_input(INPUT_POST, 'pno1');
$pno2 = filter_input(INPUT_POST, 'pno2');
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
  $sql = "INSERT INTO reg4 (name,gname,pno1,pno2,email)
  values ('$name','$gname','$pno1','$pno2','$email')";
  if ($conn->query($sql)){
     echo "<script>
alert('Registered Successfully');
window.location.href='reg_form4.html';
</script>";
  }
  else{
   echo "<script>
alert('Error!!!');
window.location.href='reg_form4.html';
</script>";
  }
  $conn->close();
}

 ?>