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

$uploaddir = 'C:\xampp\htdocs\login\uploads/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);


if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
	
	$file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
    $file_loc = $_FILES['fileToUpload']['tmp_name'];
 $file_size = $_FILES['fileToUpload']['size'];
 $file_type = $_FILES['fileToUpload']['type'];

 $sql="INSERT INTO uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 mysql_query($sql); 
	
	
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
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data" name="pl">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="submit" name="submit">
</form>

</body>
</html>