<?php
// Start the session
session_start();
?>
<html>
    <head><title>Crossroad</title></head>
    <body></body>
</html>
<?php

$host = "localhost";
$dbusername = "id7636715_crc";
$dbpassword = "abhi@321";
$dbname = "id7636715_crc";
$pwFromDB = "0";
$conn = mysqli_connect('localhost', 'id7636715_crc', 'abhi@321', 'id7636715_crc');


$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION["name"] = $username;


$sql = "SELECT password FROM youtube WHERE username='$username'";

$result = mysqli_query( $conn,$sql);

while( $row = mysqli_fetch_assoc( $result ) ){
$pwFromDB = $row['password'];
}

if( $pwFromDB == $password){
	echo "<script>
window.location.href='admin_1.php';
</script>";
}
else
{
    
	echo "<script>
alert('Login Failed');
window.location.href='admin_login.html';
</script>";
	
}

 

//session

