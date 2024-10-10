<?php
require_once __DIR__ . '/../model/User.php';

class AuthController {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn; 
    }

    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findUser($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user['username'];
                header('Location: /dashboard.php');
                exit;
            } else {
                $error = 'Credenciales incorrectas';
            }
        }

        include __DIR__ . '/../view/login.php?action=report';
    }

    

    public function logout() {
        session_start();
        $_SESSION = [];
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }        
        session_destroy(); 
        header("Location: ../view/login.php"); 
        exit();
    }
}
