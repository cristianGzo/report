<?php
    require_once __DIR__ . "/../db/connect.php";

    class ReporModel{

        private $conn;

        public function __construct($conn) {
            $this->conn = $conn; 
        }

        public function getData($year, $limit, $offset){
            if ($year === null) {
                
                $query = "SELECT * FROM Empleados ;";
                $params = array($offset, $limit);
            } else {
               
                $query = "SELECT * FROM Empleados WHERE YEAR(FechaNacimiento) = ? ORDER BY ID OFFSET ? ROWS FETCH NEXT ? ROWS ONLY;";
                $params = array($year, $offset, $limit);
            }
        
            $stmt = odbc_prepare($this->conn, $query);
        
           
            if ($stmt === false) {
                echo "Error en la preparación de la consulta: " . odbc_errormsg($this->conn);
                return [];
            }
        
            
            if (!odbc_execute($stmt, $params)) {
                echo "Error en la ejecución de la consulta: " . odbc_errormsg($this->conn);
                return [];
            }
        
        
            $result = [];
            while ($row = odbc_fetch_array($stmt)) {
                $result[] = $row;
            }
            return $result;
        }


        public function getTotal($year){
            if ($year === null) {
                $query = "SELECT COUNT(*) AS total FROM Empleados;";
            } else {
                $query = "SELECT COUNT(*) AS total FROM Empleados WHERE YEAR(FechaNacimiento) = ?;";
            }
        
            $stmt = odbc_prepare($this->conn, $query);
            if ($year !== null) {
                odbc_execute($stmt, array($year));
            } else {
                odbc_execute($stmt);
            }
        
            $row = odbc_fetch_array($stmt);
            return $row['total'];
        }

    }

?>