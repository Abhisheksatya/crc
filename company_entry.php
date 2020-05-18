<?php
$cname = filter_input(INPUT_POST, 'cname');
$loc = filter_input(INPUT_POST, 'loc');
$vdate = filter_input(INPUT_POST, 'vdate');
$pack = filter_input(INPUT_POST, 'pack');
$pno = filter_input(INPUT_POST, 'pno');
$email = filter_input(INPUT_POST, 'email');
$branch = filter_input(INPUT_POST, 'branch');
$high = filter_input(INPUT_POST, 'high');
$inter = filter_input(INPUT_POST, 'inter');
$bac = filter_input(INPUT_POST, 'bac');
$mas = filter_input(INPUT_POST, 'mas');

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
  $sql = "INSERT INTO company (cname,loc,vdate,pack,pno,email,branch,high,inter,bac,mas)
  values ('$cname','$loc','$vdate','$pack','$pno','$email','$branch','$high','$inter','$bac','$mas')";
  if ($conn->query($sql)){
    echo "<script>
alert('Registered Successfully');
window.location.href='admin_1.html';
</script>";
  }
  else{
   echo "<script>
alert('Error!!!');
window.location.href='company form.html';
</script>";
  }
  $conn->close();
}

 ?>