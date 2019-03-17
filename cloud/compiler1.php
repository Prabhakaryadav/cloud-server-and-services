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
else{
	
$current="";
$answer="";
if(!empty ($_POST))
{
	$current=$_POST['ccode'];
	
	file_put_contents('p.cpp',$current);
	$addr='cd C:\xampp\htdocs\cloud\code';

	
	
	$answer= escapeshellcmd(shell_exec('cd C:\xampp\htdocs\cloud g++ p.cpp -O3 -o p.exe'));
	
	 
		
   
  
	
	
	 $process = proc_open('g++ p.cpp',
    array(
	    0=>array("pipe","r"),
        1 => array("pipe", "w"),  //stdout
        2 => array("pipe", "w")   // stderr
    ), $pipes);

  $out= stream_get_contents($pipes[2]);
  fclose($pipes[2]);
  
  
  
  if(empty($out))
  {
	$content=$_POST['user'];
  $string=$content. "| ./pk";
 
 
 
  $answer=shell_exec('pk');
  }
  else
  {
	  $answer=$out;
  }
 

	 

}
}

mysqli_close($conn);
?>
<html>
<head>
<style>
.textarea{
	alignment-adjust:central;
	resize:none;
	outline: none;
	width:450px;
	height:550px;
	border:3px;
	padding:5px;
	font-size:25px;
	background-color:#CCC;
}
.textrea{
	alignment-adjust:middle;
	resize:none;
	outline: none;
	width:400px;
	height:550px;
	border:3px;
	padding:5px;
	font-size:25px;
	background-color:#69F;
}
#klm{
	padding:15px;
	text-align:center;
	margin:auto;
	border-radius:8px;
	color:#93F;
	font-size:20px;
	
}
.userinput{
	width:300px;
	height:550;
	border:3px;
	padding:5px;
	font-size:25px;
	background-color:#999;
	}
.usernput{padding:15px;
	text-align:center;
	margin:auto;
	border-radius:8px;
	color:#93F;
	font-size:20px}
	
</style>
</head>
<body>
<h1 align="center" ><font size="+5" color="#009999"> C PROGRAMMING</font></h1>

<div id="kl">
<form method="post"  >
  <textarea  name="ccode"  placeholder="Type c code"  class="textarea"><?php echo $current; ?></textarea>
  <input type="submit" id ="klm" value="Run">
  
  <textarea name="answer" disabled class="textrea" placeholder="see result"><?php echo $answer; ?></textarea>
  <textarea name="user" class="userinput" placeholder="user input"><?php echo $answer ; ?> </textarea>
  <input type="submit" class="usernput" value="submit">
</form></div>
</body></html>



	
	
	