<?php
    require_once __DIR__"../db/connect.php";

    class ReporModel{

        private $conn;

        public function __construct($conn){
            $this->conn=$conn; 
        }

        public function getData($year, $limit, $offset){
            $query= "select * from report where year= ? LIMIT ? OFFSET ?;";
            $filter = '%' . $filter . '%';
            $stmt=odbc_prepare($this->conn, $query);
            odbc_execute($stmt, array($year, $limit, $offset));

            $result= [];
            while($row =odbc_fetch_array($stmt)){
                $result[]=$row;
            }
            return $result;
        }


        public function getTotal($year){
            $query="Select count(*) as total from report where year=?;";
            $filter = '%' . $filter . '%';
            $stmt=odbc_prepare($this->$conn, $query);
            odbc_execute($stmt, array($year));

            $row= odbc_fetch_array($stmt);

            return $row['total'];
        }

    }

?>