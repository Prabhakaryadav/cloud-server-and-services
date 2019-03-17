
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
echo '<pre>';

// Outputs all the result of shellcommand "ls", and returns
// the last output line into $last_line. Stores the return value
// of the shell command in $retval.
$last_line = system('iwconfig', $retval);

// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;
mysqli_close($conn);
?>
