<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
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

        include __DIR__ . '/../view/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /index.php');
        exit;
    }
}
