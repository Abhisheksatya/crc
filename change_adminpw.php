 <?php
$servername = "localhost";
$uname = "id7636715_crc";
$pass = "abhi@321";
$dbname = "id7636715_crc";
$username1 = $_POST['username'];
$password1 = $_POST['password'];
// Create connection
$conn = mysqli_connect($servername, $uname, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE youtube SET password='$password1' WHERE username='$username1'";

if (mysqli_query($conn, $sql)) {
   echo "<script>alert('Password changed Successfully');
   window.location.href='admin_1.php';</script>";
   
} else {
   echo "<script>
alert('Error!!!');
window.location.href='reset.html';
</script>";
}

mysqli_close($conn);
?> 