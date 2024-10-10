<?php
    require_once 'controller/AuthController.php';
    require_once 'controller/reportController.php';
    require_once 'db/connect.php';

$conn = getConnection();

$reportController = new ReportController($conn);
$authController = new AuthController($conn);

if (isset($_GET['action']) && $_GET['action'] === 'report') {
    $reportController->table();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $authController->login();
} elseif (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $authController->logout();
}


    
?>