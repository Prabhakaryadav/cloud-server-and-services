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

if(isset($_SESSION['log'])!="")
{
	header("Location: home.php");
	exit;
}
if(isset($_POST['submit']))
{
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$upass = mysqli_real_escape_string($conn,$_POST['pass']);
	$email=trim($email);
	$upass=trim($upass);
	
	
	
	 $sql = "SELECT id,email,password FROM log WHERE email = '$email' and password = '$upass'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $row['password']==md5($upass)) {
        
			$_SESSION['log']=$row['id'];
			$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (7*60);
			header("Location:home.php");
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	mysqli_close($conn);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content-type="width=device-width initial-scale=1" >
<link rel="stylesheet" href="ll.css"  type="text/css">
<title>MY CLOUD</title>

</head>

<body >
 
 <section class="about" >
    <h2 class="hidden" align="center">LOGIN</h2>
 
<BR>
<BR>
<div id="about">
  <form name="login" method="post">
    <table  border="0" align="center" >
        <td ></td>
      </tr>
      <tr>
        <td><label for="email"> User Email:</label></td>
        <td ><input type="email" name="email" id="email" size="30" placeholder="name@domain.com" /></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td><input type="password" name="pass" id="pass" size="30" placeholder="**********" /></td>
      </tr>
      <tr>
        <td></td>
        <td colspan="1" align="right"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        <td ></td>
      </tr>
    </table>
    <br />
    <p align="center"><b>IF YOU ARE NOT REGISTER SIGNUP PLEASE </b><button id="lm" ><a href="register.php" style="text-decoration:none">SIGNUP</a></button> 
  </form>
</div>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<footer >Copyrights, P.D.</footer>
      
</body>
</html>