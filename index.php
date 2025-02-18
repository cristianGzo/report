<?php
    require_once 'controllers/AuthController.php';
    require_once 'controllers/reportController.php';
    require_once 'db.php';

$conn = getConnection();

$authController = new AuthController($conn);
$reportController = new ReportController($conn);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $authController->login();
} elseif (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $authController->logout();
}



if (isset($_GET['action']) && $_GET['action'] === 'report') {
    $reportController->table();
}
    
?>