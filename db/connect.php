<?php
$serverName = "DESKTOP-64EGJOD\SQLEXPRESS"; 
$database = "prueba"; 
$user = "sa"; 
$pass = "123admin"; 


$dsn = "Driver={SQL Server};Server=$serverName;Database=$database;";

function getConnection(){
    global $dsn, $user, $pass;
    $conn = odbc_connect($dsn, $user, $pass);
    if (!$conn) {
        echo "sin exito";
    die("Error de conexión: " . odbc_errormsg());    
    }
    echo "correcto";
    return $conn;
}
?>
