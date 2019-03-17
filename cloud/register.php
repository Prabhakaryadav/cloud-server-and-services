<?php
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
if(isset($_POST['submit']))
{
$name =  mysqli_real_escape_string($conn,$_POST['name']);
$pass =( mysqli_real_escape_string($conn, $_POST['pass']));
$email= mysqli_real_escape_string($conn,$_POST['email']);
$cpass= (mysqli_real_escape_string($conn,$_POST['cpass']));
$sql = "INSERT INTO log(id,name,email, password)
VALUES ('','$name','$email','$pass')";

if($name==NULL || $email==NULL || $pass==NULL || $cpass==NULL)
	{
		?>
        <script>alert('fill all the details');</script>
        <?php
	}
	else
	{
		
		if((strlen($pass) > 6))
		{
			
		if(preg_match( '/[A-Z]/', $pass ) && preg_match( '/[a-z]/', $pass ) & preg_match( '/\d/', $pass ))
		{
		
				

		$query = "SELECT email FROM  log WHERE email='$email'";
		$rec=mysqli_query($conn,$query);
	
	
	$count = mysqli_num_rows($rec); // if email not found then register
	
	if($count == 0){
		if($cpass == $pass)
	{

if (mysqli_query($conn, $sql)) {
   	?>
	<script>alert('successfully registered ');</script>
    
			<?php
			

}
else
		{
			?>			
			<script>alert('error while registering you...');</script>
			<?php
		}	
	}

else {
   ?>
			<script>alert('Password mismatch');</script>
			<?php
}
	}
	else
	{
		?><script>alert('Email Already taken');</script>
        <?php
	}
		}
		else
		{
			?>
            <script>alert('password should contain atleast one Capital letter and a digit')</script>
            <?php
		}
		}
		else
		{
			?>
            <script>alert('Password should be more than  6 chracter')</script>
            <?php
		}
		
}
mysqli_close($conn);
}
?><!DOCTYPE html>
<html>
<head>
<title> MY CLOUD</title>
<meta name="viewport" content-type="width=device-width initial-scale=1" >
<link rel="stylesheet" href="gk.css"  type="text/css">

</head>
<body >

<section class="register" >
    <h2 class="hidden"><font color="#0099FF">Register</font></h2>
    <form name="login" method="post"  >
    <div align="center">
      <table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td width="13%"  > <label for="textfield"><font color="#0099FF"> Name:</font></label></td>
      <td width="17%">
      <input type="text" name="name" id="name" size="30" >
     </td>
    </tr>
    <tr>
      <td><label for="email"> <font color="#0099FF">User Email:</font></label></td>
      <td><input type="email" name="email" id="email" size="30" placeholder="name@domain.com"></td>
    </tr>
    <tr>
      <td><label for="password"><font color="#0099FF">Password*:</font></label></td>
      <td><input type="password" name="pass" id="pass" size="30" placeholder="xxxxxxxxxxx"></td>
    </tr>
    
    <tr>
      <td><label for="password"><font color="#0099FF">Confirm Password:</font></label></td>
      <td><input type="password" name="cpass" id="cpass" size="30" placeholder="xxxxxxxxxxx"></td>
    </tr>
    
    <tr>
    <td></td>
    
      <td colspan="1" align="right"><input type="submit" name="submit" id="submit" value="Submit"></td>
      <td width="70%"></td>
      </tr>
  </tbody>
</table>

</div>

  </form>
  
   
</section>

*Password sholud be more than 6 charcters and Contain atleast one Capital Letter and one digit.
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
 </body></html>