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

if((!isset($_SESSION['log'])))
{
	header("Location: login.php");
	
}
else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            
            ?>
			<script>alert( 'Your session has expired')</script>
            <?php
			session_destroy();
			header("Location:login.php");
			
        }
    
	
}


$logRow="SELECT * FROM log WHERE id=".$_SESSION['log'];
$result=mysqli_query($conn,$logRow);
$row=mysqli_fetch_array($result);
$id=$_SESSION['log'];
if(isset($_POST['submit']))
{

$uploaddir = 'C:\xampp\htdocs\cloud\uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];

 $sql="INSERT INTO tbl_uploads(id,file,type,size) VALUES('$id','$file','$file_type','$file_size')"; //id is forgien key
 mysqli_query($conn,$sql); 


if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
	

 
	
	
		?>
        <script>alert('File is valid, and was successfully uploaded.')</script>
        <?php
	
} 
else {
	?>
    <script>alert('Upload failed')</script>
    <?php
   
}
}


mysqli_close($conn);
?>

<!DOCTYPE html >
<html >
<head>

<meta name="viewport" content-type="width=device-width initial-scale=1" >
<link rel="stylesheet" href="pk1.css"  type="text/css">
<title>MY CLOUD</title>


</head>

<body>

<div id="header" ><br><br><br>

<div id="nav"><br>
<font size="+4" color="#00FFCC" ><b>MY CLOUD</b></font>


<ul>

<li><a href=""> Welcome <?php echo $row['name']; ?> </a></li>
<li><a href=" download.php">Download</a></li>
<li><a href="logout.php?logout">Logout</a></li>
<li><a href="compiler1.php">Compiler</a></li>
<li><a href="#footer">About</a></li>
</ul>

</div>
</div>


<div id="nkm">
<form  method="post" enctype="multipart/form-data" name="pl">
   <font size="+3" color="#FF6666"> <b><i>Select File To Upload:</i></b></font>
    <input type="file" name="file" id="file">
    <input type="submit" value="submit" name="submit" id="submit">
</form>
</div>
<b>Want to host a website?</b>
<BR>
<BR>
Just create a zip or RAR file of your website and upload it here through the <b>UPLOAD</b> button. Your website will be live in a matter of seconds.
<BR>
<BR>
<BR>
<BR>
<b>Download tons of apps, games, multimedia etc.</b> 
<BR>
<BR>
Through the <b>DOWNLOAD</b> tab provided above, you can download lots of useful and entertaining contents for free. :)
<br>
<br>
<form method="post" id="hj">
<label><b>Comment</b><br><textarea cols="75" rows="5" name="com" id="com"></textarea></label>
<br>

<input type="submit" value="submit" name="sub" id="sub">
</form>
<?php

if(isset($_POST["com"]))
{
	$text=$_POST['com'];
	


if($_POST)
{
	
	$comm=fopen("comment.txt","a+");
	fwrite($comm,"<br>". $row['name']." : ".$text);
	fclose($comm);


}
}


?>
<div id="footer">
<font size="+3" color="#660000">Contact:</font>
<br>
    prabhakary8@gmail.com
    <br>
     deepp261097@gmail.com
     <br>
    8860470057, 7706069223
</div>


</body>


	
		

</html>

