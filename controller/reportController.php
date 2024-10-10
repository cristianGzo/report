<?php

require_once __DIR__ . '/../model/reportModel.php';


class ReportController{
    private $conn;
    private $reportModel;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->reportModel = new ReporModel($conn);
    }


    public function table(){
        $year = isset($_GET['YEAR'] ) ? (INT) $_GET['YEAR'] : null;
        $yearMessage = $year !== null ? "Año seleccionado: " . htmlspecialchars($year) : "Mostrando todos los datos.";
        $page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;
        $limit =10;
        $offset=($page -1) * $limit;

        if ($year === null) {
            $results = $this->reportModel->getData(null, $limit, $offset); // Asegúrate de modificar tu consulta para manejar esto
            $total = $this->reportModel->getTotal(null); // Cambiar aquí también
        } else {
            // Si hay año, filtrar por año
            $results = $this->reportModel->getData($year, $limit, $offset);
            $total = $this->reportModel->getTotal($year);
        }

        $totalPages= ceil($total/$limit);

        include __DIR__ . '/../view/report.php';
     }

}
?>