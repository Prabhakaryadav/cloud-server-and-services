<?php
error_reporting(0);
define ('hostnameorservername','localhost'); //Your server or host name goes in here
define ('serverusername','root'); // Your database Username goes in here
define ('serverpassword',''); // Your database Password goes in here
define ('databasenamed','setup'); // Your Database Name goes in here

global $connection;
$connection = @mysql_connect(hostnameorservername,serverusername,serverpassword) or die('Connection could not be made to the SQL Server.');
@mysql_select_db(databasenamed,$connection) or die('Connection could not be made to the database.');	
?>
