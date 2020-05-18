<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$host = "sql12.freemysqlhosting.net";
$dbusername = "sql12259712";
$dbpassword = "gBIvjdHhBy";
$dbname = "sql12259712";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO youtube (username,password)
  values ('$username','$password')";
  if ($conn->query($sql)){
   echo "<script>
alert('Registered Successfully');
window.location.href='admin_1.html';
</script>";
  }
  else{
    echo "<script>
alert('Error!!!');
window.location.href='admin_1.html';
</script>";
  }
  $conn->close();
}

 ?>