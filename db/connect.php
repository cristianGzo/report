<?php
$serverName = ""; 
$database = ""; 
$user = ""; 
$pass = ""; 


$dsn = "Driver={SQL Server};Server=$serverName;Database=$database;";

$conn = odbc_connect($dsn, $user, $pass);
if (!$conn) {
    die("Error de conexión: " . odbc_errormsg());
}
?>
