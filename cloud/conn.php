
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "set";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_SESSION['log']))
{
	header("Location: login.php");
	
}
mysqli_close($conn);
?>