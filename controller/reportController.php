<?php

require_once __DIR__ "../model/reportModel.php";


class ReportController{
    private $conn;

    public function __construct($conn){
        $this->conn=$conn;
    }


    public function table(){
        $year = isset($_GET['YEAR']) ? (INT) $_GET['YEAR']: date('Y');
        $page = isset($_GET['page']) ? (INT) $_GET['page']: 1;
        $limit =10;
        $offset=($page -1)* $limit;


        $results= $this->conn->getData($year, $limit, $offset);
        $total= $this-> conn->getTotal($year);

        $totalPages= ceil($total/$limit);

        include '../view/report.php';
     }





}


?>