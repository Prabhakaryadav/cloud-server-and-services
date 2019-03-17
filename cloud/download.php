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
/*if ( $_SERVER['REQUEST_METHOD']=='POST' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
       // header( "Location: http://10.0.3.92:31337/", TRUE, 403 );

        /* choose the appropriate page to redirect users */
        //die( header( 'location: /error.php' ) );

   // }
    
if(isset($_SESSION['log']))
{
	header("Location: http://10.0.3.92:31337/");
}
else
{
	header("Location: login.php");
}
/*if (is_logged_in()) {
	header("Location: http://10.10.10.93:31337/");
   
} else {
   die("Access denied");
}*/
mysqli_close($conn);
?>
