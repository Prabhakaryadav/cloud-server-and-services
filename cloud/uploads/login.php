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
}
if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$upass = $_POST['pass'];
	
	
	
	 $sql = "SELECT email,password FROM log WHERE email = '$email' and password = '$upass'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $row['password']==$upass) {
        
		
	
		
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
    <h2 class="hidden" align="center">LOGIN </h2>
   <div id="about">
    <form name="login" method="post">
      <table  border="0" align="center" >
  
    
    <td width="7%"></tr>
    <tr>
      <td><label for="email"> User Email:</label></td>
      <td width="16%"><input type="email" name="email" id="email" size="30" placeholder="name@domain.com"></td>
     
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" name="pass" id="pass" size="30" placeholder="**********"></td>
      </tr>
      <tr>
      <td></td>
        
      <td colspan="1" align="right"> <input type="submit" name="submit" id="submit" value="Submit" />
  </td>
  <td width="77%"></td>
  
  
      </table>
      <br />
      
     IF YOU ARE NOT REGISTER SIGNUP PLEASE<a href="register.php"><font color="#0000FF">     <b>SIGNUP</b></font>
      </form>
      </div>
      </section>
      
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
<BR>
<BR>
<BR>
<footer>Copyrights, P.D.</footer>
      
</body>
</html>